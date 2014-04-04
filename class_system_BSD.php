<?php
require_once('class_system.php');
require_once('class_system_Linux.php');

class BSD extends System {
	var $is_fetched_kernel_conf = 0;
	var $fetched_kernel_conf 	= array();

	function BSD() {
	}

	function get_osclass() {
		return 'Generic BSD';
	}

	function get_kernelversion() {
		$version = $this->__get_sysctl__('kern.version');
		$version = explode(':', $version[0]);
		return $version[0];
	}

	function get_resource_hd() {
		$system = new Linux();
		return $system->get_resource_hd();
	}

	function get_systemload(){
		$load = $this->__get_sysctl__('vm.loadavg');
		$load = substr($load[0], 2, -2);
		return '<acronym title="Load average of the system over the last 1, 5, and 15 minutes">' . $load . '</acronym>';
	}

	function get_sysctl() {
		$data_array = array();
		exec($GLOBALS['config_path_to_sysctl'] . ' -a', $data);

		$last_id = "";
		for ($i = 0; $i < sizeof($data); $i++) {
			if ((strpos($data[$i], '.') === false) || (strpos($data[$i], ':') === false)) {
				// ':' was not found in line
				$data_array[$last_id] = @$data_array[$last_id] . $data[$i] . '<BR>';
			} else {
				$line = explode(':', $data[$i], 2);
				$data_array[$line[0]] = $line[1];

				$last_id = $line[0];
			}
		}
		$data_array['kern.malloc'] = '<pre>' . $data_array['kern.malloc'] . '<pre>';
		$data_array['vm.vmtotal'] = '<pre>' . $data_array['vm.vmtotal'] . '<pre>';
		$data_array['vm.zone'] = '<pre>' . $data_array['vm.zone'] . '<pre>';
		ksort($data_array);
		return $data_array;
	}

	function get_kernel_configuration() {
		if(!file_exists($GLOBALS['config_path_to_kernel_config'])) return array();

		$data_array = $this->__get_kernel_config__();
		$data_array["&nbsp;"] = array("Kernel configuration file" => $GLOBALS['config_path_to_kernel_config']);
		ksort($data_array);
		return $data_array;
	}


	function have_section_resources()	{ return 1; }
	function have_section_kernel()		{ return 1; }

	/**************************************************************************
	 *
	 * Private functions intended for internal usage only.
	 *
	 *************************************************************************/
	/* Parses kernel configuration file looking for device names. Multi-line
	 * comments are ignored for simplicity.
	 */
	function __get_kernel_config__() {
		if(!file_exists($GLOBALS['config_path_to_kernel_config'])) return array();

		if ($this->is_fetched_kernel_conf == 0) {
			$data_array = array();

			$file = file($GLOBALS['config_path_to_kernel_config']);
			foreach($file as $line) {
				$line = trim($line);

				if (empty($line) || $line{0} == '#') continue;
				$line = preg_split("/\s+/", $line, 3);
				if(!empty($line[2]) && $line[2]{1} != ' ') $line[2] = '# ' . substr($line[2], 1);
				$data_array[$line[0]][$line[1]] = $line[2];
			}
			$this->is_fetched_kernel_conf = 1;
			$this->fetched_kernel_conf = $data_array;
		}
		return $this->fetched_kernel_conf;
	}
}
?>