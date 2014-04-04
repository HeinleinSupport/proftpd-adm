<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; Add user</td>
	</tr>
	<tr>
		<td>
		<form name="adduser" action="user_list.php" method="POST">
			<table class="box" style="border-style: none;">
				<tr>
					<td width="100" class="box-sel-head"><?php echo $GLOBALS['language']['general']['username']; ?>:</td>
					<td width="220" class="box-sel" align="right">
					<?php
						$js = '';
						if (substr($config_ftp_default_home, -6) == '%HOME%') {
							$js = ' onchange="document.adduser.frm_homedir.value=\'' . substr($config_ftp_default_home, 0, -6) . '\' + document.adduser.frm_username.value;"';
						}
					?>
						<input type="text" size="45" name="frm_username" <?php echo $js; ?> style="width: 236px;">
					</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="130" class="box-sel-head"><?php echo $GLOBALS['language']['general']['primarygroup']; ?>:</td>
					<td width="220" class="box-sel" align="right">
						<select name="frm_main_group" style="width: 238px;">
						<?php
							$grouplist = $db->get_grouplist();

							foreach($grouplist as $group) {
								echo '<option value="' . $group["gid"] . '"';
								if ($group["groupname"] == 'users'){
									echo 'selected';
									}
								echo '>' . $group["groupname"];
							}
						?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="100" class="box-sel-head"><?php echo $GLOBALS['language']['general']['homedirectory']; ?>:</td>
					<td width="220" class="box-sel" align="right"><input type="text" size="45" name="frm_homedir" value="<?php
						if (substr($config_ftp_default_home, -6) == '%HOME%') echo substr($config_ftp_default_home, 0, -6);
						else echo $config_ftp_default_home;
					?>" style="width: 236px;"></td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="130" class="box-sel-head"><?php echo $GLOBALS['language']['general']['disabled']; ?>:</td>
					<td width="220" class="box-sel" align="right">
						<select name="frm_disabled" style="width: 238px;">
							<option value="0"><?php echo $GLOBALS['language']['general']['no']; ?>
							<option value="1"><?php echo $GLOBALS['language']['general']['yes']; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="100" class="box-sel-head"><?php echo $GLOBALS['language']['general']['password']; ?>:</td>
					<td width="220" class="box-sel" align="right"><input type="password" size="45" name="frm_password" style="width: 236px;"></td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="130" class="box-sel-head"><?php echo $GLOBALS['language']['general']['shell']; ?>:</td>
					<td width="220" class="box-sel" align="right">
						<select name="frm_shell" style="width: 238px;">
							<?php
								foreach($config_valid_shells as $shell) {
									echo '<option value="' . $shell . '"';
									if ( trim($shell) == trim($config_default_shell) ) echo ' selected';
									echo '>' . $shell;
								}
							?>
						</select>
					</td>
				</tr>
				<script type="text/javascript">
				// <!--
				function reCalc() {
					document.adduser.frm_expiration.value = document.adduser.frm_expiration_select.value;

					return true;
				}
				// -->
				</script>
				<tr>
					<td width="100" class="box-sel-head">&nbsp;</td>
					<td width="220" class="box-sel" align="right">&nbsp;</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="130" class="box-sel-head"><?php echo $GLOBALS['language']['general']['expiration']; ?>:</td>
					<td width="220" class="box-sel" align="right">
						<select name="frm_expiration_select" style="width: 238px;" onChange="reCalc();">
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-1 day"))) ?>"><?php echo $GLOBALS['language']['general']['time_yesterday']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+1 day"))) ?>"><?php echo $GLOBALS['language']['general']['time_24h']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+1 week"))) ?>"><?php echo $GLOBALS['language']['general']['time_1week']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+2 weeks"))) ?>"><?php echo $GLOBALS['language']['general']['time_2week']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+1 month"))) ?>"><?php echo $GLOBALS['language']['general']['time_1month']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+3 months"))) ?>"><?php echo $GLOBALS['language']['general']['time_3month']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+6 months"))) ?>"><?php echo $GLOBALS['language']['general']['time_6month']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+1 year"))) ?>"><?php echo $GLOBALS['language']['general']['time_1year']; ?>
						  <option value="0000-00-00 00:00:00" selected><?php echo $GLOBALS['language']['general']['time_never']; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="100" class="box-sel-head">&nbsp;</td>
					<td width="220" class="box-sel" align="right">&nbsp;</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="130" class="box-sel-head">&nbsp;</td>
					<td width="220" class="box-sel" align="right">
						<input type="text" size="45" name="frm_expiration" value="0000-00-00 00:00:00" style="width: 236px;">
					</td>
				</tr>
				<?php if($config_ext['quota']['enabled'] == 1) { ?>
				<tr><td colspan="6" class="box-sel">&nbsp;</td></tr>
				<tr>
					<td width="100" class="box-sel-head">&nbsp;</td>
					<td width="220" class="box-sel" align="right">&nbsp;</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="130" class="box-sel-head"><?php echo $GLOBALS['language']['userv']['quota_add']; ?>:</td>
					<td width="220" class="box-sel" align="right">
						<select name="frm_add_quota" style="width: 238px;">
							<option value="0"><?php echo $GLOBALS['language']['general']['no']; ?>
							<option value="1" selected><?php echo $GLOBALS['language']['general']['yes']; ?>
						</select>
					</td>
				</tr>
				<?php } ?>
				<tr><td colspan="6" class="box-sel">&nbsp;</td></tr>
				<tr><td colspan="6" class="box-subheadline"><?php echo $GLOBALS['language']['users']['pers_info']; ?></td></tr>
				<tr>
					<td width="100" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['general']['name']; ?>:</td>
					<td width="220" class="box-sel" align="right"><input type="text" size="45" name="frm_name" style="width: 236px;"></td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="130" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['general']['email']; ?>:</td>
					<td width="220" class="box-sel" align="right"><input type="text" size="45" name="frm_mail" style="width: 236px;"></td>
				</tr>
				<tr>
					<td width="100" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['general']['adress']; ?>:</td>
					<td width="220" class="box-sel" align="right">
						<textarea name="frm_adress" rows="2" cols="26" style="width: 236px;"></textarea>
					</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="130" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['general']['notes']; ?>:</td>
					<td width="220" class="box-sel" align="right">
						<textarea name="frm_notes" rows="2" cols="26" style="width: 236px;"></textarea>
					</td>
				</tr>
				<tr>
					<td width="100" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['general']['sshkey']; ?>:</td>
					<td colspan="4" class="box-sel" align="right">
						<textarea name="frm_sshkey" rows="4" style="width: 100%;" wrap="soft"></textarea>
					</td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.adduser.reset()';
$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.adduser.submit()';
doMenu($alter_menu);
?>