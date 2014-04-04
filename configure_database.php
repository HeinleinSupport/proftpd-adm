<?php
require_once('include_database.php');
?>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['db_database']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="config_database" action="configure.php?section=database" method="POST">
			<table class="box" style="border-style: none;">
				<tr>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['db_type']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_database_type" style="width: 192px;">
							<option value="MySQL" <?php if (@$config_database_type == 'MySQL') echo 'selected'; ?>>MySQL</option>
						</select>
					</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['db_suptype']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_database_subtype" style="width: 192px;">
							<option value="standard" <?php if ($config_database_subtype == 'standard') echo 'selected'; ?>><?php echo $GLOBALS['language']['configure']['db_st_standard']; ?></option>
							<option value="old_password" <?php if ($config_database_subtype == 'old_password') echo 'selected'; ?>><?php echo $GLOBALS['language']['configure']['db_st_old_pass']; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="5" class="box-sel">&nbsp;</td>
				</tr>
				<tr>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['general']['username']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="text" size="45" name="frm_database_username" value="<?php echo $config_database_user; ?>" style="width: 190px;">
					</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['db_hostname']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="text" size="45" name="frm_database_hostname" value="<?php echo $config_database_host; ?>" style="width: 190px;">
					</td>
				</tr>
				<tr>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['general']['password']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="password" size="45" name="frm_database_password" value="<?php echo $config_database_passord; ?>" style="width: 190px;">
					</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['db_database']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="text" size="45" name="frm_database_database" value="<?php echo $config_database_database; ?>" style="width: 190px;">
					</td>
				</tr>
				<?php
				$db = db_get_dbclass();
				$db->do_connect();
				if (!$db->connection_handle) {
					?>
					<tr>
						<td colspan="5">
							<table width="100%">
								<tr>
									<td width="150" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.red.gif" style="border: none;" align="right"><br><br><br><br><br></td>
									<td width="*" class="box-sel" align="justify" valign="top">
										<?php
											echo $GLOBALS['language']['configure']['db_connectfail'] . ' ';
										?>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<?php
				} else {
					$db->do_select_db();
					if (!$db->selected_database) {
						?>
							<tr>
								<td colspan="5">
									<table width="100%">
										<tr>
											<td width="150" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.red.gif" style="border: none;" align="right"><br><br><br><br><br></td>
											<td width="*" class="box-sel" align="justify" valign="top">
											<?php
												echo $GLOBALS['language']['configure']['db_dbfail'] . ' ';
											?>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						<?php
					}
				}
				?>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_database.reset()';
$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_database.submit()';
doMenu($alter_menu);
?>