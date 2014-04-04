<?php
function recursive_obj2array($obj, &$subject_array=array()) {
	foreach ((array) $obj as $key => $var) {
		if (is_object($var)) {
			if(count((array) $var) == 0) {
				$subject_array[$key] = '';
			} else {
				recursive_obj2array($var, $subject_array[$key]);
			}
		} else {
			$subject_array[$key] = $var;
		}
	}
}

function load_configuration() {
	$configuration = array();

	$xml = simplexml_load_file('configuration.xml');
	$xml = recursive_obj2array($xml, $configuration);

	$osname = 'generic';
	switch (PHP_OS) {
		case 'Linux':		$osname = 'linux'; 	break;
		case 'FreeBSD':		$osname = 'bsd'; 	break;
		case 'NetBSD':		$osname = 'bsd'; 	break;
		case 'WINNT':		$osname = 'winnt'; 	break;
	}

	$configuration['file_paths']['generic']
		= array_merge(	$configuration['file_paths']['generic'],
						$configuration['file_paths']['os_specific'][$osname]);

	return $configuration;
}
?>