<?php
	if (isset($_POST['frm_proftd_ftproot']) || isset($_POST['frm_proftd_defhome']) ||
		isset($_POST['frm_proftd_cucmd']) || isset($_POST['frm_proftpd_defshell']) ||
		isset($_POST['frm_proftd_ducmd']) || isset($_POST['frm_proftd_ftcmd']) ) {

		$config_ftp_root = @$_POST['frm_proftd_ftproot'];
		$config_ftp_default_home = @$_POST['frm_proftd_defhome'];
		$config_createuser_command = @$_POST['frm_proftd_cucmd'];
		$config_deleteuser_command = @$_POST['frm_proftd_ducmd'];
		$config_filetreeuser_command = @$_POST['frm_proftd_ftcmd'];
		$config_default_shell = @$_POST['frm_proftpd_defshell'];

		$writeconfig = true;
	}
?>
