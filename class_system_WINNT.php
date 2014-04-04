<?php
require_once('class_system.php');

class WINNT extends System {
	var $is_fetched_sysctl 	= 0;
	var $fetched_sysctl 	= array();

	function WINNT() {
	}

	function get_osclass() {
		return 'Generic WINNT';
	}

	function get_kernelversion() {
		$this->__fetch_sysctl__();
		return $this->fetched_sysctl['os.producttype'];
	}

	function get_uptime() {
		$this->__fetch_sysctl__();
		return '<acronym title="Because of limitations in Win32-API, uptime will wrap to zero every 49,7 days.">'	.
				$this->__convert_seconds__($this->fetched_sysctl['misc.tickcount']) .
				'</acronym>';;
	}

	function get_systemload() {
		$this->__fetch_sysctl__();
		return $this->fetched_sysctl['mem.memory_load'] . ' % memory';
	}

	function get_resource_hd() {
		$data = $this->__fetch_perf__multi("-disk");

		$hd_info = array();
		foreach ($data as $mnt => $counter_id) {
			if ($mnt == "_Total") break;
			$disk = array();

			$disk['mountpoint'] 	= $mnt;
			$disk['megabyte_free'] 	= $data[$mnt][408][0];
			$disk['megabyte_used'] 	= $data[$mnt][408][1] - $data[$mnt][408][0];
			$disk['megabyte_total'] = $data[$mnt][408][1];
			$disk['percent_used'] 	= floor(($disk['megabyte_used'] / $disk['megabyte_total']) * 100);
			$disk['percent_free'] 	= (100 - $disk['percent_used']);

			array_push($hd_info, $disk);
		}
		return $hd_info;
	}

	function get_resource_memory() {
		$this->__fetch_sysctl__();
		$mem_info = array();

		$mem_info[0]['mountpoint'] 		= 'Physical';
		$mem_info[0]['megabyte_total']	= $this->fetched_sysctl['mem.physmem_total'] / 1024 / 1024;
		$mem_info[0]['megabyte_free'] 	= $this->fetched_sysctl['mem.physmem_available'] / 1024 / 1024;
		$mem_info[0]['megabyte_used'] 	= $mem_info[0]['megabyte_total'] - $mem_info[0]['megabyte_free'];
		$mem_info[0]['percent_used']	= floor(($mem_info[0]['megabyte_used'] / $mem_info[0]['megabyte_total']) * 100);
		$mem_info[0]['percent_free'] 	= (100 - $mem_info[0]['percent_used']);

		$mem_info[1]['mountpoint'] 		= 'Page file';
		$mem_info[1]['megabyte_total']	= $this->fetched_sysctl['mem.swapmem_total'] / 1024 / 1024;
		$mem_info[1]['megabyte_free'] 	= $this->fetched_sysctl['mem.swapmem_available'] / 1024 / 1024;
		$mem_info[1]['megabyte_used'] 	= $mem_info[1]['megabyte_total'] - $mem_info[1]['megabyte_free'];
		$mem_info[1]['percent_used']	= floor(($mem_info[1]['megabyte_used'] / $mem_info[1]['megabyte_total']) * 100);
		$mem_info[1]['percent_free'] 	= (100 - $mem_info[1]['percent_used']);

		return $mem_info;
	}

	function get_resource_network() {
		$data = $this->__fetch_perf__("-net");
		$net_info = array();
		foreach ($data as $device => $counter_id) {
			$net = array();

			$net['device_name']			= $device;
			$net['megabyte_recieved']	= ($data[$device][264] / 1024 / 1024);
			$net['megabyte_sent'] 		= ($data[$device][506] / 1024 / 1024);
			$net['error']				= $data[$device][530] + $data[$device][542];
			$net['drop']				= $data[$device][528] + $data[$device][540];

			array_push($net_info, $net);
		}

		return $net_info;
	}

	function get_processlist() {
		$data = $this->__fetch_perf__multi("-get 230");

		$processes = array();
		foreach ($data as $process_id => $counter_id) {
			if ($process_id == '_Total' || $process_id == 'Idle') continue;
			$process = array();

			$process['NAME'] 	= $process_id;
			$process['PID'] 	= trim($data[$process_id][784][0]);
			$process['PPID'] 	= trim($data[$process_id][1410][0]);
			$process['UID'] 	= '';

			array_push($processes, $process);
		}

		foreach ($processes as $key => $row) {
		   $pids[$key]  = $row['PID'];
		}

		array_multisort($pids, SORT_ASC, $processes);
		return $processes;
	}

	function get_sysctl() {
		$this->__fetch_sysctl__();
		return $this->fetched_sysctl;
	}

	function get_ftpversion() 			{ 	return 'N.A.';	}
	function get_ftpmodules() 			{	return array();	}
	function get_have_ftpmodule($name)	{	return false;	}
	function get_terminal_num_users() 	{ 	return 'N.A.';	}
	function get_ftp_num_users() 		{	return 'N.A.';	}
	function get_terminal_userdata() 	{	return array();	}
	function get_ftp_userdata() 		{	return array();	}
	function have_section_resources()	{ 	return 1; 		}
	function have_section_kernel()		{ 	return 1; 		}
	function have_section_logon_data()	{	return 0; 		}
	function have_section_processes()	{	return 1; 		}
	function have_section_proftpd()		{	return 0; 		}

	/**************************************************************************
	 *
	 * Private functions intended for internal usage only.
	 *
	 *************************************************************************/
	function __fetch_perf__multi($params) {
		$data = array();
		exec($GLOBALS['path_to_ftpadmin_utils'] . 'perfmon.exe '. $params, $data_array);
		foreach ($data_array as $line) {
			$line = explode(';', $line, 3);
			if (!isset($data[$line[0]][$line[1]])) $data[$line[0]][$line[1]] = array();
			array_push($data[$line[0]][$line[1]], $line[2]);
		}
		return $data;
	}

	function __fetch_perf__($params) {
		$data = array();
		exec($GLOBALS['path_to_ftpadmin_utils'] . 'perfmon.exe '. $params, $data_array);
		foreach ($data_array as $line) {
			$line = explode(';', $line, 3);
			$data[$line[0]][$line[1]] = $line[2];
		}
		return $data;
	}


	function __fetch_sysctl__() {
		if ($this->is_fetched_sysctl == 0) {
			exec($GLOBALS['path_to_ftpadmin_utils'] . 'sysctl.exe', $data_array);

			foreach ($data_array as $line) {
				$line = explode(' = ', $line, 2);

				$this->fetched_sysctl[trim($line[0])] = $line[1];
			}
			ksort($this->fetched_sysctl);
			$this->is_fetched_sysctl = 1;
		}
	}
}
?>