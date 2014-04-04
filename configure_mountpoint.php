<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['mp_mp']; ?></td>
	</tr>
	<tr>
		<td>
		<table class="box" style="border-style: none;">
			<tr>
				<td width="175"  class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['configure']['mp_skipped_mp']; ?>:</td>
				<td width="*" class="box-sel">
					<?php
						$list = array();
						foreach($config_skip_mpoints as $mountpoint) {
							$item = '<a href="configure.php?section=mountpoint&amp;remove_mountpoint=' . $mountpoint . '">[D]</a> &gt;&gt; ' . $mountpoint . '<br>';
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
		<form name="config_mountpoint" action="configure.php?section=mountpoint" method="POST">
			<table class="box" style="border-style: none;">
				<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
				<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['configure']['mp_hide_mp']; ?></td></tr>
				<tr>
					<td width="175"  class="box-sel-head"><?php echo $GLOBALS['language']['configure']['mp_select_mp']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<?php
							$list = "";
							$disable = 1;

							$mps = $system -> get_resource_hd();
							foreach ($mps as $mount) {
								$list .= '<option value="' . strip_tags($mount["mountpoint"]) . '">' . strip_tags($mount["mountpoint"]) . '</option>';
								$disable = 0;
							}

							echo '<select name="frm_mountpoint" style="width: 514px;"';
							if ($disable == 1) echo ' disabled';
							echo '>' . $list;
							echo '</select>';
						?>
					</td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$alter_add_groups_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_mountpoint.reset()';
$alter_add_groups_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_mountpoint.submit()';
doMenu($alter_add_groups_menu);
?>
