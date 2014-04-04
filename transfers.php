<?php
require_once('include_prepare.php');
doHeader();

?>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['transfers']['transfers']; ?></td>
	</tr>
	<tr>
		<td>
			<table class="box" style="border-style: none;">
				<tr>
					<td class="box-sel" align="center"><?php echo $GLOBALS['language']['general']['select_subsection']; ?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php
$stats_menu[$GLOBALS['language']['menu']['statistics']]			= $_SERVER['PHP_SELF'] . '?section=statistics';
$stats_menu[$GLOBALS['language']['menu']['toplists']]			= $_SERVER['PHP_SELF'] . '?section=toplist';
$stats_menu[$GLOBALS['language']['menu']['section']]			= $_SERVER['PHP_SELF'] . '?section=section';
$stats_menu["<spacer_1>"]											= '';
$stats_menu[$GLOBALS['language']['menu']['transfer_log']]		= $_SERVER['PHP_SELF'] . '?section=logs';
$stats_menu[$GLOBALS['language']['menu']['log_files']]			= $_SERVER['PHP_SELF'] . '?section=on_file';
$stats_menu["<spacer_2>"]										= '';
$stats_menu[$GLOBALS['language']['transfers']['write_logs']]	= $_SERVER['PHP_SELF'] . '?section=write_logs';
$stats_menu[$GLOBALS['language']['transfers']['delete_logs']] 	= $_SERVER['PHP_SELF'] . '?section=delete_logs';
doMenu($stats_menu);

echo '<br><br>';
if (isset($_GET["section"]) and $_GET["section"] == "statistics") {
	make_traffic_time($GLOBALS['language']['transfers']['traffic_stats'], "total");
}

if (isset($_GET["section"]) and $_GET["section"] == "toplist") {
	make_toplist_bycommand($GLOBALS['language']['transfers']['downloaders'], "RETR");
	echo '<br><br>';
	make_toplist_bycommand($GLOBALS['language']['transfers']['uploaders'], "STOR");
}

if (isset($_GET["section"]) and $_GET["section"] == "section") {
	make_traffic_section($GLOBALS['language']['transfers']['down_sections'], "total", "RETR");
	echo '<br><br>';
	make_traffic_section($GLOBALS['language']['transfers']['up_sections'], "total", "STOR");
}

if (isset($_GET["section"]) and $_GET["section"] == "logs") {
	$logskip = 0;
	if (isset($_GET["logskip"]) && $_GET["logskip"] !=0) $logskip = $_GET["logskip"];

	make_logviewer($logskip, $_SERVER['PHP_SELF'] . '?section=logs&amp;');
}

if (isset($_GET["section"]) and $_GET["section"] == "on_file") {
	if (isset($_GET['category']) && isset($_GET['file']) && verify($_GET['category'], $_GET['file'])) {
		$full_log = false;
		if (isset($_GET["full_log"]) && $_GET["full_log"] == 1) $full_log = true;

		viewLog('logs/' . $_GET['category'] . '/' . $_GET['file'], $full_log);
	} else include('transfers_on_file.php');
}

if (isset($_GET["section"]) and $_GET["section"] == "write_logs") {
	include('transfers_to_file.php');
}


if (isset($_GET["section"]) and $_GET["section"] == "delete_logs") {
		include('transfers_delete_logs.php');
}
?>
<?php
doFooter();

function verify($category, $file) {
	if ($category != 'users' && $category != 'groups') return false;

	if (($handle = @opendir('logs/' . $category . '/'))) {
		while (false !== ($ls_file = readdir($handle))) {
			if ($ls_file == '.' || $ls_file == '..') continue;

			if ($ls_file == $file) {
				closedir($handle);
				return true;
			}
		}
		closedir($handle);
		unset($handle);
	}
	return false;
}

function viewLog($filename, $full_log = false) {
	$content = @file($filename);
	$size = count($content);

	$content = array_reverse($content);
	if (!$full_log && $size > 200) $content = array_slice($content, 0, 200);
	$content = implode('', $content);

	if (!$full_log && $size > 200) {
		$content = $GLOBALS['language']['transfers']['log_snippet_notice'] . $content;
	}
	?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $filename; ?></td>
		</tr>
		<tr>
			<td>
				<table class="box" style="border-style: none;">
					<tr>
						<td>
							<textarea name="frm_notes" rows="45" cols="130" style="width: 691px;" WRAP="OFF"><?php echo $content; ?></textarea>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<?php
	$back_menu[$GLOBALS['language']['transfers']['full_log_bt']] = $_SERVER['PHP_SELF'] . '?section=on_file&amp;category=' . $_GET['category'] . '&amp;file=' . $_GET['file'] . '&amp;full_log=1';
	$back_menu[$GLOBALS['language']['menu']['log_files']]   = $_SERVER['PHP_SELF'] . '?section=on_file';
	doMenu($back_menu);
}
?>