<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['ftp_ftp']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="config_proftpd" action="configure.php?section=proftpd" method="POST">
			<table class="box" style="border-style: none;">

				<tr>
					<td width="200" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ftp_ftproot']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="text" size="100" name="frm_proftd_ftproot" value="<?php echo @$config_ftp_root; ?>" style="width: 512px;">
					</td>
				</tr>
				<tr>
					<td width="200" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ftp_defhome']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="text" size="100" name="frm_proftd_defhome" value="<?php echo @$config_ftp_default_home; ?>" style="width: 512px;">
					</td>
				</tr>

				<tr>
					<td width="200" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ftp_createcmd']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="text" size="100" name="frm_proftd_cucmd" value="<?php echo @$config_createuser_command; ?>" style="width: 512px;">
					</td>
				</tr>

				<tr>
					<td width="200" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ftp_deletecmd']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="text" size="100" name="frm_proftd_ducmd" value="<?php echo @$config_deleteuser_command; ?>" style="width: 512px;">
					</td>
				</tr>

				<tr>
					<td width="200" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ftp_defshell']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_proftpd_defshell" style="width: 514px;">
							<?php
								foreach($config_valid_shells as $shell) {
									echo '<option value="' . $shell . '"';
									if( trim($config_default_shell) == trim($shell) ) echo ' selected';
									echo '>' . $shell . '</option>';
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
$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_proftpd.reset()';
$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_proftpd.submit()';
doMenu($alter_menu);
?>