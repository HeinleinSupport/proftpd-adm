<?php
require_once('include_config.php');
require_once('class_database.php');
require_once('class_database_mysql.php');
require_once('class_database_mysql_old_password.php');

function db_get_dbclass() {
	if ($GLOBALS['config_database_type'] == 'MySQL') {

		switch ($GLOBALS['config_database_subtype']) {
			case 'old_password':
				return new MySQL_OLD();

			default:
				return new MySQL();
		}
	}
	else return new Database();
}
?>