<?php
require_once('include_prepare.php');

doHeader();
$cmd_output = '';
$sel_ok = false;
$res_data = array();

if ((isset($_POST["frm_nvhname"]) && $_POST["frm_nvhname"]!='') AND (isset($_POST["frm_nvhpath"]) && $_POST["frm_nvhpath"]!='') AND (isset($_POST["frm_uid"]) && $_POST["frm_uid"]!='')) {
	if (!$db->do_add_vhuser($_POST["frm_nvhname"], $_POST["frm_nvhpath"], $_POST["frm_uid"], $config_ext['pdns']['enabled'], $_POST["frm_record_type"], $_POST["frm_record_content"], $_POST["frm_record_ttl"], $_POST["frm_record_prio"])) {
	    $exists = 0;
	} else {
	    $exists = 1;
	}
}

if (isset($_GET["viewID"]) && strlen($_GET["viewID"]) != 0) {
	if (isset($_POST["frm_date"]) && strlen($_POST["frm_date"]) != 0) {
		$db->do_set_user_expiration($_GET["viewID"], $_POST["frm_date"]);
	}

	if (isset($_POST["frm_main_group"])) {
		if ($db->get_UID_exists($_GET["viewID"]) != 0 and $db->get_GID_exists($_POST["frm_main_group"])) {
			$db->do_set_user_primarygroup($_GET["viewID"], $_POST["frm_main_group"]);
		}
	}

	if (isset($_POST["frm_add_group"])) {
		$user_data = $db->get_userlist_by_id($_GET["viewID"]);

		if (count($user_data) != 0 and $db->get_GID_exists($_POST["frm_add_group"])) {
			$user_data = $user_data[0];
			$db->do_user_joingroup($user_data['userid'], $_POST["frm_add_group"]);
		}
		unset($user_data);
	}

	if (isset($_GET["leavegroup"])) {
		$user_data = $db->get_userlist_by_id($_GET["viewID"]);

		if (count($user_data) != 0 and $db->get_GID_exists($_GET["leavegroup"])) {
			$user_data = $user_data[0];

			$db->do_user_leavegroup($user_data['userid'], $_GET["leavegroup"]);
		}
		unset($user_data);
	}

	if (isset($_POST["frm_disabled"])) {
	  $db->do_set_user($_GET["viewID"], $_POST["frm_shell"], $_POST["frm_disabled"], $_POST["frm_homedir"], @$_POST["frm_name"], @$_POST["frm_mail"], @$_POST["frm_adress"], @$_POST["frm_notes"], @$_POST["frm_sshkey"]);
	}

	if (isset($_POST["frm_password1"]) && isset($_POST["frm_password2"]) && strlen($_POST["frm_password2"]) != 0 && $_POST["frm_password1"] == $_POST["frm_password2"]) {
		$db->do_set_user_password($_GET["viewID"], $_POST["frm_password1"]);
	}

	$user_list = $db->get_userlist_by_id($_GET["viewID"]);
	if (count($user_list) == 0) {
		// User specified, but the user specified does not exist
		doError($GLOBALS['language']['userv']['user_error'], $GLOBALS['language']['userv']['user_no_such_user']);
		$sel_ok = false;
	} else {
		$res_data = $user_list[0];
		$sel_ok = true;
	}
} else {
	// No user was specified
	doError($GLOBALS['language']['userv']['user_error'], $GLOBALS['language']['userv']['user_no_user_specified']);
	$sel_ok = false;
}

if ($sel_ok == false) {
	doFooter();
	exit();
}

if (isset($_GET["section"]) && $_GET["section"] == "delete" && isset($_GET["deletion_confirmed"]) && $_GET["deletion_confirmed"] == "1") {
	$db->do_delete_user($_GET["viewID"]);

	if ($config_deleteuser_command != '') {
		$params = '"' . $res_data["userid"] . '" "' . $res_data["uid"] . '" "' . $res_data["gid"] . '" "' . $res_data["homedir"] . '" "' . $res_data["det_mail"] . '"';
		$cmd_output = shell_exec($config_deleteuser_command . ' ' . $params . ' 2>&1');
	}
	?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['userv']['deleteuser']; ?></td>
		</tr>
		<tr>
			<td>
				<table class="box" style="border-style: none;">
					<tr>
						<td width="*"   class="box-sel" align="center"><?php echo $GLOBALS['language']['userv']['userdeleted']; ?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<?php
	if ($cmd_output != '') {
		?>
		<br><br>
		<table class="box">
			<tr>
				<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['users']['cmd_output']; ?></td>
			</tr>
			<tr>
				<td>
				<table class="box" style="border-style: none;">
					<tr>
						<td>
							<pre>
								<?php
									echo "\n" . $cmd_output;
								?>
							</pre>
						</td>
					</tr>
				</table>
				</td>
			</tr>
		</table>
		<?php
	}
	doFooter();
	exit();
}

