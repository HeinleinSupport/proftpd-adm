<?php
?>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['transfers']['on_file_title']; ?></td>
	</tr>
	<tr>
		<td>
			<table class="box" style="border-style: none;">
				<tr><td colspan="4">&nbsp;</td></tr>
				<tr><td colspan="4" class="box-subheadline"><?php echo $GLOBALS['language']['general']['users']; ?></td></tr>
				<tr>
					<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['file_name']; ?></td>
					<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['file_size']; ?></td>
					<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['file_created']; ?></td>
					<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['file_modified']; ?></td>
				</tr>
				<?php
					make_file_listing('logs/users/', 'users');
				?>
				<tr><td colspan="4">&nbsp;</td></tr>
				<tr><td colspan="4" class="box-subheadline"><?php echo $GLOBALS['language']['general']['groups']; ?></td></tr>
				<tr>
					<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['file_name']; ?></td>
					<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['file_size']; ?></td>
					<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['file_created']; ?></td>
					<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['file_modified']; ?></td>
				</tr>
				<?php
					make_file_listing('logs/groups/', 'groups');
				?>
			</table>
		</td>
	</tr>
</table>
<?php
function make_file_listing($path = './', $category) {
	if (!file_exists($path) || !is_dir($path)) {
			echo '<tr><td colspan="4" class="box-sel" align="center"><span class="error">' . $GLOBALS['language']['transfers']['err_no_open'] . $path . '.</span></td></tr>';
	} else {
		if (($handle = opendir($path))) {
			$files = array();
			while (false !== ($file = readdir($handle))) {
				if ($file == '.' || $file == '..') continue;
				array_push ($files, $file);
			}
			closedir($handle);
			unset($handle);

			natcasesort($files);

			foreach($files as $file) {
				echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
				echo ' <td width="*" class="box-sel"><a href="' . $_SERVER['PHP_SELF'] . '?section=on_file&amp;category=' . $category . '&amp;file=' . $file . '">' . $file . '</a></td>';
				echo '	<td width="*"  class="box-sel" align="right">' . number_format(filesize($path . $file) / 1024, 2, ',', ' ') . ' KB</td>';
				echo '	<td width="100" class="box-sel" align="center">' . date ("Y-m-d H:i:s", filectime($path . $file)) . '</td>';
				echo '	<td width="100" class="box-sel" align="center">' . date ("Y-m-d H:i:s", filemtime($path . $file)) . '</td>';
				echo '</tr>';
			}
		} else {
			echo '<tr><td colspan="4" class="box-sel>Could not open directory, "' . $path . '".</td></tr>';
		}
	}
}
?>