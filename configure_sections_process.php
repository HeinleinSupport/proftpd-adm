<?php
if (isset($_GET['remove_download'])) {
	$config_ftp_sections_down = array_filter($config_ftp_sections_down, "remove_download");
	$writeconfig = true;
}

if (isset($_GET['remove_upload'])) {
	$config_ftp_sections_up = array_filter($config_ftp_sections_up, "remove_upload");
	$writeconfig = true;
}

if (isset($_POST['frm_sections_download'])) {
	if (array_search($_POST['frm_sections_download'], $config_ftp_sections_down) === false) {
		array_push($config_ftp_sections_down, $_POST['frm_sections_download']);
		$writeconfig = true;
	}
}

if (isset($_POST['frm_sections_upload'])) {
	if (array_search($_POST['frm_sections_upload'], $config_ftp_sections_up) === false) {
		array_push($config_ftp_sections_up, $_POST['frm_sections_upload']);
		$writeconfig = true;
	}
}

function remove_download($var) {
	return ($_GET['remove_download'] != $var);
}

function remove_upload($var) {
	return ($_GET['remove_upload'] != $var);
}
?>