$ip_list = $db->get_associated_ipadresses($res_data['userid']);
$uIP = '';
foreach($ip_list as $ip) {
	if ($uIP == '') $uIP = $ip['address_ip'];
	else $uIP .= ', ' . $ip['address_ip'];
}
unset($ip_list);

$group_list = $db->get_group_data();

if ($config_ext['quota']['enabled'] == 1) {
	if (isset($_GET['section']) && $_GET['section'] == 'delete_quota') {
		$db->do_delete_quota($res_data['userid']);
		$_GET['section'] = 'quota';
	}

	$quota_data = $db->get_userquota_by_id($res_data['userid']);
	if ($quota_data['have_quota'] == false) {
		if (isset($_GET['section']) && $_GET['section'] == 'add_quota') {
			$db->do_add_default_quota($res_data['userid']);
			$_GET['section'] = 'quota';

			$quota_data = $db->get_userquota_by_id($res_data['userid']);
		}
	} else {
		/* Check if we got an update for the users quota limits */
		if (isset($_POST['frm_quota_turndefaultlimit']) || isset($_POST['frm_quota_up_mb'])) {
			$db->do_set_quota($res_data['userid'], $_POST['frm_quota_turndefaultpersession'],
				$_POST['frm_quota_turndefaultlimit'], mb2byte($_POST['frm_quota_up_mb']), mb2byte($_POST['frm_quota_down_mb']),
				mb2byte($_POST['frm_quota_trans_mb']), $_POST['frm_quota_up_files'], $_POST['frm_quota_down_files'], $_POST['frm_quota_trans_files']);

			$quota_data = $db->get_userquota_by_id($res_data['userid']);
		}
	}
}
?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo strtoupper($res_data['userid'][0]) . substr($res_data['userid'], 1); ?></td>
		</tr>
		<tr>
			<td>
			<table class="box" style="border-style: none;">
				<tr>
					<td width="110"   class="box-sel-head" align="left"><?php echo $GLOBALS['language']['general']['username']; ?>:</td>
					<td width="100"  class="box-sel" align="left"><?php echo $res_data["userid"]; ?></td>
					<td width="*"  class="box-sel" align="center">&nbsp;</td>
					<td width="110"  class="box-sel-head" align="left"><?php echo $GLOBALS['language']['general']['homedirectory']; ?>:</td>
					<td width="100"  class="box-sel" align="left"><?php echo $res_data["homedir"]; ?></td>
					<td width="*"  class="box-sel" align="center">&nbsp;</td>
					<td width="110"   class="box-sel-head" align="left"><?php echo $GLOBALS['language']['general']['expiration']; ?>:</td>
					<td width="100"  class="box-sel" align="left"><?php echo $res_data["expiration"]; ?></td>
				</tr>
				<tr>
					<td width="110"   class="box-sel-head" align="left"><?php echo $GLOBALS['language']['general']['userid']; ?>:</td>
					<td width="100"  class="box-sel" align="left"><?php echo $res_data["uid"]; ?></td>
					<td width="*"  class="box-sel" align="center">&nbsp;</td>
					<td width="110"  class="box-sel-head" align="left"><?php echo $GLOBALS['language']['general']['shell']; ?>:</td>
					<td width="100"  class="box-sel" align="left"><?php echo $res_data["shell"]; ?></td>
					<td width="*"  class="box-sel" align="center">&nbsp;</td>
					<td width="110"  class="box-sel-head" align="left"><?php echo $GLOBALS['language']['general']['lastlogin']; ?>:</td>
					<td width="100"  class="box-sel" align="left" valign="top"><?php echo $res_data["lastlogin"]; ?></td>
				</tr>
				<tr>
					<td width="110"  class="box-sel-head" align="left"><?php echo $GLOBALS['language']['general']['groups']; ?>:</td>
					<td width="100"  class="box-sel" align="left">
					<?php
						echo '<a href="group_view.php?viewID=' . $res_data['gid'] . '"><span class="primarygroup">' .  $res_data['groupname'] . '</span></a>';
						if (isset($group_list["members"][$res_data["userid"]])) {
							foreach($group_list["members"][$res_data["userid"]] as $group) {
								echo ', <a href="group_view.php?viewID=' . $group_list['names'][$group] . '">' . $group . '</a>';
							}
						}
					?>
					</td>
					<td width="*"  class="box-sel" align="center">&nbsp;</td>
					<td width="110"  class="box-sel-head" align="left" valign="top"><?php echo $GLOBALS['language']['userv']['assoc_ip']; ?>:</td>
					<td width="100"  class="box-sel" align="left" rowspan="2" valign="top"><?php echo $uIP; ?></td>
					<td width="*"  class="box-sel" align="center">&nbsp;</td>
					<td width="110"  class="box-sel-head" align="left"><?php echo $GLOBALS['language']['general']['lastlogout']; ?>:</td>
					<td width="100"  class="box-sel" align="left" valign="top"><?php echo $res_data["lastlogout"]; ?></td>
				</tr>
				<tr>
					<td width="105"   class="box-sel-head" align="left" valign="top"><?php echo $GLOBALS['language']['general']['disabled']; ?>:</td>
					<td width="100"  class="box-sel" align="left" valign="top"><?php
						if ($res_data["disabled"] == 0) echo $GLOBALS['language']['general']['no'];
						else echo '<span class="error">' . $GLOBALS['language']['general']['yes'] . '</span>';
					?></td>
					<td width="*"  class="box-sel" align="center">&nbsp;</td>
					<td width="100"  class="box-sel" align="left">&nbsp;</td>
					<td width="*"  class="box-sel" align="center">&nbsp;</td>
					<td width="110"  class="box-sel-head" align="left" valign="top"><?php echo $GLOBALS['language']['general']['numlogins']; ?>:</td>
					<td width="100"  class="box-sel" align="left" valign="top"><?php echo $res_data["6"]; ?></td>
				</tr>
				<tr><td colspan="8" class="box-sel">&nbsp;</td></tr>
				<tr><td colspan="8" class="box-subheadline"><?php echo $GLOBALS['language']['users']['pers_info']; ?></td></tr>
				<tr>
					<td width="110"   class="box-sel-head" align="left"><?php echo $GLOBALS['language']['general']['name']; ?>:</td>
					<td width="100"  class="box-sel" align="left"><?php echo $res_data["det_name"]; ?></td>
					<td width="*"  class="box-sel">&nbsp;</td>
					<td width="110"  class="box-sel-head" align="left" valign="top"><?php echo $GLOBALS['language']['general']['adress']; ?>:</td>
					<td width="100"  class="box-sel" align="left" rowspan="3" valign="top"><?php echo str_replace("\n", '<br>', $res_data["det_adress"]); ?></td>
					<td width="*"  class="box-sel">&nbsp;</td>
					<td width="110"   class="box-sel-head" align="left" valign="top"><?php echo $GLOBALS['language']['general']['notes']; ?>:</td>
					<td width="100"  class="box-sel" align="left" rowspan="3" valign="top"><?php echo format_longdetail($res_data["det_notes"]); ?></td>
				</tr>
				<tr>
					<td width="110"   class="box-sel-head" align="left"><?php echo $GLOBALS['language']['general']['email']; ?>:</td>
					<td width="100"  class="box-sel" align="left"><?php echo '<a href="mailto:' . $res_data["det_mail"] . '">' . $res_data["det_mail"] . '</a>'; ?></td>
					<td width="*"  class="box-sel">&nbsp;</td>
					<td width="100"  class="box-sel-head" align="left">&nbsp;</td>
					<td width="*"  class="box-sel">&nbsp;</td>
					<td width="100"   class="box-sel-head" align="left">&nbsp;</td>
				</tr>
				<tr>
					<td width="110"   class="box-sel-head" align="left"><?php echo $GLOBALS['language']['general']['sshkey']; ?>:</td>
					<td colspan="4"  class="box-sel" align="left"><?php echo $res_data["sshkey"]; ?></td>
				</tr>
				<?php
				if ($config_ext['quota']['enabled'] == 1 && $quota_data['have_quota'] == true && (
					$quota_data['total']['bytes_in_avail'] 		> 0 ||
					$quota_data['total']['bytes_out_avail'] 	> 0 ||
					$quota_data['total']['bytes_xfer_avail'] 	> 0 ||
					$quota_data['total']['files_in_avail'] 		> 0 ||
					$quota_data['total']['files_out_avail'] 	> 0 ||
					$quota_data['total']['files_xfer_avail'] 	> 0
					)) {
					?>
					<tr><td colspan="8" class="box-subheadline"><?php echo $GLOBALS['language']['userv']['quota_used']; ?></td></tr>
					<?php
					if ($quota_data['total']['bytes_out_avail'] > 0)
						make_quota_graph($GLOBALS['language']['configure']['quota_down_mb'],
										byte2mb($quota_data['used']['bytes_out_used']),
										byte2mb($quota_data['total']['bytes_out_avail']));

					if ($quota_data['total']['bytes_in_avail'] > 0)
						make_quota_graph($GLOBALS['language']['configure']['quota_up_mb'],
										byte2mb($quota_data['used']['bytes_in_used']),
										byte2mb($quota_data['total']['bytes_in_avail']));

					if ($quota_data['total']['bytes_xfer_avail'] > 0)
						make_quota_graph($GLOBALS['language']['configure']['quota_trans_mb'],
										byte2mb($quota_data['used']['bytes_xfer_used']),
										byte2mb($quota_data['total']['bytes_xfer_avail']));

					if ($quota_data['total']['files_out_avail'] > 0)
						make_quota_graph($GLOBALS['language']['configure']['quota_down_files'],
										$quota_data['used']['files_out_used'],
										$quota_data['total']['files_out_avail']);

					if ($quota_data['total']['files_in_avail'] > 0)
						make_quota_graph($GLOBALS['language']['configure']['quota_up_files'],
										$quota_data['used']['files_in_used'],
										$quota_data['total']['files_in_avail']);

					if ($quota_data['total']['files_xfer_avail'] > 0)
						make_quota_graph($GLOBALS['language']['configure']['quota_trans_files'],
										$quota_data['used']['files_xfer_used'],
										$quota_data['total']['files_xfer_avail']);
				}
				?>
			</table>
			</td>
		</tr>
	</table>
