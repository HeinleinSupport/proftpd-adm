<?php
	//print_r($_POST);

	/* Process generic commands alone since WinNT do not have any of these */
	if (isset($_POST['frm_config_path_who']) || isset($_POST['frm_config_path_df']) ||
		isset($_POST['frm_config_path_sysctl']) || isset($_POST['frm_config_path_ftpwho']) ||
		isset($_POST['frm_config_path_ps'])) {

		$config_path_to_who 	= @$_POST['frm_config_path_who'];
		$config_path_to_df 		= @$_POST['frm_config_path_df'];
		$config_path_to_sysctl 	= @$_POST['frm_config_path_sysctl'];
		$config_path_to_ftpwho 	= @$_POST['frm_config_path_ftpwho'];
		$config_path_to_ps		= @$_POST['frm_config_path_ps'];

		$writeconfig = true;
	}

	$osname = '';
	switch (PHP_OS) {
		case 'Linux':		$osname = 'linux'; 	break;
		case 'FreeBSD':		$osname = 'bsd'; 	break;
		case 'NetBSD':		$osname = 'bsd'; 	break;
		case 'WINNT':		$osname = 'winnt'; 	break;
	}

	switch (PHP_OS) {
		case 'Linux':
		case 'NetBSD':
		case 'FreeBSD':
			if (isset($_POST['frm_config_path_kernel']) || isset($_POST['frm_config_path_proftpd'])) {
				$configuration['file_paths']['os_specific'][$osname]['kernel_configuration'] = $_POST['frm_config_path_kernel'];
				$configuration['file_paths']['os_specific'][$osname]['proftpd'] = $_POST['frm_config_path_proftpd'];

				$writeconfig = true;
			}
			break;
		case 'WINNT':
			if (isset($_POST['frm_config_path_winutils'])) {
				$configuration['file_paths']['os_specific'][$osname]['ftpadmin_utils'] = $_POST['frm_config_path_winutils'];

				$writeconfig = true;
			}
			break;
		default:
			break;
	}
?>