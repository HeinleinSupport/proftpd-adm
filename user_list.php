<?php
require_once('include_prepare.php');

doHeader();
$cmd_output = '';
if (isset($_POST["frm_username"]) && strlen($_POST["frm_username"]) != 0 && isset($_POST["frm_homedir"]) && strlen($_POST["frm_homedir"]) != 0 && isset($_POST["frm_password"]) && strlen($_POST["frm_password"]) != 0 ) {
	if (!$db->get_user_exists($_POST["frm_username"])) {
	  $db->do_add_user($_POST["frm_username"], $_POST["frm_password"], $_POST["frm_homedir"], $_POST["frm_shell"], $_POST["frm_main_group"], $_POST["frm_expiration"], $_POST["frm_disabled"], @$_POST["frm_name"], @$_POST["frm_mail"], @$_POST["frm_adress"], @$_POST["frm_notes"], @$_POST["frm_sshky"]);
		if ($config_ext['vhosts']['enabled'] == 1) {
			$uid = $db->get_UIDbyUSERNAME($_POST["frm_username"]);
			$db->do_add_vhuser($_POST["frm_username"], $_POST["frm_homedir"], $uid);
		}

		if ($config_ext['quota']['enabled'] == 1 && $_POST['frm_add_quota'] == 1) {
			$db->do_add_default_quota($_POST["frm_username"]);
		}

		if ($config_createuser_command != '') {
			$params = '"' . $_POST["frm_username"] . '" "' . $db->get_last_added_userid() . '" "' . $_POST["frm_main_group"] . '" "' . $_POST["frm_homedir"] . '" "' . $_POST["frm_mail"] . '"';
			$cmd_output = shell_exec($config_createuser_command . ' ' . $params . ' 2>&1');
		}
	}
}

$group_data = $db->get_group_data();
?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['users']['users']; ?></td>
		</tr>
		<tr>
			<td>
			<table class="box" style="border-style: none;">
			<tr>
			<!--
			userid  passwd  homedir  shell  uid  gid  count  lastlogin
			-->
				<td width="*"  class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['username']; ?></td>
				<td width="*"  class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['groups']; ?></td>
				<td width="*"  class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['numlogins']; ?></td>
				<td width="120" class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['lastlogin']; ?></td>
				<td width="120" class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['expiration']; ?></td>
				<? if ($config_ext['quota']['enabled'] == 1){ ?>
				<td width="*"   class="box-pl" align="center"><?php echo $GLOBALS['language']['configure']['menu_quota']; ?></td>
				<? } ?>
				<td width="*"  class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['disabled']; ?></td>
			</tr>
			<?php
				if ($config_ext['quota']['enabled'] == 1){
					$userlist = $db->get_userlist_quota();
				} else {
					$userlist = $db->get_userlist();
				}

				foreach ($userlist as $user_data) {
					echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
					echo '<td width="*" class="box-sel" align="left"><a href="user_view.php?viewID=' . $user_data['uid'] . '">' . $user_data['userid'] . '</a></td>';
					echo '<td width="*"  class="box-sel" align="left">';

					if (strlen($user_data["groupname"]) != 0) echo '<a href="group_view.php?viewID=' . $user_data['gid'] . '">';
					else echo '<a href="user_view.php?viewID=' . $user_data["uid"] . '&section=groups">';
					echo '<span class="primarygroup">';

					if (strlen($user_data["groupname"]) != 0) echo $user_data["groupname"];
					else echo '<span class="error">' . $GLOBALS['language']['users']['no_group'] . '</span>';
					echo '</span></a>';

					if (isset($group_data["members"][$user_data["userid"]])) {
						foreach($group_data["members"][$user_data["userid"]] as $group) {
							$gid = -1;
							if (array_key_exists($group, $group_data['names'])) $gid = $group_data['names'][$group];

							if ($gid == -1) echo ', ' . $group;
							else echo ', <a href="group_view.php?viewID=' . $gid . '">' . $group . '</a>';
						}
					}
					if ($user_data["expiration"] == '0000-00-00 00:00:00') {
						$user_data["expiration"] = '<a href="user_view.php?viewID=' . $user_data['uid'] . '&section=expiration">' . $GLOBALS['language']['general']['expiration_never'] . '</a>';
					}
					echo '</td>';

					echo '<td width="*"  class="box-sel" align="right">' . $user_data['count'] . '</td>';
					echo '<td width="120"  class="box-sel" align="center">' . $user_data['lastlogin'] . '</td>';
					echo '<td width="120"  class="box-sel" align="center">' . $user_data['expiration'] . '</td>';

					if ($config_ext['quota']['enabled'] == 1){
						echo '<td width="*"  class="box-sel" align="left">';
						if ($user_data['have_quota'] == 1) echo $GLOBALS['language']['general']['yes'];
						else echo $GLOBALS['language']['general']['no'];
						echo '</td>';
					}

					echo '<td width="*"  class="box-sel" align="left">';
					if ($user_data["disabled"] == 0) echo $GLOBALS['language']['general']['no'];
					else echo '<span class="error">' . $GLOBALS['language']['general']['yes'] . '</span>';
					echo '</td>';
					echo '</tr>';
				}
			?>
			</table>
			</td>
		</tr>
	</table>
<?php
$user_menu[$GLOBALS['language']['users']['newuser']]	= $_SERVER['PHP_SELF'] . '?section=adduser';
doMenu($user_menu);

echo '<br><br>';
if (isset($_GET["section"]) and $_GET["section"] == "adduser") {
		include('user_list_add.php');
}

if ($cmd_output != '') {
	?>
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
?>