<?php
$user_menu[$GLOBALS['language']['menu']['traffic']]			= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=traffic';
$user_menu[$GLOBALS['language']['menu']['section']]			= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=section';
$user_menu[$GLOBALS['language']['menu']['transfer_log']]	= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=transferlog';
doMenu($user_menu);
unset($user_menu);
?>
	<br><br>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['userv']['edit_user']; ?></td>
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
$user_menu[$GLOBALS['language']['userv']['geninfo']]		= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=alter';
$user_menu[$GLOBALS['language']['general']['groups']]		= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=groups';
$user_menu[$GLOBALS['language']['userv']['set_password']]	= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=password';
$user_menu[$GLOBALS['language']['userv']['set_expiration']]	= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=expiration';
if ($config_ext['quota']['enabled'] == 1) $user_menu[$GLOBALS['language']['userv']['quota']]			= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=quota';
if ($config_ext['vhosts']['enabled'] == 1) $user_menu[$GLOBALS['language']['userv']['vhuser']]		= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=vhuser';
$user_menu["<spacer>"]										= '';
$user_menu[$GLOBALS['language']['userv']['deleteuser']]		= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=delete';
doMenu($user_menu);
unset($user_menu);

echo '<br><br>';

if (isset($_GET["section"]) and $_GET["section"] == "alter")
		include('user_view_alter.php');

