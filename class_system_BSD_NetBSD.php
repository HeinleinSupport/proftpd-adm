<?php
require_once('class_system.php');
require_once('class_system_BSD.php');
require_once('class_system_BSD_FreeBSD.php');

class NetBSD extends FreeBSD {
	function NetBSD() {
	}

	function get_osclass() {
		return 'NetBSD';
	}
}
?>