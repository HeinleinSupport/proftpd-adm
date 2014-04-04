<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['sec_downloads']; ?></td>
	</tr>
	<tr>
		<td>
		<table class="box" style="border-style: none;">
			<tr>
				<td width="175"  class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['configure']['sec_down_topic']; ?></td>
				<td width="*" class="box-sel">
					<?php
						echo $config_ftp_root . '<br>';

						$list = array();
						foreach($config_ftp_sections_down as $download) {
							$item = '<a href="configure.php?section=sections&amp;remove_download=' . $download . '">[D]</a> &gt;&gt; ' . $download . '<br>';
							array_push($list, $item);
						}
						natcasesort($list);
						foreach ($list as $item) echo $item;
					?>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td>
		<form name="config_sections_download" action="configure.php?section=sections" method="POST">
			<table class="box" style="border-style: none;">
				<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
				<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['configure']['sec_adddownload']; ?></td></tr>
				<tr>
					<td width="175"  class="box-sel-head"><?php echo $GLOBALS['language']['configure']['sec_relpath']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="text" size="100" name="frm_sections_download" value="/" style="width: 512px;">
					</td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$alter_add_groups_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_sections_download.reset()';
$alter_add_groups_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_sections_download.submit()';
doMenu($alter_add_groups_menu);
?>
<br>
<br>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['sec_uploads']; ?></td>
	</tr>
	<tr>
		<td>
		<table class="box" style="border-style: none;">
			<tr>
				<td width="175"  class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['configure']['sec_up_topic']; ?></td>
				<td width="*" class="box-sel">
					<?php
						echo $config_ftp_root . '<br>';

						$list = array();
						foreach($config_ftp_sections_up as $upload) {
							$item = '<a href="configure.php?section=sections&amp;remove_upload=' . $upload . '">[D]</a> &gt;&gt; ' . $upload . '<br>';
							array_push($list, $item);
						}
						natcasesort($list);
						foreach ($list as $item) echo $item;
					?>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td>
		<form name="config_sections_upload" action="configure.php?section=sections" method="POST">
			<table class="box" style="border-style: none;">
				<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
				<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['configure']['sec_addupload']; ?></td></tr>
				<tr>
					<td width="175"  class="box-sel-head"><?php echo $GLOBALS['language']['configure']['sec_relpath']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="text" size="100" name="frm_sections_upload" value="/" style="width: 512px;">
					</td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$alter_add_groups_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_sections_upload.reset()';
$alter_add_groups_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_sections_upload.submit()';
doMenu($alter_add_groups_menu);
?>