if (isset($_GET["section"]) and $_GET["section"] == "traffic")
	make_traffic_time($GLOBALS['language']['userv']['generated_traffic'], $res_data["userid"]);

if (isset($_GET["section"]) and $_GET["section"] == "section") {
	make_traffic_section($GLOBALS['language']['userv']['down_sections'], $res_data["userid"], "RETR");
	echo '<br><br>';
	make_traffic_section($GLOBALS['language']['userv']['up_sections'], $res_data["userid"], "STOR");
}

if (isset($_GET["section"]) and $_GET["section"] == "transferlog") {
	$logskip = 0;
	if (isset($_GET["logskip"]) && $_GET["logskip"] !=0) $logskip = $_GET["logskip"];

	make_logviewer($logskip, $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=transferlog&amp;', $res_data["userid"]);
}
if (isset($_GET["section"]) and $_GET["section"] == "password") 	include('user_view_password.php');
if (isset($_GET["section"]) and $_GET["section"] == "groups")		include('user_view_groups.php');
if (isset($_GET["section"]) and $_GET["section"] == "expiration")	include('user_view_expiration.php');
if (isset($_GET["section"]) and $_GET["section"] == "delete") 		include('user_view_delete.php');
if (isset($_GET["section"]) and $_GET["section"] == "quota")		include('user_view_quota.php');
if (isset($_GET["section"]) and $_GET["section"] == "vhuser")		include('user_view_vhuser.php');
doFooter();

function format_longdetail($detail) {
	return wordwrap($detail, 25, "<br>", 1);
}

function make_quota_graph($label, $used, $total) {
	global $config_style_name;

	$percent= (int)(($used / $total) * 100);
	if ($percent > 100) $percent = 100;

	$color	= getColor($percent);
	$size	= ($percent * 300 / 100);

	echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
	echo '<td colspan="2" class="box-sel-head">' . $label . ':</td>';
	echo '<td colspan="5" class="box-sel" align="center">';
	echo '<img src="style/' . $config_style_name . '/' . $color . '.gif" width="' . $size . '" height="8" class="bar-left" alt="' . $percent . '%">';
	echo '<img src="style/' . $config_style_name . '/black.gif" width="' . (300 - $size) . '" height="8" class="bar-right" alt="' . (100 - $percent) . '%">';
	echo '</td>';
	echo '<td colspan="1" class="box-sel" align="right">' . $used . ' / ' . $total . '</td>';
	echo '</tr>';
}
?>