<?php
/*  Convert seconds to readable format hh:min:sec.
 *
 */
function tickToTime($time) {
	$minute = 60;
	$hour = $minute * 60;
	$day = $hour * 24;

	$ret  = (int)($time / $day) . " days, ";
	$ret .= adaptTime((int)(($time % $day) / $hour)) . ":";
	$ret .= adaptTime((int)(($time % $hour) / $minute)) . ":";
	$ret .= adaptTime((int)($time % $minute));

	return $ret;
}


/* Converts hours from one to a two number format.
 * Example : 1:30 -> 01:30
 */
function adaptTime($time) {
	if ($time >= 10) return $time;
	else return "0" . $time;
}

function formatSize($data) {
	return number_format($data / (1024 * 1024), 2, ',', ' ') . ' MB';
}

function float2int($flt) {
	$int = ($flt / (1024 * 1024)) + 0.1;
	settype($int, "integer");
	return $int;
}

function mb2byte($megabytes) {
	if ($megabytes == 0) return 0;

	$mb = $megabytes * (1024 * 1024);
	return $mb;
}

function byte2mb($bytes) {
	if ($bytes == 0) return 0;

	$bts = $bytes / (1024 * 1024);
	return number_format($bts, 2, '.', '');
}

function tab2space ($line, $spaces = 8) {
	while (false !== $tab_pos = strpos($line, "\t")) {

		$start = substr($line, 0, $tab_pos);
		$tab   = str_repeat(' ', $spaces - $tab_pos % $spaces);
		$end   = substr($line, $tab_pos + 1);
		$line  = $start . $tab . $end;
	}

	return $line;
}

/* Used to color a graph after a certain percent value
 */
function getColor($percent) {
	$color = "red";
	if ($percent < 80) $color = "yellow";
	if ($percent < 50) $color = "green";
	return $color;
}

function make_traffic_time($label, $userid) {
	global $db;
	?>
		<table class="box">
			<tr>
				<td class="box-headline">&gt;&gt; <?php echo $label; ?></td>
			</tr>
			<tr>
				<td>
				<table class="box" style="border-style: none;">
				<tr>
					<td width="100"  class="box-pl" align="center">&nbsp;</td>
					<td width="*"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['downloaded']; ?></td>
					<td width="60"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['numfiles']; ?></td>
					<td width="*"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['uploaded']; ?></td>
					<td width="60"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['numfiles']; ?></td>
				</tr>
				<?php
				$statistics = $db->get_stats_bytimestamp($userid);
				make_traffic_time_row($statistics[0]);
				make_traffic_time_row($statistics[1]);
				make_traffic_time_row($statistics[2]);
				make_traffic_time_row($statistics[3]);
				echo '<tr><td colspan="5" class="box-pl" style="font-size: 2px;">&nbsp;</td></tr>';
				echo '<tr><td colspan="5" class="box-sel" style="font-size: 2px;">&nbsp;</td></tr>';
				make_traffic_time_row($statistics[4]);
				?>
				</table>
				</td>
			</tr>
		</table>
	<?php
}

function make_traffic_time_row($data) {
	echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
	echo '	<td width="100"  class="box-sel">' . $data['label'] . '</td>';
	echo '	<td width="*"  class="box-sel" align="right">' . formatSize(@$data["RETR"]["bytes"]) . '</td>';
	echo '	<td width="60"  class="box-sel" align="right">' . number_format((@$data["RETR"]["files"]), 0, " ", " ") . '</td>';
	echo '	<td width="*"  class="box-sel" align="right">' . formatSize(@$data["STOR"]["bytes"]) . '</td>';
	echo '	<td width="60"  class="box-sel" align="right">' . number_format((@$data["STOR"]["files"]), 0, " ", " ") . '</td>';
	echo '</tr>';
}

