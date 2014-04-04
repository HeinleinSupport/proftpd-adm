<?php
require_once('include_prepare.php');

doHeader();
$sel_ok = false;
$res_data = array();

if (isset($_GET["viewID"]) && strlen($_GET["viewID"]) != 0) {
	if (isset($_POST["frm_description"])) {
		$db->do_set_group($_GET["viewID"], $_POST["frm_description"]);
	}

	$group_list = $db->get_grouplist_by_id($_GET["viewID"]);
	if (count($group_list) == 0) {
		doError('User Error', 'A group ID was specified, but no group exists with that ID - select the user via the grouplist instead of accessing this file manually.');
	} else {
		$res_data = $group_list[0];
		$sel_ok = true;
	}
} else {
	doError('User Error', 'No group ID was specified - select the group via the grouplist instead of accessing this file manually.');
	$sel_ok = false;
}

if ($sel_ok == false) {
	doFooter();
	exit();
}

if (isset($_GET["section"]) && $_GET["section"] == "delete" && isset($_GET["deletion_confirmed"]) && $_GET["deletion_confirmed"] == "1") {
	$db->do_delete_group($_GET["viewID"]);
	?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; Delete group</td>
		</tr>
		<tr>
			<td>
				<table class="box" style="border-style: none;">
					<tr>
						<td width="*"   class="box-sel" align="center">Group has been deleted.</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<?php
	doFooter();
	exit();
}

?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo strtoupper($res_data['groupname'][0]) . substr($res_data['groupname'], 1); ?></td>
		</tr>
		<tr>
			<td>
			<table class="box" style="border-style: none;">
				<tr>
					<td width="80"   class="box-sel-head" align="left"><?php echo $GLOBALS['language']['groups']['groupname']; ?>:</td>
					<td width="220"  class="box-sel" align="left"><?php echo $res_data["groupname"]; ?></td>
					<td width="*"  class="box-sel" align="center">&nbsp;</td>
					<td width="80"   class="box-sel-head" align="left"><?php echo $GLOBALS['language']['groups']['members']; ?>:</td>
					<td width="220"  class="box-sel" align="left" rowspan="2" valign="top">
					<?php
						$names = array();

						// Add users that has this group set as their primary group
						$add_names = $db->get_groupmembers_main($_GET["viewID"]);
						foreach ($add_names as $name) {
							array_push($names, '<a href="user_view.php?viewID=' . $name["uid"] . '"><span class="primarygroup">' . $name["userid"] . '</span></a>');
						}
						unset($add_names);


						// Add users that has an additional membership in this group
						$add_names = explode(",", $res_data["members"]);
						foreach($add_names as $name) {
							if (strlen($name) == 0) continue;
							else {
								$uid = $db->get_UIDbyUSERNAME(trim($name));
								if ($uid == -1) array_push($names, $name);
								else array_push($names, '<a href="user_view.php?viewID=' . $uid . '">' . $name . '</a>');
							}
						}
						unset($add_names);

						$first = 0;
						foreach($names as $name) {
							if ($first != 0) echo ', ';
							echo $name;
							$first++;
						}
					?></td>
				</tr>
				<tr>
					<td width="80"   class="box-sel-head" align="left"><?php echo $GLOBALS['language']['groups']['groupid']; ?>:</td>
					<td width="220"  class="box-sel" align="left"><?php echo $res_data["gid"]; ?></td>
					<td width="*"  class="box-sel" align="center">&nbsp;</td>
					<td width="80"   class="box-sel" align="left">&nbsp;</td>
				</tr>
				<tr>
					<td width="80"   class="box-sel-head" align="left"><?php echo $GLOBALS['language']['general']['description']; ?>:</td>
					<td width="*"  class="box-sel" align="left" colspan="4"><?php echo @$res_data["description"]; ?></td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
<?php
$group_menu[$GLOBALS['language']['groups']['alter']]	= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=alter';
$group_menu[$GLOBALS['language']['groups']['delete']]	= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=delete';
doMenu($group_menu);

echo '<br><br>';
if (isset($_GET["section"]) && $_GET["section"] == "alter") {
		include('group_view_alter.php');
}
if (isset($_GET["section"]) && $_GET["section"] == "delete") {
		include('group_view_delete.php');
}

doFooter();
?>
