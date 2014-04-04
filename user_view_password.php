<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['userv']['setpassword']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="updatepassword" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?viewID=' . $res_data["uid"] . '&amp;section=password'; ?>">
			<table class="box" style="border-style: none;">
				<tr>
					<td width="150" class="box-sel-head"><?php echo $GLOBALS['language']['userv']['newpassword']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="password" size="105" name="frm_password1" style="width: 535px;">
					</td>
				</tr>
				<tr>
					<td width="150" class="box-sel-head"><?php echo $GLOBALS['language']['userv']['newpasswordagain']; ?>:</td>
					<td width="*" class="box-sel" align="right">
						<input type="password" size="105" name="frm_password2" style="width: 535px;">
					</td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$alter_add_groups_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.updatepassword.reset()';
$alter_add_groups_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.updatepassword.submit()';
doMenu($alter_add_groups_menu);

?>
<br>
<br>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['userv']['onchoosingpassword']; ?></td>
	</tr>
	<tr>
		<td>
			<table class="box" style="border-style: none;">
				<tr>
					<td width="*" class="box-sel" align="justify">
						<?php echo $GLOBALS['language']['userv']['howto_password']; ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
