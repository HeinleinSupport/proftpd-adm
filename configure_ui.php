<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['ui_ui']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="config_ui" action="configure.php?section=ui" method="POST">
			<table class="box" style="border-style: none;">
				<tr>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ui_numnames']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="text" size="45" name="frm_ui_topnames" value="<?php echo $config_toplist_num_names; ?>" style="width: 190px;" align="right">
					</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ui_numlogitems']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="text" size="45" name="frm_ui_logitems" value="<?php echo $config_userview_logitems; ?>" style="width: 190px;" align="right">
					</td>
				</tr>
				<tr>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ui_padtoplist']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_ui_padtop" style="width: 192px;">
							<option value="1"<?php  if($config_toplist_padlist == 1) echo ' selected'; ?>><?php echo $GLOBALS['language']['general']['yes']; ?></option>
							<option value="0"<?php  if($config_toplist_padlist == 0) echo ' selected'; ?>><?php echo $GLOBALS['language']['general']['no']; ?></option>
						</select>
					</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ui_striplogs']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_ui_striplog" style="width: 192px;">
							<option value="1"<?php  if($config_userview_striplogpath == 1) echo ' selected'; ?>><?php echo $GLOBALS['language']['general']['yes']; ?></option>
							<option value="0"<?php  if($config_userview_striplogpath == 0) echo ' selected'; ?>><?php echo $GLOBALS['language']['general']['no']; ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ui_sysonly']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_ui_onlysys" style="width: 192px;">
							<option value="1"<?php  if($config_sysinfo_only == 1) echo ' selected'; ?>><?php echo $GLOBALS['language']['general']['yes']; ?></option>
							<option value="0"<?php  if($config_sysinfo_only == 0) echo ' selected'; ?>><?php echo $GLOBALS['language']['general']['no']; ?></option>
						</select>
					</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ui_style']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_ui_style" style="width: 192px;">
							<?php
							if ($handle = opendir('./style/')) {
								$dirs = array();


								while (false !== ($file = readdir($handle))) {
									if ($file == '.' || $file == '..') continue;

									array_push($dirs, $file);
								}

								natcasesort($dirs);
								foreach ($dirs as $file) {
									echo '<option value="' . $file . '"';
									if ($config_style_name == $file) echo ' selected';
									echo '>' . str_replace('_', ' ', strtoupper($file[0]) . substr($file, 1)) . '</option>';
								}
								closedir($handle);
								unset($handle);
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ui_sel_quota']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_ui_sel_quota" style="width: 192px;">
							<option value="1"<?php  if($config_ext['quota']['select_quota'] == 1) echo ' selected'; ?>><?php echo $GLOBALS['language']['general']['yes']; ?></option>
							<option value="0"<?php  if($config_ext['quota']['select_quota'] == 0) echo ' selected'; ?>><?php echo $GLOBALS['language']['general']['no']; ?></option>
						</select>
					</td>
					<td width="*" class="box-sel">&nbsp;</td>
					<td width="*" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['ui_language']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_ui_language" style="width: 192px;">
							<option value="english"   <?php if (@$config_language == 'english') echo 'selected'; ?>>English</option>
							<option value="german"   <?php if (@$config_language == 'german') echo 'selected'; ?>>German</option>
							<option value="hungarian" <?php if (@$config_language == 'hungarian') echo 'selected'; ?>>Hungarian</option>
							<option value="norwegian" <?php if (@$config_language == 'norwegian') echo 'selected'; ?>>Norwegian</option>
						</select>
					</td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_ui.reset()';
$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_ui.submit()';
doMenu($alter_menu);
?>