function make_traffic_section($label, $username, $command) {
	global $config_ftp_root, $config_ftp_sections_down, $config_ftp_sections_up, $db;
	if ($command == "RETR") $config_ftp_sections = $config_ftp_sections_down;
	if ($command == "STOR") $config_ftp_sections = $config_ftp_sections_up;

	$whereclause = ' command="' . $command . '" AND cmd="c" ';
	if ($username != 'total') $whereclause =  'xfer_stat.userid="' . $username . '" AND ' . $whereclause;
	?>
		<table class="box">
			<tr>
				<td class="box-headline">&gt;&gt; <?php echo $label; ?></td>
			</tr>
			<tr>
				<td>
				<table class="box" style="border-style: none;">
				<tr>
					<td width="*"  class="box-pl" align="center">&nbsp;</td>
					<?php
					if ($username == "total") echo '<td width="100"  class="box-pl" align="center">' . $GLOBALS['language']['util']['mostactive'] . '</td>';
					?>
					<td width="150"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['total_amount']; ?></td>
					<td width="100"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['numfiles']; ?></td>
				</tr>
				<?php
				foreach($config_ftp_sections as $section) {
					$full_path = $config_ftp_root . $section;
					$section_stats = $db->get_stats_bysection($full_path, $command, $username);

					$mostActiveUID 	= -1;
					$mostActive 	= '';
					$highestSize 	= 0;
					$result			= array();

					foreach($section_stats as $stat) {
						if ($stat['file_size'] > $highestSize) {
							$highestSize 	= $stat['file_size'];
							$mostActive 	= $stat['userid'];
							$mostActiveUID	= $stat['uid'];
						}
						$result['file_size'] += $stat['file_size'];
						$result['num_files'] += $stat['num_files'];
					}
					if ($mostActiveUID != -1) $mostActive = '<a href="user_view.php?viewID=' . $mostActiveUID . '">' . $mostActive . '</a>';

					if (strlen($section) > 1 and $section[0] == '/') $section = substr($section, 1);
					echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
					echo '	<td width="*"  class="box-sel" align="left">' . $section . '</td>';
					if ($username == "total")  echo '<td width="100"  class="box-sel" align="left">' . $mostActive . '</td>';
					echo '	<td width="150"  class="box-sel" align="right">' . formatSize(@$result["file_size"]) . '</td>';
					echo '	<td width="100"  class="box-sel" align="right">' . number_format((@$result["num_files"]), 0, " ", " ") . '</td>';
					echo '</tr>';
				}
				?>
				</table>
				</td>
			</tr>
		</table>
	<?php
}

function make_toplist_bycommand($label, $command) {
	global $config_toplist_num_names, $config_toplist_padlist, $db;
	?>
		<table class="box">
			<tr>
				<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['util']['top'] . ' ' .$config_toplist_num_names . " " . $label; ?></td>
			</tr>
			<tr>
				<td>
				<table class="box" style="border-style: none;">
				<tr>
					<td width="15"  class="box-pl" align="center">&nbsp;</td>
					<td width="100"   class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['username']; ?></td>
					<td width="*"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['total_amount']; ?></td>
					<td width="100"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['numfiles']; ?></td>
					<td width="120"  class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['lastlogin']; ?></td>
				</tr>
				<?php
					$statistics = $db->get_stats_bycommand($command);
					$cntr = 1;

					foreach($statistics as $stat) {
						echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
						echo '<td width="15"  class="box-sel" align="center">' . $cntr . '.</td>';

						if (!isset($stat["uid"])) echo '<td width="100"   class="box-sel" align="left">' . @$stat["userid"] . '</td>';
						else echo '<td width="100"   class="box-sel" align="left"><a href="user_view.php?viewID=' . @$stat["uid"] . '">' . @$stat["userid"] . '</a></td>';
						echo '<td width="*"  class="box-sel" align="right">' . formatSize(@$stat["bytes"]) . '</td>';
						echo '<td width="100"  class="box-sel" align="right">' . number_format(@$stat["files"], 0, " ", " ") . '</td>';
						echo '<td width="120"  class="box-sel" align="center">' . @$stat["lastlogin"] . '</td>';
						echo '</tr>';

						$cntr++;
					}

					if ($config_toplist_padlist) {
						while ($cntr <= $config_toplist_num_names) {
							echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
							echo '<td width="15"  class="box-sel" align="center">' . $cntr . '.</td>';
							echo '<td width="*"   colspan="4" class="box-sel" align="left">&nbsp;</td>';
							echo '</tr>';
							$cntr++;
						}
					}
				?>
				</table>
				</td>
			</tr>
		</table>
	<?php
}

