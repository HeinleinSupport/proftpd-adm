<?php
require_once('include_prepare.php');
doHeader();

if (isset($_POST["frm_groupname"]) && strlen($_POST["frm_groupname"]) != 0) {
	if (!$db->get_group_exists($_POST["frm_groupname"])) {
		$db->do_add_group($_POST["frm_groupname"], @$_POST["frm_description"]);
	}
}
?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['groups']['groups']; ?></td>
		</tr>
		<tr>
			<td>
			<table class="box" style="border-style: none;">
			<tr>
			<!--
			userid  passwd  homedir  shell  uid  gid  count  lastlogin
			-->
				<td style="width: 90px;" class="box-pl" align="center"><?php echo $GLOBALS['language']['groups']['groupname']; ?></td>
				<td class="box-pl" align="center"><?php echo $GLOBALS['language']['general']['description']; ?></td>
			</tr>
			<?php
				$grouplist = $db->get_grouplist();
				foreach ($grouplist as $group) {
					echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
					echo '<td style="width: 90px;" class="box-sel" align="left"><a href="group_view.php?viewID=' . $group["gid"] . '">' . $group["groupname"] . '</a></td>';
					echo '<td class="box-sel" align="left">' . $group["description"] . '</td>';
					echo '</tr>';
				}
			?>
			</table>
			</td>
		</tr>
	</table>
<?php
$group_menu[$GLOBALS['language']['groups']['newgroup']]	= $_SERVER['PHP_SELF'] . '?section=addgroup';
doMenu($group_menu);

echo '<br><br>';
if (isset($_GET["section"]) and $_GET["section"] == "addgroup") {
		include('group_list_add.php');
}

doFooter();
?>
