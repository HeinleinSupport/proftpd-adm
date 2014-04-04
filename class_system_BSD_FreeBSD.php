<?php
require_once('class_system.php');
require_once('class_system_BSD.php');

class FreeBSD extends BSD {
	var $is_fetched_uptime 	= 0;
	var $fetched_uptime 	= array();

	function FreeBSD() {
	}

	function get_osclass() {
		return 'FreeBSD';
	}

	function get_kernelversion() {
		$version = $this->__get_sysctl__('kern.osrelease');
		return $this->get_osclass() . ' ' .$version[0];
	}

	function get_uptime() {
        $sys_ticks = $this->__get_system_ticks__();
        return $this->__convert_seconds__($sys_ticks);
	}

	/* This function was based on code from phpSysInfo-2.0 which had a bug in it. That bug
	 * resulted in transferred bytes listing as errors, here that is corrected.
	 */
	function get_resource_network() {
		$kernel_conf = $this->__get_kernel_config__();
		$kernel_conf['device']['lo'] = '# localhost (loopback device)';

		exec('netstat -nbdi | cut -c1-24,42- | grep Link', $data);
		$net_info = array();

		foreach ($data as $device_info) {
			$device_info = preg_split("/\s+/", $device_info);

			if (true || (!empty($device_info[0]) && !empty($device_info[3]))) {
				$offset = 0;
				if (sizeof($device_info) == 12) $offset = 1;

				$device = array();
				$device['device_name'] = $device_info[0];
				if (!empty($kernel_conf['device'][substr($device_info[0], 0, -1)])) $device['device_name'] .= ' - ' . trim(substr($kernel_conf['device'][substr($device_info[0], 0, -1)], 1));

				$device['megabyte_recieved']	= ($device_info[5 + $offset] / 1024 / 1024);
				$device['megabyte_sent'] 		= ($device_info[8 + $offset] / 1024 / 1024);
				$device['error']				= ($device_info[4 + $offset] + $device_info[7 + $offset]);
				$device['drop']					= $device_info[10 + $offset];

				array_push($net_info, $device);
			}
		}

		return $net_info;
	}

	/* This function was based on code from phpSysInfo-2.0.
	 */
    function get_resource_memory() {
		$pagesize = 1024;
    	$s = $this->__get_sysctl__('hw.physmem');
		$s = $s[0];

		$mem_info[0] = array("mountpoint" => "Physical");

		exec('vmstat', $lines);
        for ($i = 0; $i < sizeof($lines); $i++) {
            $ar_buf = preg_split("/\s+/", $lines[$i], 19);

            if ($i == 2) {
                $mem_info[0]['megabyte_free'] = ($ar_buf[5] * $pagesize / 1024) / 1024;
            }
        }

		$mem_info[0]['megabyte_total']	= $s / 1024 / 1024;
		$mem_info[0]['megabyte_used']	= $mem_info[0]['megabyte_total'] - $mem_info[0]['megabyte_free'];
		$mem_info[0]['percent_used']	= (int)($mem_info[0]['megabyte_used'] * 100 / $mem_info[0]['megabyte_total']);
		$mem_info[0]['percent_free']	= (100 - $mem_info[0]['percent_used']);
		unset($lines);

        exec('swapinfo -k', $lines);
        for ($i = 0; $i < count($lines); $i++) {
            $ar_buf = preg_split("/\s+/", $lines[$i], 6);

            if ($i != 0) {
            	$mem_info[$i] = array("mountpoint" => 'Swap');

				$mem_info[$i]['megabyte_total']	= $ar_buf[1] / 1024;
				$mem_info[$i]['megabyte_used']	= $ar_buf[2] / 1024;
                $mem_info[$i]['megabyte_free'] 	= $mem_info[1]['megabyte_total'] - $mem_info[1]['megabyte_used'];

                if ($mem_info[$i]['megabyte_used'] == 0) $mem_info[$i]['percent_used'] = 0;
				else $mem_info[$i]['percent_used'] = (int)($mem_info[$i]['megabyte_used'] * 100 / $mem_info[$i]['megabyte_total']);

				$mem_info[$i]['percent_free']	= (100 - $mem_info[$i]['percent_used']);
            }
        }
        return $mem_info;
    }


	/**************************************************************************
	 *
	 * Private functions intended for internal usage only.
	 *
	 *************************************************************************/
	function __get_system_ticks__() {
		$sys_ticks = $this->__get_sysctl__('kern.boottime');
		$sys_ticks = $sys_ticks[0];

        $sys_ticks = explode(' ', $sys_ticks);
        $sys_ticks = $sys_ticks[3];
        $sys_ticks = time() - $sys_ticks;

        return $sys_ticks;
	}
}
?>