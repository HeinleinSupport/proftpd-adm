<?php
$primary_members = $db->get_groupmembers_main($_GET["viewID"]);
?>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['groups']['delete_group']; ?></td>
	</tr>
	<tr>
		<td>
			<table class="box" style="border-style: none;">
			<tr>
				<td colspan="2" class="box-sel" align="justify">
					<?php
					echo $GLOBALS['language']['groups']['desc_delete'];
					if (count($primary_members) != 0) echo $GLOBALS['language']['groups']['desc_delete_prim'];
					?>
				</td>
			</tr>
			<?php
			if (count($primary_members) != 0) {
				?>
				<tr>
					<td width="110" class="box-sel-head" valign="top"><?php echo $GLOBALS['language']['groups']['members']; ?>:</td>
					<td width="600" class="box-sel" align="left">
						<?php
							foreach ($primary_members as $member) {
								print '&gt;&gt; <a href="user_view.php?viewID=' . $member["uid"] . '">' . $member["userid"] . '</a><br>';
							}
						?>
					</td>
				</tr>
				<?php
			}
			?>
			</table>
			</td>
	</tr>
</table>
<?php
$delete_menu["<confirm_delete>"]	= $_SERVER['PHP_SELF'] . '?viewID=' . $_GET["viewID"] . '&amp;section=delete';
doMenu($delete_menu);
?>
