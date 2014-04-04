<?php
/* This file contains all the information needed to connect
 * to the database.
 */
require_once('include_config.php');
require_once('include_general.php');
require_once('include_util.php');
require_once('include_database.php');

$db = db_get_dbclass();
$db->do_connect();
$db->do_select_db();

if (!$db->is_ready()) {
	doHeader();
	doFooter();
	exit();
}
?>