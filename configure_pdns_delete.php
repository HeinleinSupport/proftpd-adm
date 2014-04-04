<br>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['pdns_delete']; ?></td>
	</tr>
	<tr>
		<td>
			<table class="box" style="border-style: none;">
				<tr>
					<td colspan="2" class="box-sel" align="justify">
						<?php echo $GLOBALS['language']['configure']['pdns_delete_desc']; ?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php
$delete_menu["<confirm_delete>"]	= $_SERVER['PHP_SELF'] . '?domain_name='. $domain .'&amp;domain_id=' . $_GET["domain_id"] . '&amp;section=pdns';
doMenu($delete_menu);
?>
