<?php
require_once('include_prepare.php');
require_once('include_system.php');

if (sys_statusavailable() == 0) {
	doHeader();
	doError($GLOBALS['language']['status']['nosupport'], $GLOBALS['language']['status']['nosupport_desc']);
	doFooter();
	exit();
}

$system = sys_getinfoclass();


doHeader();
?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['status']['status']; ?></td>
		</tr>
		<tr>
			<td>
			<table class="box" style="border-style: none;">
			<tr><td colspan="5" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
			<tr>
				<td colspan="2" class="box-subheadline" width="300"><?php echo $GLOBALS['language']['status']['system']; ?></td>
				<td width="100">&nbsp;</td>
				<td colspan="2" class="box-subheadline" width="300"><?php echo $GLOBALS['language']['status']['version']; ?></td>
			</tr>
			<tr>
				<td class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['name']; ?></td>
				<td class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['value']; ?></td>
				<td width="100">&nbsp;</td>
				<td class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['program']; ?></td>
				<td class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['version']; ?></td>
			</tr>
			<tr>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['ip']; ?>:</td>
				<td class="box-sel"><?php echo getenv('SERVER_ADDR'); ?></td>
				<td width="100">&nbsp;</td>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['http']; ?>:</td>
				<td class="box-sel"><?php echo $system -> get_httpversion(); ?></td>
			</tr>
			<tr>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['kernel_version']; ?>:</td>
				<td class="box-sel"><?php echo $system -> get_kernelversion(); ?></td>
				<td width="100">&nbsp;</td>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['db_server']; ?>:</td>
				<td class="box-sel"><?php echo mysql_get_server_info(); ?></td>
			</tr>
			<tr>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['uptime']; ?>:</td>
				<td class="box-sel"><?php echo $system -> get_uptime(); ?></td>
				<td width="100">&nbsp;</td>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['php_version']; ?>:</td>
				<td class="box-sel"><?php echo phpversion(); ?></td>
			</tr>
			<tr>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['idle_time']; ?>:</td>
				<td class="box-sel"><?php echo $system -> get_idletime(); ?></td>
				<td width="100">&nbsp;</td>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['zend_version']; ?>:</td>
				<td class="box-sel"><?php echo zend_version(); ?></td>
			</tr>
			<tr>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['term_users']; ?>:</td>
				<td class="box-sel"><?php echo $system -> get_terminal_num_users(); ?></td>
				<td width="100">&nbsp;</td>
				<td class="box-sel">&nbsp;</td>
				<td class="box-sel">&nbsp;</td>
			</tr>
			<?php
			if ($config_sysinfo_only == false) {
			?>
			<tr>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['ftp_users']; ?>:</td>
				<td class="box-sel"><?php echo $system -> get_ftp_num_users(); ?></td>
				<td width="100">&nbsp;</td>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['proftpd_version']; ?>:</td>
				<td class="box-sel"><?php echo $system -> get_ftpversion(); ?></td>
			</tr>
			<?php
			}
			?>
			<tr>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['load']; ?>:</td>
				<td class="box-sel"><?php echo $system -> get_systemload(); ?></td>
				<td width="100">&nbsp;</td>
				<td class="box-sel-head"><?php echo $GLOBALS['language']['status']['web_interface']; ?>:</td>
				<td class="box-sel"><?php echo $config_proftp_admin_version; ?></td>
			</tr>
			</table>
			</td>
		</tr>
	</table>
<?php
	$status_menu = array();
	if ($system->have_section_processes())	$status_menu[$GLOBALS['language']['status']['menu_processlist']]= $_SERVER['PHP_SELF'] . '?section=processes';
	if ($system->have_section_resources())	$status_menu[$GLOBALS['language']['status']['menu_resources']]	= $_SERVER['PHP_SELF'] . '?section=resources';
	if ($system->have_section_hardware())   $status_menu[$GLOBALS['language']['status']['menu_hardware']]	= $_SERVER['PHP_SELF'] . '?section=hardware';
	if ($system->have_section_kernel())   	$status_menu[$GLOBALS['language']['status']['menu_kernel']]		= $_SERVER['PHP_SELF'] . '?section=kernel';
											$status_menu["<spacer>"]										= '';
											$status_menu[$GLOBALS['language']['status']['menu_database']]	= $_SERVER['PHP_SELF'] . '?section=database';
	if ($system->have_section_proftpd())   	$status_menu[$GLOBALS['language']['status']['menu_proftpd']]	= $_SERVER['PHP_SELF'] . '?section=proftpd';
	doMenu($status_menu);
	echo '<br><br>';

	/* Processlist*/
	if (isset($_GET["section"]) and $_GET["section"] == "processes") {
		include('status_processes.php');
	}

	/* Hardware section */
	if (isset($_GET["section"]) and $_GET["section"] == "hardware") {
		include('status_hardware.php');
	}

	/* Resources section */
	if (isset($_GET["section"]) and $_GET["section"] == "resources") {
		include('status_resources.php');
	}

	/* Resources section */
	if (isset($_GET["section"]) and $_GET["section"] == "kernel") {
		include('status_kernel.php');
	}

	/* Database section */
	if (isset($_GET["section"]) and $_GET["section"] == "database") {
		include('status_database.php');
	}

	/* ProFTPd section */
	if (isset($_GET["section"]) and $_GET["section"] == "proftpd") {
		include('status_proftpd.php');
	}

doFooter();

function print_info($res_data) {
	foreach ($res_data as $key => $value) {
		echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
		echo '	<td width="140"  class="box-sel" align="left" valign="top">' . $key . '</td>';
		echo '	<td width="*" colspan="2" class="box-sel" align="left">' . $value . '</td>';
		echo '</tr>';
	}
}
?>