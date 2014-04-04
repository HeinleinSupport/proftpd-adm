<?php
	if (isset($_POST['frm_database_username']) || isset($_POST['frm_database_hostname']) ||
		isset($_POST['frm_database_password']) || isset($_POST['frm_database_database']) ||
		isset($_POST['frm_database_type'])     || isset($_POST['frm_database_subtype'])) {

		$config_database_type 		= @$_POST['frm_database_type'];
		$config_database_subtype    = @$_POST['frm_database_subtype'];
		$config_database_host 		= @$_POST['frm_database_hostname'];
		$config_database_user 		= @$_POST['frm_database_username'];
		$config_database_passord 	= @$_POST['frm_database_password'];
		$config_database_database 	= @$_POST['frm_database_database'];

		$writeconfig = true;
	}
?>