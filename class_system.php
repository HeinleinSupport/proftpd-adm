<?php
require_once('include_config.php');

class System {
	var $is_fetched_who 	= 0;
	var $fetched_who 		= array();

	var $is_fetched_ftp 	= 0;
	var $fetched_ftp 		= array();
	var $is_fetched_ftp_mods= 0;
	var $ftp_modules		= array();


	function System() {
	}

	function get_osclass() {
		return 'Generic System';
	}

	function get_kernelversion() {
		return 'N.A.';
	}

	function get_kernel_configuration() {
		return array();
	}

	function get_resource_hd() {
		return array();
	}

	function get_resource_memory() {
		return array();
	}

	function get_resource_network() {
		return array();
	}

	function get_hardware_cpu() {
		return array();
	}

	function get_hardware_pci() {
		return array();
	}

	function get_hardware_ide() {
		return array();
	}

	function get_ftpversion() {
		$handle = popen($GLOBALS['config_path_to_proftpd'] . ' --version 2>&1', 'r');
		$read = fread($handle, 2096);
		pclose($handle);
		$read = preg_split('/\s+/', $read, 5);

		return $read[4];
	}

	function get_ftpmodules() {
		$this->__fetch_ftp_modules__();
		return $this->ftp_modules;
	}

	function get_have_ftpmodule($name) {
		$this->__fetch_ftp_modules__();
		foreach ($this->ftp_modules as $module) {
			if ($module == $name) return true;
		}
		return false;
	}

	function get_httpversion() {
		$version = getenv('SERVER_SOFTWARE');
		if ($version == 'Apache') return '<acronym title="' . $GLOBALS['language']['status']['secured_apache'] . '">' . $version . '</acronym>';
		else return $version;
	}

	function get_terminal_num_users() {
		$this->__fetch_who_data__();
		return sizeof($this->fetched_who);
	}

	function get_terminal_userdata() {
		$this->__fetch_who_data__();

		$user_data = array();
		foreach($this->fetched_who as $user) {
			$user = preg_split('/\s+/', $user, 3);

			array_push($user_data, array(	"username" 	=> $user[0],
											"device"	=> $user[1],
											"time"		=> $user[2]));
		}
		return $user_data;
	}

	function get_ftp_num_users() {
		$this->__fetch_ftp_data__();
		$num = (sizeof($this->fetched_ftp) - 2);

		if ($num == -2) return '0, <span class="error">' . $GLOBALS['language']['status']['server_down'] . '</span>';
		else return $num;
	}

	function get_ftp_userdata() {
		$this->__fetch_ftp_data__();
		$user_data = array();

		for ($i = 1; $i < (sizeof($this->fetched_ftp) - 1); $i++) {
			$data = trim($this->fetched_ftp[$i]);
			$data = preg_replace('/(\[\s+)/', '[', $data);
			$data = preg_replace('/(\(\s+)/', '(', $data);
			$data = preg_split('/(\s+)/', $data);

			$user_data[$i - 1]["pid"] 		= $data[0];
			$user_data[$i - 1]["username"]	= $data[1];
			$user_data[$i - 1]["uptime"]	= substr($data[2], 1, -1);
			$user_data[$i - 1]["idle"]		= $data[3];
			$user_data[$i - 1]["cmd_info"]	= '&nbsp;';

			if ($data[4] == "idle") {
				$user_data[$i - 1]["cmd"]		= 'IDLE';
			} else {
				if ($user_data[$i - 1]["idle"]{0} == '(') $user_data[$i - 1]["idle"] = substr($user_data[$i - 1]["idle"], 1, -1);
				$user_data[$i - 1]["cmd"]		= $data[4];
				$user_data[$i - 1]["cmd_info"]	= $data[5];
			}
		}

		return $user_data;
	}

	function get_sysctl() {
		return array();
	}

	function get_processlist() {
		$processes = array();
		exec($GLOBALS['config_path_to_ps'] . ' -aexo user,pid,ppid,command', $ps);

		for ($i = 1; $i < sizeof($ps); $i++) {
			$chunks = preg_split('/\s+/', $ps[$i], 4);

			$process = array();
			$process['UID'] 	= $chunks[0];
			$process['PID'] 	= $chunks[1];
			$process['PPID']	= $chunks[2];
			$process['NAME']	= $chunks[3];
			array_push($processes, $process);
		}

		return $processes;
	}

	function get_uptime() 				{	return 'N.A.'; }
	function get_idletime()				{	return 'N.A.'; }
	function get_systemload()			{	return 'N.A.'; }

	function have_section_resources()	{	return 0; 		}
	function have_section_kernel()		{	return 0; 		}
	function have_section_hardware()	{	return 0; 		}
	function have_section_processes()	{	return 0; 		}
	function have_section_logon_data()	{	return 1; 		}
	function have_section_proftpd()		{	return 1; 		}

	/**************************************************************************
	 *
	 * Private functions intended for internal usage only.
	 *
	 *************************************************************************/
	function __get_sysctl__($name) {
		exec($GLOBALS['config_path_to_sysctl'] . ' -n ' . $name, $name);
		return $name;
	}

	function __fetch_who_data__() {
		if ($this->is_fetched_who == 0) {
			exec($GLOBALS['config_path_to_who'], $this->fetched_who);
			$this->is_fetched_who = 1;
		}
	}

	function __fetch_ftp_data__() {
		if ($this->is_fetched_ftp == 0) {
			exec($GLOBALS['config_path_to_ftpwho'], $this->fetched_ftp);
			$this->is_fetched_ftp = 1;
		}
	}

	function __fetch_ftp_modules__() {
		if ($this->is_fetched_ftp_mods == 0) {
			exec($GLOBALS['config_path_to_proftpd'] . ' -l', $modules);

			for ($i = 1; $i < count($modules); $i++) {
				array_push($this->ftp_modules, trim($modules[$i]));
			}

			$this->is_fetched_ftp_mods = 1;
		}
	}

	function __convert_seconds__($time) {
		$minute = 60;
		$hour = $minute * 60;
		$day = $hour * 24;

		$ret  = (int)($time / $day) . " days, ";
		$ret .= $this->__adapt_time__((int)(($time % $day) / $hour)) . ":";
		$ret .= $this->__adapt_time__((int)(($time % $hour) / $minute)) . ":";
		$ret .= $this->__adapt_time__((int)($time % $minute));

		return $ret;
	}

	function __adapt_time__($time) {
		if ($time >= 10) return $time;
		else return "0" . $time;
	}
}
?>