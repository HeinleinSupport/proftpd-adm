<?php
$grouplist = $db->get_grouplist();
?>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['userv']['alter_maingroup']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="update_maingroup" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?viewID=' . $res_data["uid"] . '&amp;section=groups'; ?>">
			<table class="box" style="border-style: none;">
				<tr>
					<td width="100" class="box-sel-head"><?php echo $GLOBALS['language']['general']['primarygroup']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_main_group" style="width: 535px;">
						<?php
							foreach($grouplist as $group) {
								echo '<option value="' . $group["gid"] . '"';
								if ($group["gid"] == $res_data["gid"]) echo ' selected';
								echo '>' . $group["groupname"];
							}
						?>
						</select>
					</td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$alter_groups_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.update_maingroup.reset()';
$alter_groups_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.update_maingroup.submit()';
doMenu($alter_groups_menu);
?>


<br>
<br>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['userv']['alter_addgroup']; ?></td>
	</tr>
	<tr>
		<td>
		<table class="box" style="border-style: none;">
			<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
			<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['userv']['memberships']; ?></td></tr>
			<tr>
				<td width="100"  class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['userv']['memberof']; ?>:</td>
				<td width="*" class="box-sel">
				<?php
					if (isset($group_list["members"][$res_data["userid"]])) {
						foreach($group_list["members"][$res_data["userid"]] as $group) {
							echo '<a href="user_view.php?viewID=' . $_GET["viewID"] . '&amp;section=groups&amp;leavegroup=' . $group_list["names"][$group] . '">[D]</a> &gt;&gt; '
								 . '<a href="group_view.php?viewID=' . $group_list["names"][$group] . '">' . $group . '</a><br>';
						}
					}
				?>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td>
		<!-- Form Action; ugly hack, but seem to need it in order to stop it from meddling with leavegroup in GET -->
		<form action="<?php echo 'user_view.php?viewID=' . $_GET["viewID"] . '&amp;section=groups'; ?>" name="update_add_group" method="POST">
			<table class="box" style="border-style: none;">
				<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
				<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['userv']['joingroup']; ?></td></tr>
				<tr>
					<td width="100"  class="box-sel-head"><?php echo $GLOBALS['language']['userv']['selectgroup']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<?php
							$list = "";
							$disable = 1;

							foreach($grouplist as $group) {
								if (isset($group_list["members"][$res_data["userid"]])) {
									if (in_array($group["groupname"], $group_list["members"][$res_data["userid"]])) continue;
								}
								if ($res_data["gid"] == $group["gid"]) continue;

								$disable = 0;
								$list .= '<option value="' . $group["gid"] . '">' . $group["groupname"];

							}

							echo '<select name="frm_add_group" style="width: 535px;"';
							if ($disable == 1) echo ' disabled';
							echo '>' . $list;
							echo '</select>';
						?>
					</td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$alter_add_groups_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.update_add_group.reset()';
$alter_add_groups_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.update_add_group.submit()';
doMenu($alter_add_groups_menu);
?>