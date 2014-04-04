<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['status']['pro_proftpd']; ?></td>
	</tr>
	<tr>
		<td>
		<table class="box" style="border-style: none;">
		<?php
		$module_info = $system -> get_ftpmodules();
		if (sizeof($module_info) != 0) {
			echo '<tr><td colspan="3" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>';
			echo '<tr><td colspan="3" class="box-subheadline">' . $GLOBALS['language']['status']['pro_compiled_in'] . '</td></tr>';
			echo '<tr>';
			echo '	<td width="140"  class="box-pl" align="center">' . $GLOBALS['language']['status']['pro_module_field'] . '</td>';
			echo '	<td width="*" colspan="2" class="box-pl" align="center">' . $GLOBALS['language']['status']['pro_module_desc'] . '</td>';
			echo '</tr>';

			$result = array();
			for ($i = 0; $i < sizeof($module_info); $i++) {
				$result[$module_info[$i]] = describe_module($module_info[$i]);
			}
			print_info($result);
		}
		?>
		</table>
		</td>
	</tr>
</table>
<?php
function describe_module($name) {
	global $language;

	if (isset($language['status']['ftp_module'][$name])) return $language['status']['ftp_module'][$name];
	else return '&nbsp;';
}
?>