function make_logviewer($logskip, $page_link, $username = "total") {
	?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['transfers']['transfer_log']; ?></td>
		</tr>
		<tr>
			<td>
			<table class="box" style="border-style: none;">
			<tr>
			<?php
				if ($username == "total") {
					echo '<td width="*"  class="box-pl" align="center">' . $GLOBALS['language']['util']['user'] . '</td>';
				}
			?>
				<td width="100"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['timestamp']; ?></td>
				<td width="*"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['filename']; ?></td>
				<td width="*"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['size']; ?></td>
				<td width="80"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['command']; ?></td>
				<td width="50"  class="box-pl" align="center"><?php echo $GLOBALS['language']['util']['duration']; ?></td>
			</tr>
	<?php
			$logitems = $GLOBALS['db']->get_stats_logs($logskip, $username);
			makeNavBar(count($logitems), $username, $page_link);

			foreach($logitems as $log) {
				if ($GLOBALS['config_userview_striplogpath']) {
					if (substr($log["file"], 0, strlen($GLOBALS['config_ftp_root'])) == $GLOBALS['config_ftp_root']) $log["file"] = substr($log["file"], strlen($GLOBALS['config_ftp_root']) + 1);
				}

				echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
				if ($username == "total") {
					$uid = $GLOBALS['db']->get_UIDbyUSERNAME($log["userid"]);
					if ($uid == -1) echo '	<td width="*"  class="box-sel" align="left" valign="top">' . $log["userid"] . '</td>';
					else {
						echo '	<td width="*"  class="box-sel" align="left" valign="top">';
						echo '<a href="user_view.php?viewID=' . $uid . '">';
						echo $log["userid"];
						echo '</a></td>';
					}
				}
				echo '	<td width="90"  class="box-sel" align="center" valign="top">' . $log["time"] . '</td>';
				echo '	<td width="*"  class="box-sel" align="left" valign="top">' . format_filename($log["file"]) . '</td>';
				echo '	<td width="*"  class="box-sel" align="right" valign="top">' . formatSize($log["size"]) . '</td>';
				echo '	<td width="80"  class="box-sel" align="center" valign="top">' . $log["command"] . '</td>';
				echo '	<td width="50"  class="box-sel" align="right" valign="top">' . $log["timespent"] . ' s</td>';
				echo '</tr>';
			}

			makeNavBar(count($logitems), $username, $page_link);
	?>
			</table>
			</td>
		</tr>
	</table>
	<?php
}

function makeNavBar($num_rows, $username, $page_link) {
	global $config_userview_logitems, $config_style_name;
	$span = 5;
	if ($username == "total") $span = 6;

	echo '<tr>';
	echo '<td width="*"  class="box-sel" align="right" colspan="' . $span . '">';

	if (isset($_GET["logskip"]) && $_GET["logskip"] !=0) echo '<a href="' . $page_link . 'logskip=' . ($_GET["logskip"] - $config_userview_logitems) . '"><img src="style/' . $config_style_name . '/left.gif" style="border: none; margin-right: 0px;" alt=""></a>';
	else echo '<img src="style/' . $config_style_name . '/nleft.gif" style="border: none;" alt="">';

	echo '<a href="' . $page_link . 'logskip=0' . '"><img src="style/' . $config_style_name . '/center.gif" style="border: none;" alt=""></a>';

	if ($num_rows == $config_userview_logitems) echo '<a href="' . $page_link . 'logskip=' . ($_GET["logskip"] + $config_userview_logitems) . '"><img src="style/' . $config_style_name . '/right.gif" style="border: none; margin-left: 0px;" alt=""></a>';
	else echo '<img src="style/' . $config_style_name . '/nright.gif" style="border: none;" alt="">';

	echo '</td>';
	echo '</tr>';
}

function format_filename ($filename) {
	$result = wordwrap($filename, 80, "<br>", 1);
	return $result;
}
function fix_home ($path){
	$npath = split('[/]', $path);
	echo "/".$npath[count($npath)-2]."/".$npath[count($npath)-1];
}
?>