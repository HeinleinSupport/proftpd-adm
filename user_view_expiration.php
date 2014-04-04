<SCRIPT type="text/javascript">
// <!--
function reCalc() {
	document.updateexpiration.frm_date.value = document.updateexpiration.frm_date_selector.value;

	return true;
}
// -->
</SCRIPT>

<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['userv']['expirationdate']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="updateexpiration" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?viewID=' . $res_data["uid"] . '&amp;section=expiration'; ?>">
			<table class="box" style="border-style: none;">
				<tr>
					<td width="150" class="box-sel-head"><?php echo $GLOBALS['language']['userv']['selectdate']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<select name="frm_date_selector" style="width: 538px;" onChange="reCalc();">
						  <?
							  echo '<option value="' . $res_data["expiration"] . '">' . $GLOBALS['language']['general']['time_old'];;
						  ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-1 day"))) ?>"><?php echo $GLOBALS['language']['general']['time_yesterday']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+1 day"))) ?>"><?php echo $GLOBALS['language']['general']['time_24h']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+1 week"))) ?>"><?php echo $GLOBALS['language']['general']['time_1week']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+2 weeks"))) ?>"><?php echo $GLOBALS['language']['general']['time_2week']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+1 month"))) ?>"><?php echo $GLOBALS['language']['general']['time_1month']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+3 months"))) ?>"><?php echo $GLOBALS['language']['general']['time_3month']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+6 months"))) ?>"><?php echo $GLOBALS['language']['general']['time_6month']; ?>
						  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("+1 year"))) ?>"><?php echo $GLOBALS['language']['general']['time_1year']; ?>
						  <option value="0000-00-00 00:00:00" <?php if($res_data["expiration"] == -1) echo ' selected'; ?>><?php echo $GLOBALS['language']['general']['time_never']; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td width="150" class="box-sel-head"><?php echo $GLOBALS['language']['userv']['customdate']; ?>:</td>
					<td width="*" class="box-sel" align="right"><input type="text" style="width: 536px;" size="105" name="frm_date" value="<?php echo $res_data["expiration"]; ?>"></td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$exp_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.updateexpiration.reset()';
$exp_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.updateexpiration.submit()';
doMenu($exp_menu);
?>
