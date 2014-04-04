<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['groups']['newgroup']; ?></td>
	</tr>
	<tr>
		<td>
			<form name="makegroup" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?section=addgroup">
				<table class="box" style="border-style: none;">
					<tr>
						<td style="width: 80px;" class="box-sel-head"><?php echo $GLOBALS['language']['groups']['groupname']; ?>:</td>
						<td class="box-sel" align="right"><input type="text" size="120" name="frm_groupname" style="width: 535px;"></td>
					</tr>
					<tr>
						<td style="width: 80px;" class="box-sel-head"><?php echo $GLOBALS['language']['general']['description']; ?>:</td>
						<td class="box-sel" align="right"><input type="text" size="120" name="frm_description" style="width: 535px;"></td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
</table>
<?php
$group_add_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.makegroup.reset()';
$group_add_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.makegroup.submit()';
doMenu($group_add_menu);
?>
