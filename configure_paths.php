<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['fp_fp']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="config_filepaths" action="configure.php?section=paths" method="POST">
			<table class="box" style="border-style: none;">
				<?php
				if (PHP_OS != 'WINNT') { ?>
					<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
					<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['configure']['fp_generic_cmd']; ?></td></tr>
					<tr>
						<td width="175" class="box-sel-head">who:</td>
						<td width="*" class="box-sel" align="right">
							<input type="text" size="100" name="frm_config_path_who" value="<?php echo @$config_path_to_who; ?>" style="width: 512px;">
						</td>
					</tr>
					<?php
						if (stripos(@$config_path_to_who, '/') === false && stripos(@$config_path_to_who, '\\') === false) {
							?>
							<tr>
								<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.black.gif" style="border: none;" align="right"><br><br><br><br></td>
								<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_who_rel']; ?></td>
							</tr>
							<?php
						} else {
							if (!file_exists(@$config_path_to_who)) {
								?>
								<tr>
									<td width="200" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.red.gif" style="border: none;" align="right"><br><br><br><br></td>
									<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_who_no']; ?></td>
								</tr>
								<?php
							}
						}
					?>

					<tr>
						<td width="175" class="box-sel-head">df:</td>
						<td width="*" class="box-sel" align="right">
							<input type="text" size="100" name="frm_config_path_df" value="<?php echo @$config_path_to_df; ?>" style="width: 512px;">
						</td>
					</tr>
					<?php
						if (stripos(@$config_path_to_df, '/') === false && stripos(@$config_path_to_df, '\\') === false) {
							?>
							<tr>
								<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.black.gif" style="border: none;" align="right"><br><br><br><br></td>
								<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_df_rel']; ?></td>
							</tr>
							<?php
						} else {
							if (!file_exists(@$config_path_to_df)) {
								?>
								<tr>
									<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.red.gif" style="border: none;" align="right"><br><br><br><br></td>
									<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_df_no']; ?></td>
								</tr>
								<?php
							}
						}
					?>

					<tr>
						<td width="175" class="box-sel-head">ps:</td>
						<td width="*" class="box-sel" align="right">
							<input type="text" size="100" name="frm_config_path_ps" value="<?php echo @$config_path_to_ps; ?>" style="width: 512px;">
						</td>
					</tr>
					<?php
						if (stripos(@$config_path_to_ps, '/') === false && stripos(@$config_path_to_ps, '\\') === false) {
							?>
							<tr>
								<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.black.gif" style="border: none;" align="right"><br><br><br><br></td>
								<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_ps_rel']; ?></td>
							</tr>
							<?php
						} else {
							if (!file_exists(@$config_path_to_ps)) {
								?>
								<tr>
									<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.red.gif" style="border: none;" align="right"><br><br><br><br></td>
									<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_ps_no']; ?></td>
								</tr>
								<?php
							}
						}
					?>

					<tr>
						<td width="175" class="box-sel-head">sysctl:</td>
						<td width="*" class="box-sel" align="right">
							<input type="text" size="100" name="frm_config_path_sysctl" value="<?php echo @$config_path_to_sysctl; ?>" style="width: 512px;">
						</td>
					</tr>
					<?php
						if (stripos(@$config_path_to_sysctl, '/') === false && stripos(@$config_path_to_sysctl, '\\') === false) {
							?>
							<tr>
								<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.black.gif" style="border: none;" align="right"><br><br><br><br></td>
								<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_sysctl_rel']; ?></td>
							</tr>
							<?php
						} else {
							if (!file_exists(@$config_path_to_sysctl)) {
								?>
								<tr>
									<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.red.gif" style="border: none;" align="right"><br><br><br><br></td>
									<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_sysctl_rel']; ?></td>
								</tr>
								<?php
							}
						}
					?>

					<tr>
						<td width="175" class="box-sel-head">ftpwho:</td>
						<td width="*" class="box-sel" align="right">
							<input type="text" size="100" name="frm_config_path_ftpwho" value="<?php echo @$config_path_to_ftpwho; ?>" style="width: 512px;">
						</td>
					</tr>
					<?php
						if (stripos(@$config_path_to_ftpwho, '/') === false && stripos(@$config_path_to_ftpwho, '\\') === false) {
							?>
							<tr>
								<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.black.gif" style="border: none;" align="right"><br><br><br><br></td>
								<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_ftpwho_rel']; ?></td>
							</tr>
							<?php
						} else {
							if (!file_exists(@$config_path_to_ftpwho)) {
								?>
								<tr>
									<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.red.gif" style="border: none;" align="right"><br><br><br><br></td>
									<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_ftpwho_no']; ?></td>
								</tr>
								<?php
							}
						}
				}
				?>

				<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
				<tr><td colspan="2" class="box-subheadline"><?php echo PHP_OS . $GLOBALS['language']['configure']['fp_cmdspecific']; ?></td></tr>
				<?php
					$osname = 'generic';
					switch (PHP_OS) {
						case 'Linux':		$osname = 'linux'; 	break;
						case 'FreeBSD':		$osname = 'bsd'; 	break;
						case 'NetBSD':		$osname = 'bsd'; 	break;
						case 'WINNT':		$osname = 'winnt'; 	break;
					}

					switch (PHP_OS) {
						case 'Linux':
						case 'NetBSD':
						case 'FreeBSD':
							?>
							<tr>
								<td width="175" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['fp_conf_file']; ?>:</td>
								<td width="*" class="box-sel" align="right">
									<input type="text" size="100" name="frm_config_path_kernel" value="<?php echo @$configuration['file_paths']['os_specific'][$osname]['kernel_configuration']; ?>" style="width: 512px;">
								</td>
							</tr>
							<?php
							if (!file_exists(@$configuration['file_paths']['os_specific'][$osname]['kernel_configuration'])) {
								?>
								<tr>
									<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.red.gif" style="border: none;" align="right"><br><br><br><br></td>
									<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_nokernel']; ?></td>
								</tr>
								<?php
							}
							?>

							<tr>
								<td width="175" class="box-sel-head">proftpd:</td>
								<td width="*" class="box-sel" align="right">
									<input type="text" size="100" name="frm_config_path_proftpd" value="<?php echo @$configuration['file_paths']['os_specific'][$osname]['proftpd']; ?>" style="width: 512px;">
								</td>
							</tr>
							<?php
							if (stripos(@$configuration['file_paths']['os_specific'][$osname]['proftpd'], '/') === false && stripos(@$configuration['file_paths']['os_specific'][$osname]['proftpd'], '\\') === false) {
								?>
								<tr>
									<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.black.gif" style="border: none;" align="right"><br><br><br><br></td>
									<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_proftpd_rel']; ?></td>
								</tr>
								<?php
							} else {
								if (!file_exists(@$configuration['file_paths']['os_specific'][$osname]['proftpd'])) {
									?>
									<tr>
										<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.red.gif" style="border: none;" align="right"><br><br><br><br></td>
										<td width="*" class="box-sel" align="justify" valign="top"><?php echo $GLOBALS['language']['configure']['fp_proftpd_no']; ?></td>
									</tr>
									<?php
								}
							}
							break;
						case 'WINNT':
							?>
							<tr>
								<td width="175" class="box-sel-head">FTP admin utils:</td>
								<td width="*" class="box-sel" align="right">
									<input type="text" size="100" name="frm_config_path_winutils" value="<?php echo @$configuration['file_paths']['os_specific'][$osname]['ftpadmin_utils']; ?>" style="width: 512px;">
								</td>
							</tr>
							<tr>
								<td width="175" class="box-sel-head"><img src="style/<?php echo $config_style_name; ?>/alert.black.gif" style="border: none;" align="right"><br><br><br><br><br><br></td>
								<td width="*" class="box-sel" align="justify" valign="top">
									This is the path to the FTP admin utils for Windows NT - these files will be in your misc-directory if you downloaded
									the Zip-file. These applications are used to show a few resource statistics for Windows NT. This path has to be set
									exactly - the full path and not a relative path. You also need to use forward-slashes, paths can NOT have any spaces in it.<br><br>An example: C:/ftpadmin_utils/
								</td>
							</tr>
							<?php
							break;
						default:
							break;
					}
				?>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_filepaths.reset()';
$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_filepaths.submit()';
doMenu($alter_menu);
?>