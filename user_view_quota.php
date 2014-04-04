<?php
if ($quota_data['have_quota'] == false) {
	?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['menu_quota']; ?></td>
		</tr>
		<tr>
			<td>
				<table class="box" style="border-style: none;">
					<tr>
						<td class="box-sel" align="justify"><?php echo $GLOBALS['language']['userv']['quota_noquota']; ?></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<?php
	$alter_menu[$GLOBALS['language']['userv']['quota_add']]	= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=add_quota';;
	doMenu($alter_menu);
} else {
	?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['menu_quota']; ?></td>
		</tr>
		<tr>
			<td>
			<form name="config_quota" action="<?php echo $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=quota'; ?>" method="POST">
				<table class="box" style="border-style: none;">
					<tr>
						<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['quota_whatlimit']; ?>:</td>
						<td width="*" class="box-sel" align="left">
							<table width="100%">
								<td width="50%" align="center"><input class="radio" type="radio" name="frm_quota_turndefaultlimit" value="soft" <?php if ($quota_data['total']['limit_type'] == "soft"){ ?> checked <?php }?>> soft</td>
								<td width="50%" align="center"><input class="radio" type="radio" name="frm_quota_turndefaultlimit" value="hard" <? if ($quota_data['total']['limit_type'] == "hard"){?> checked <?}?>> hard</td>
							</table>
						</td>
						<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['quota_whatsession']; ?>:</td>
						<td width="*" class="box-sel" align="left">
							<table width="100%">
								<td width="50%" align="center"><input class="radio" type="radio" name="frm_quota_turndefaultpersession" value="true" <? if ($quota_data['total']['per_session'] == "true"){?> checked <?}?>> <?php echo $GLOBALS['language']['general']['yes']; ?></td>
								<td width="50%" align="center"><input class="radio" type="radio" name="frm_quota_turndefaultpersession" value="false" <? if ($quota_data['total']['per_session'] == "false"){?> checked <?}?>> <?php echo $GLOBALS['language']['general']['no']; ?></td>
							</table>
						</td>
					</tr>
					<tr><td colspan="4" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
					<tr><td colspan="4" class="box-subheadline"><?php echo $GLOBALS['language']['configure']['quota_details']; ?></td></tr>
					<tr>
						<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['quota_down_mb']; ?>:</td>
						<td width="*" class="box-sel" align="center">
							<?php
							if (!isset($config_ext['quota']['select_quota']) || $config_ext['quota']['select_quota'] == 0) {
								echo '<input type="text" size="35" name="frm_quota_down_mb" value="' . byte2mb(@$quota_data['total']['bytes_out_avail']) . '" align="right" style="width: 190px;">';
							} else {
								echo '<select name="frm_quota_down_mb" style="width: 192px;">';

								if (@$quota_data['total']['bytes_out_avail'] == 0) echo '<option value="0" selected>' . $language['configure']['quota_no_limit'] . '</option>';
								else echo '<option value="0">' . $language['configure']['quota_no_limit'] . '</option>';

								foreach ($config_quota_select_datasize as $count) {
									echo '<option value="' . $count['v'] . '"';
									if (float2int(@$quota_data['total']['bytes_out_avail']) == $count['v']) echo ' selected';
									echo '>' . $count['d'] . '</option>';
								}
								echo '</select>';
							}
							?>
						</td>
						<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['quota_down_files']; ?>:</td>
						<td width="*" class="box-sel" align="right">
							<?php
							if (!isset($config_ext['quota']['select_quota']) || $config_ext['quota']['select_quota'] == 0) {
								echo '<input type="text" size="35" name="frm_quota_down_files" value="' . @$quota_data['total']['files_out_avail'] . '" align="right" style="width: 190px;">';
							} else {
								echo '<select name="frm_quota_down_files" style="width: 192px;">';

								if (@$quota_data['total']['files_out_avail'] == 0) echo '<option value="0" selected>' . $language['configure']['quota_no_limit'] . '</option>';
								else echo '<option value="0">' . $language['configure']['quota_no_limit'] . '</option>';

								foreach ($config_quota_select_filecount as $count) {
									echo '<option value="' . $count . '"';
									if (@$quota_data['total']['files_out_avail'] == $count) echo ' selected';
									echo '>' . $count . '</option>';
								}
								echo '</select>';
							}
							?>
						</td>
					</tr>
					<tr>
						<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['quota_up_mb']; ?>:</td>
						<td width="*" class="box-sel" align="center">
							<?php
							if (!isset($config_ext['quota']['select_quota']) || $config_ext['quota']['select_quota'] == 0) {
								echo '<input type="text" size="35" name="frm_quota_up_mb" value="' . byte2mb(@$quota_data['total']['bytes_in_avail']) . '" align="right" style="width: 190px;">';
							} else {
								echo '<select name="frm_quota_up_mb" style="width: 192px;">';

								if (@$quota_data['total']['bytes_in_avail'] == 0) echo '<option value="0" selected>' . $language['configure']['quota_no_limit'] . '</option>';
								else echo '<option value="0">' . $language['configure']['quota_no_limit'] . '</option>';

								foreach ($config_quota_select_datasize as $count) {
									echo '<option value="' . $count['v'] . '"';
									if (float2int(@$quota_data['total']['bytes_in_avail']) == $count['v']) echo ' selected';
									echo '>' . $count['d'] . '</option>';
								}
								echo '</select>';
							}
							?>
						</td>
						<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['quota_up_files']; ?>:</td>
						<td width="*" class="box-sel" align="right">
							<?php
							if (!isset($config_ext['quota']['select_quota']) || $config_ext['quota']['select_quota'] == 0) {
								echo '<input type="text" size="35" name="frm_quota_up_files" value="' . @$quota_data['total']['files_in_avail'] . '" align="right" style="width: 190px;">';
							} else {
								echo '<select name="frm_quota_up_files" style="width: 192px;">';

								if (@$quota_data['total']['files_in_avail'] == 0) echo '<option value="0" selected>' . $language['configure']['quota_no_limit'] . '</option>';
								else echo '<option value="0">' . $language['configure']['quota_no_limit'] . '</option>';

								foreach ($config_quota_select_filecount as $count) {
									echo '<option value="' . $count . '"';
									if (@$quota_data['total']['files_in_avail'] == $count) echo ' selected';
									echo '>' . $count . '</option>';
								}
								echo '</select>';
							}
							?>
						</td>
					</tr>
					<tr><td colspan="4" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
					<tr>
						<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['quota_trans_mb']; ?>:</td>
						<td width="*" class="box-sel" align="center">
							<?php
							if (!isset($config_ext['quota']['select_quota']) || $config_ext['quota']['select_quota'] == 0) {
								echo '<input type="text" size="35" name="frm_quota_trans_mb" value="' . byte2mb(@$quota_data['total']['bytes_xfer_avail']) . '" align="right" style="width: 190px;">';
							} else {
								echo '<select name="frm_quota_trans_mb" style="width: 192px;">';

								if (@$quota_data['total']['bytes_xfer_avail'] == 0) echo '<option value="0" selected>' . $language['configure']['quota_no_limit'] . '</option>';
								else echo '<option value="0">' . $language['configure']['quota_no_limit'] . '</option>';

								foreach ($config_quota_select_datasize as $count) {
									echo '<option value="' . $count['v'] . '"';
									if (float2int(@$quota_data['total']['bytes_xfer_avail']) == $count['v']) echo ' selected';
									echo '>' . $count['d'] . '</option>';
								}
								echo '</select>';
							}
							?>
						</td>
						<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['quota_trans_files']; ?>:</td>
						<td width="*" class="box-sel" align="right">
							<?php
							if (!isset($config_ext['quota']['select_quota']) || $config_ext['quota']['select_quota'] == 0) {
								echo '<input type="text" size="35" name="frm_quota_trans_files" value="' .  @$quota_data['total']['files_xfer_avail'] . '" align="right" style="width: 190px;">';
							} else {
								echo '<select name="frm_quota_trans_files" style="width: 192px;">';

								if (@$quota_data['total']['files_xfer_avail'] == 0) echo '<option value="0" selected>' . $language['configure']['quota_no_limit'] . '</option>';
								else echo '<option value="0">' . $language['configure']['quota_no_limit'] . '</option>';

								foreach ($config_quota_select_filecount as $count) {
									echo '<option value="' . $count . '"';
									if (@$quota_data['total']['files_xfer_avail'] == $count) echo ' selected';
									echo '>' . $count . '</option>';
								}
								echo '</select>';
							}
							?>
						</td>
					</tr>
				</table>
			</form>
			</td>
		</tr>
	</table>
	<?php
	$alter_menu[$GLOBALS['language']['userv']['quota_remove']]	= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=delete_quota';;
	$alter_menu["<spacer>"]								= '';
	$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_quota.reset()';
	$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_quota.submit()';

	doMenu($alter_menu);
}
?>