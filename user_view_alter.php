<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['userv']['agu_info']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="updateuser" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?viewID=' . $res_data["uid"] . '&amp;section=alter'; ?>">
			<table class="box" style="border-style: none;">
				<tr>
					<td width="100" class="box-sel-head"><?php echo $GLOBALS['language']['general']['userid']; ?>:</td>
					<td width="220" class="box-sel" align="right"><input type="text" size="45" name="frm_userid" value="<?php echo $res_data["uid"];; ?>" disabled style="width: 236px;"></td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="100" class="box-sel-head"><?php echo $GLOBALS['language']['general']['disabled']; ?>:</td>
					<td width="220" class="box-sel" align="right">
						<select name="frm_disabled" style="width: 238px;">
							<option value="0"<?php  if($res_data["disabled"] == 0) echo ' selected'; ?>><?php echo $GLOBALS['language']['general']['no']; ?></option>
							<option value="1"<?php  if($res_data["disabled"] == 1) echo ' selected'; ?>><?php echo $GLOBALS['language']['general']['yes']; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="100" class="box-sel-head"><?php echo $GLOBALS['language']['general']['homedirectory']; ?>:</td>
					<td width="220" class="box-sel" align="right"><input type="text" size="45" name="frm_homedir" value="<?php echo $res_data["homedir"]; ?>" style="width: 236px;"></td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="100" class="box-sel-head"><?php echo $GLOBALS['language']['general']['shell']; ?>:</td>
					<td width="220" class="box-sel" align="right">
						<select name="frm_shell" style="width: 238px;">
							<?php
								foreach($config_valid_shells as $shell) {
									echo '<option value="' . $shell . '"';
									if( $res_data["shell"] == $shell ) echo ' selected';
									echo '>' . $shell . '</option>';
								}
							?>
						</select>
					</td>
				</tr>
				<tr><td colspan="6" class="box-sel">&nbsp;</td></tr>
				<tr><td colspan="6" class="box-subheadline"><?php echo $GLOBALS['language']['users']['pers_info']; ?></td></tr>
				<tr>
					<td width="100" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['general']['name']; ?>:</td>
					<td width="220" class="box-sel" align="right"><input type="text" size="45" name="frm_name" value="<?php echo @$res_data["det_name"]; ?>" style="width: 236px;"></td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="100" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['general']['email']; ?>:</td>
					<td width="220" class="box-sel" align="right"><input type="text" size="45" name="frm_mail" value="<?php echo @$res_data["det_mail"]; ?>" style="width: 236px;"></td>
				</tr>
				<tr>
					<td width="100" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['general']['adress']; ?>:</td>
					<td width="220" class="box-sel" align="right">
						<textarea name="frm_adress" rows="2" cols="26" style="width: 236px;"><?php echo @$res_data["det_adress"]; ?></textarea>
					</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="100" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['general']['notes']; ?>:</td>
					<td width="220" class="box-sel" align="right">
						<textarea name="frm_notes" rows="2" cols="26" style="width: 236px;"><?php echo @$res_data["det_notes"]; ?></textarea>
					</td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.updateuser.reset()';
$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.updateuser.submit()';
doMenu($alter_menu);
?>
