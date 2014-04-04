<?php
require_once('class_system.php');
require_once('class_system_Linux.php');
require_once('class_system_BSD_FreeBSD.php');
require_once('class_system_BSD_NetBSD.php');
require_once('class_system_WINNT.php');

function sys_statusavailable() {
	switch (sys_getosname()) {
		case 'Linux':		return 1;
		case 'FreeBSD':		return 1;
		case 'NetBSD':		return 1;
		case 'WINNT':		return 1;
		default:			return 0;
	}
}

function sys_getosname() {
	return PHP_OS;
}

function sys_getinfoclass() {
	switch (sys_getosname()) {
		case 'Linux':		return new Linux();
		case 'FreeBSD':		return new FreeBSD();
		case 'NetBSD':		return new NetBSD();
		case 'WINNT':		return new WINNT();
		default:			return new System();
	}
}
?>