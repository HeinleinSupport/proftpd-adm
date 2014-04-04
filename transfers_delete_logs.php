<SCRIPT type="text/javascript">
// <!--
function reCalc() {
	document.confirm_delete.frm_date.value = document.confirm_delete.frm_date_selector.value;

	return true;
}
// -->
</SCRIPT>

<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['transfers']['delete_logs']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="confirm_delete" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?section=delete_logs'; ?>">
			<table class="box" style="border-style: none;">
				<?php
				if (isset($_POST['frm_date']) && strlen($_POST['frm_date']) != 0) {
					$number = $db->do_delete_logs($_POST['frm_date']);
					?>
					<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
					<tr>
						<td class="box-sel" align="center" colspan="2">
							<span class="error">
								<?php echo $number . ' ' . $GLOBALS['language']['transfers']['num_deleted']; ?>
							</span>
						</td>
					</tr>
					<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
					<?php
				}
				?>
				<tr>
					<td class="box-sel" colspan="2">
						<?php echo $GLOBALS['language']['transfers']['delete_desc']; ?>
					</td>
				</tr>
				<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
				<tr>
					<td width="150" class="box-sel-head"><?php echo $GLOBALS['language']['transfers']['del_older_than']; ?></td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_date_selector" style="width: 538px;" onChange="reCalc();">
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("now"))) ?>"><?php echo $GLOBALS['language']['general']['time_now']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-1 day"))) ?>"><?php echo $GLOBALS['language']['general']['time_24h']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-1 week"))) ?>"><?php echo $GLOBALS['language']['general']['time_1week']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-2 weeks"))) ?>"><?php echo $GLOBALS['language']['general']['time_2week']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-1 month"))) ?>"><?php echo $GLOBALS['language']['general']['time_1month']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-3 months"))) ?>"><?php echo $GLOBALS['language']['general']['time_3month']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-6 months"))) ?>"><?php echo $GLOBALS['language']['general']['time_6month']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-1 year"))) ?>"><?php echo $GLOBALS['language']['general']['time_1year']; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="150" class="box-sel-head"><?php echo $GLOBALS['language']['userv']['customdate']; ?>:</td>
					<td width="*" class="box-sel" align="right"><input type="text" style="width: 536px;" size="105" name="frm_date" value="<?php echo strftime("%Y-%m-%d %H:%M:%S",strtotime("now")); ?>"></td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$clean_menu[$GLOBALS['language']['transfers']['delete_logs_bt']] = "javascript:submit_if_confirm('" . $GLOBALS['language']['general']['delete_confirm'] . "', document.confirm_delete);";
doMenu($clean_menu);
?>