<?php
if (isset($_GET['remove_mountpoint'])) {
	$config_skip_mpoints = array_filter($config_skip_mpoints, "remove_point");
	$writeconfig = true;
}


if (isset($_POST['frm_mountpoint'])) {
	array_push($config_skip_mpoints, $_POST['frm_mountpoint']);
	$writeconfig = true;
}

function remove_point($var) {
	return ($_GET['remove_mountpoint'] != $var);
}
?>