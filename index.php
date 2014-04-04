<?php
require_once('include_prepare.php');

if ($config_sysinfo_only) {
	include('status.php');
	exit();
}

doHeader();
$system = sys_getinfoclass();
if ($system->have_section_logon_data() == 0) {
	doFooter();
	exit();
}
?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['mainpage']['ftp']; ?></td>
		</tr>
		<tr>
			<td>
			<table class="box" style="border-style: none;">
				<tr>
					<td width="50" class="box-pl" align="center"><?php echo $GLOBALS['language']['mainpage']['pid']; ?></td>
					<td width="100"  class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['username']; ?></td>
					<td width="50" class="box-pl" align="center"><?php echo $GLOBALS['language']['mainpage']['uptime']; ?></td>
					<td width="80" class="box-pl" align="center"><?php echo $GLOBALS['language']['mainpage']['idle']; ?></td>
					<td width="50" class="box-pl" align="center"><?php echo $GLOBALS['language']['mainpage']['command']; ?></td>
					<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['mainpage']['command_info']; ?></td>
				</tr>
					<?php
					$conn = $system->get_ftp_userdata();
					foreach ($conn as $data) {
						echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
						echo '<td width="50"  class="box-sel" align="left">' . $data["pid"] . '</td>';
						echo '<td width="100" class="box-sel" align="left">' . formatUSERNAME($data["username"]) . '</td>';
						echo '<td width="50"  class="box-sel" align="left">' . $data["uptime"]. '</td>';
						echo '<td width="80"  class="box-sel" align="left">' . $data["idle"] . '</td>';
						echo '<td width="50"  class="box-sel" align="left">' . $data["cmd"] . '</td>';
						echo '<td width="*"   class="box-sel" align="left">' . $data["cmd_info"] . '</td>';
						echo '</tr>';
					}
					?>
			</table>
			</td>
		</tr>
	</table>
	<br>
	<br>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['mainpage']['terminal']; ?></td>
		</tr>
		<tr>
			<td>
			<table class="box" style="border-style: none;">
				<tr>
					<td width="100" class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['username']; ?></td>
					<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['mainpage']['device']; ?></td>
					<td width="*"   class="box-pl" align="center"><?php echo $GLOBALS['language']['mainpage']['time_login']; ?></td>
				</tr>
					<?php
					$conn = $system->get_terminal_userdata();
					foreach ($conn as $data) {
						echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
						echo '<td width="100" class="box-sel" align="left">' . formatUSERNAME($data['username']) . '</td>';
						echo '<td width="*" class="box-sel" align="left">' . $data['device'] . '</td>';
						echo '<td width="*"   class="box-sel" align="left">' . $data['time'] . '</td>';
						echo '</tr>';
					}
					?>
			</table>
			</td>
		</tr>
	</table>
	<br>
	<br>
<?php
doFooter();

function formatUSERNAME($username) {
	global $db;

	$uid = $db->get_UIDbyUSERNAME($username);

	if ($uid == -1) return $username;
	else return '<a href="user_view.php?viewID=' . $uid . '">' . $username . '</a>';
}
?>