<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['userv']['delete_user']; ?></td>
	</tr>
	<tr>
		<td>
			<table class="box" style="border-style: none;">
				<tr>
					<td colspan="2" class="box-sel" align="justify">
						<?php echo $GLOBALS['language']['userv']['delete_user_desc']; ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php
if (!isset($group_list["members"][$res_data["userid"]])) {
	$delete_menu["<confirm_delete>"]	= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=delete';
	doMenu($delete_menu);
}
?>
