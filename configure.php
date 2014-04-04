<?php
require_once('include_config.php');
require_once('include_system.php');
require_once('include_util.php');

if(sys_statusavailable()) {
	$system = sys_getinfoclass();
}

if (isset($_GET["section"]) and $_GET["section"] == "database") 	include('configure_database_process.php');
if (isset($_GET["section"]) and $_GET["section"] == "proftpd") 		include('configure_proftpd_process.php');
if (isset($_GET["section"]) and $_GET["section"] == "ui") 			include('configure_ui_process.php');
if (isset($_GET["section"]) and $_GET["section"] == "mountpoint") 	include('configure_mountpoint_process.php');
if (isset($_GET["section"]) and $_GET["section"] == "sections") 	include('configure_sections_process.php');
if (isset($_GET["section"]) and $_GET["section"] == "paths") 		include('configure_paths_process.php');
if (isset($_GET["section"]) and $_GET["section"] == "quota") 		include('configure_quota_process.php');
if (isset($_GET["section"]) and $_GET["section"] == "extensions") 	include('configure_extensions_process.php');

if (isset($writeconfig) && $writeconfig == true) {
	include('configure_writeconfig.php');
}

require_once('include_general.php');
doHeader();

?>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['configure']; ?></td>
	</tr>
	<tr>
		<td>
			<table class="box" style="border-style: none;">
				<tr>
					<td class="box-sel" align="center"><?php echo $GLOBALS['language']['general']['select_subsection']; ?></td>
				</tr>
				<?php
					echo '<tr>';
					echo '	<td class="box-sel" align="justify">';
							if (!is_writable('configuration.xml')) {
								echo '<br><span class="error">' . $GLOBALS['language']['configure']['no_write_config'] . '</span>';
							}
					echo '	</td>';
					echo '</tr>';
				?>
			</table>
		</td>
	</tr>
</table>
<?php
$stats_menu[$GLOBALS['language']['configure']['menu_database']]		= $_SERVER['PHP_SELF'] . '?section=database';
if($config_sysinfo_only != 1) $stats_menu[$GLOBALS['language']['configure']['menu_proftpd']]		= $_SERVER['PHP_SELF'] . '?section=proftpd';
$stats_menu[$GLOBALS['language']['configure']['menu_interface']]	= $_SERVER['PHP_SELF'] . '?section=ui';
if(sys_statusavailable()) $stats_menu[$GLOBALS['language']['configure']['menu_mpoint']] = $_SERVER['PHP_SELF'] . '?section=mountpoint';
if($config_sysinfo_only != 1) $stats_menu[$GLOBALS['language']['configure']['menu_sections']]		= $_SERVER['PHP_SELF'] . '?section=sections';
$stats_menu[$GLOBALS['language']['configure']['menu_filepaths']]	= $_SERVER['PHP_SELF'] . '?section=paths';
if($config_sysinfo_only != 1 && $config_ext['quota']['enabled'] == 1) $stats_menu[$GLOBALS['language']['configure']['menu_quota']] = $_SERVER['PHP_SELF'] . '?section=quota';
if($config_sysinfo_only != 1 && $config_ext['pdns']['enabled'] == 1) $stats_menu[$GLOBALS['language']['configure']['menu_pdns']] = $_SERVER['PHP_SELF'] . '?section=pdns';
$stats_menu[$GLOBALS['language']['configure']['menu_extension']]	= $_SERVER['PHP_SELF'] . '?section=extensions';
if (is_writable('configuration.xml')) doMenu($stats_menu);

echo '<br><br>';
if (isset($_GET["section"]) and $_GET["section"] == "database") 	include('configure_database.php');
if (isset($_GET["section"]) and $_GET["section"] == "proftpd") 		include('configure_proftpd.php');
if (isset($_GET["section"]) and $_GET["section"] == "ui") 			include('configure_ui.php');
if (isset($_GET["section"]) and $_GET["section"] == "mountpoint") 	include('configure_mountpoint.php');
if (isset($_GET["section"]) and $_GET["section"] == "sections") 	include('configure_sections.php');
if (isset($_GET["section"]) and $_GET["section"] == "paths") 		include('configure_paths.php');
if ($config_ext['quota']['enabled'] == 1 && isset($_GET["section"]) and $_GET["section"] == "quota") include('configure_quota.php');
if ($config_ext['pdns']['enabled'] == 1 && isset($_GET["section"]) and $_GET["section"] == "pdns") include('configure_pdns.php');
if (isset($_GET["section"]) and $_GET["section"] == "extensions") 	include('configure_extensions.php');

doFooter();
?>
