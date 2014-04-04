<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['menu_quota']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="config_quota" action="configure.php?section=quota" method="POST">
			<table class="box" style="border-style: none;">

				<tr>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['quota_activate']; ?>:</td>
					<td width="*" class="box-sel" align="left">
						<table width="100%">
							<td width="30%"><input class="radio" type="radio" name="frm_quota_turn" value="1" <? if ($config_ext['quota']['enabled'] == 1){?> checked <?}?>> <?php echo $GLOBALS['language']['general']['yes']; ?></td>
							<td width="70%"><input class="radio" type="radio" name="frm_quota_turn" value="0" <?php if ($config_ext['quota']['enabled'] == 0){?> checked <?php } ?>> <?php echo $GLOBALS['language']['general']['no']; ?></td>
						</table>
					</td>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['quota_whattype']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_quota_turndefaulttype" style="width: 190px;">
							<?php
								foreach($config_quota_quotatypes as $qtype) {
									echo '<option value="' . $qtype . '"';
									if ($qtype == $config_ext['quota']['type']) echo ' selected';
									echo '>' . $qtype;
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['quota_whatlimit']; ?>:</td>
					<td width="*" class="box-sel" align="left">
						<table width="100%">
							<td width="30%"><input class="radio" type="radio" name="frm_quota_turndefaultlimit" value="soft" <?php if ($config_ext['quota']['limittype'] == 'soft'){ ?> checked <?php }?>> soft</td>
							<td width="70%"><input class="radio" type="radio" name="frm_quota_turndefaultlimit" value="hard" <? if ($config_ext['quota']['limittype'] == 'hard'){?> checked <?}?>> hard</td>
						</table>
					</td>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['quota_whatsession']; ?>:</td>
					<td width="*" class="box-sel" align="left">
						<table width="100%">
							<td width="30%"><input class="radio" type="radio" name="frm_quota_turndefaultpersession" value="1" <? if ($config_ext['quota']['per_session'] == 1){?> checked <?}?>> <?php echo $GLOBALS['language']['general']['yes']; ?></td>
							<td width="70%"><input class="radio" type="radio" name="frm_quota_turndefaultpersession" value="0" <? if ($config_ext['quota']['per_session'] == 0){?> checked <?}?>> <?php echo $GLOBALS['language']['general']['no']; ?></td>
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
							echo '<input type="text" size="35" name="frm_quota_down_mb" value="' . @$config_ext['quota']['down_mb'] . '" align="right" style="width: 190px;">';
						} else {
							echo '<select name="frm_quota_down_mb" style="width: 192px;">';

							if (@$config_ext['quota']['down_mb'] == 0) echo '<option value="0" selected>' . $language['configure']['quota_no_limit'] . '</option>';
							else echo '<option value="0">' . $language['configure']['quota_no_limit'] . '</option>';

							foreach ($config_quota_select_datasize as $count) {
								echo '<option value="' . $count['v'] . '"';
								if (float2int(mb2byte(@$config_ext['quota']['down_mb'])) == $count['v']) echo ' selected';
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
							echo '<input type="text" size="35" name="frm_quota_down_files" value="' . @$config_ext['quota']['down_files'] . '" align="right" style="width: 190px;">';
						} else {
							echo '<select name="frm_quota_down_files" style="width: 192px;">';

							if (@$config_ext['quota']['down_files'] == 0) echo '<option value="0" selected>' . $language['configure']['quota_no_limit'] . '</option>';
							else echo '<option value="0">' . $language['configure']['quota_no_limit'] . '</option>';

							foreach ($config_quota_select_filecount as $count) {
								echo '<option value="' . $count . '"';
								if (@$config_ext['quota']['down_files'] == $count) echo ' selected';
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
							echo '<input type="text" size="35" name="frm_quota_up_mb" value="' . @$config_ext['quota']['up_mb'] . '" align="right" style="width: 190px;">';
						} else {
							echo '<select name="frm_quota_up_mb" style="width: 192px;">';

							if (@$config_ext['quota']['up_mb'] == 0) echo '<option value="0" selected>' . $language['configure']['quota_no_limit'] . '</option>';
							else echo '<option value="0">' . $language['configure']['quota_no_limit'] . '</option>';

							foreach ($config_quota_select_datasize as $count) {
								echo '<option value="' . $count['v'] . '"';
								if (float2int(mb2byte(@$config_ext['quota']['up_mb'])) == $count['v']) echo ' selected';
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
							echo '<input type="text" size="35" name="frm_quota_up_files" value="' . @$config_ext['quota']['up_files'] . '" align="right" style="width: 190px;">';
						} else {
							echo '<select name="frm_quota_up_files" style="width: 192px;">';

							if (@$config_ext['quota']['up_files'] == 0) echo '<option value="0" selected>' . $language['configure']['quota_no_limit'] . '</option>';
							else echo '<option value="0">' . $language['configure']['quota_no_limit'] . '</option>';

							foreach ($config_quota_select_filecount as $count) {
								echo '<option value="' . $count . '"';
								if (@$config_ext['quota']['up_files'] == $count) echo ' selected';
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
							echo '<input type="text" size="35" name="frm_quota_trans_mb" value="' . @$config_ext['quota']['trans_mb'] . '" align="right" style="width: 190px;">';
						} else {
							echo '<select name="frm_quota_trans_mb" style="width: 192px;">';

							if (@$config_ext['quota']['trans_mb'] == 0) echo '<option value="0" selected>' . $language['configure']['quota_no_limit'] . '</option>';
							else echo '<option value="0">' . $language['configure']['quota_no_limit'] . '</option>';

							foreach ($config_quota_select_datasize as $count) {
								echo '<option value="' . $count['v'] . '"';
								if (float2int(mb2byte(@$config_ext['quota']['trans_mb'])) == $count['v']) echo ' selected';
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
							echo '<input type="text" size="35" name="frm_quota_trans_files" value="' . @$config_ext['quota']['trans_files'] . '" align="right" style="width: 190px;">';
						} else {
							echo '<select name="frm_quota_trans_files" style="width: 192px;">';

							if (@$config_ext['quota']['trans_files'] == 0) echo '<option value="0" selected>' . $language['configure']['quota_no_limit'] . '</option>';
							else echo '<option value="0">' . $language['configure']['quota_no_limit'] . '</option>';

							foreach ($config_quota_select_filecount as $count) {
								echo '<option value="' . $count . '"';
								if (@$config_ext['quota']['trans_files'] == $count) echo ' selected';
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
$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_quota.reset()';
$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_quota.submit()';
doMenu($alter_menu);
?>