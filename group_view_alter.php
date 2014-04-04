<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['groups']['alter_group']; ?></td>
	</tr>
	<tr>
		<td>
			<form name="altergroup" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?viewID=' . $res_data["gid"] . '&amp;section=alter'; ?>">
				<table class="box" style="border-style: none;">
					<tr>
						<td width="80" class="box-sel-head"><?php echo $GLOBALS['language']['groups']['groupid']; ?>:</td>
						<td width="*" class="box-sel" align="right"><input type="text" size="120" name="frm_groupid" value="<?php echo $res_data["gid"]; ?>" disabled style="width: 535px;"></td>
					</tr>
					<tr>
						<td width="80" class="box-sel-head"><?php echo $GLOBALS['language']['general']['description']; ?>:</td>
						<td width="*" class="box-sel" align="right"><input type="text" size="120" name="frm_description" value="<?php echo $res_data["description"]; ?>" style="width: 535px;"></td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
</table>
<?php
$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.altergroup.reset()';
$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.altergroup.submit()';
doMenu($alter_menu);
?>
