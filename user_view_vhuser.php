<?php
if ((isset($_GET['name']) && $_GET['name']!='') AND (isset($_GET['del']) && $_GET['del']==1)){
	$db->do_delete_one_vhuser($_GET['name'], $config_ext['pdns']['enabled']);
}
$vhuser_data = $db->get_vhuser_by_id($res_data['uid']);
?>

<table class="box">
	<tr>
		<td class="box-headline" colspan="2">&gt;&gt; <?php echo $GLOBALS['language']['userv']['vhusertitle']; ?></td>
	</tr>
	<tr>
		<td colspan="2">
			<table class="box" style="border-style: none;">
			<?php
			if (count($vhuser_data) != 0) foreach($vhuser_data as $vhosts) {
				?>
				<tr onmouseover="if (typeof(this.style) != 'undefined') this.className = 'overRow';" onmouseout="if (typeof(this.style) != 'undefined') this.className = ''">
					<td width="*" class="box-sel"><?php echo $vhosts['servername']; ?></td>
					<td width="*" class="box-sel" align="left"><?php echo $vhosts['docroot']; ?></td>
					<td width="7%" class="box-sel" align="center"><a href="user_view.php?viewID=<?=$res_data['uid']?>&amp;section=vhuser&amp;name=<?=$vhosts['servername']?>&amp;del=1"><?php echo $language['general']['delete']; ?></a></td>
				</tr>
				<?php
			}
			?>
			</table>
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr><td colspan="2" class="box-subheadline"><?php echo $GLOBALS['language']['userv']['vhuseraddnext']; ?></td></tr>
	<tr>
		<td colspan="2">
			<form name="newvhuser" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?viewID=' . $res_data["uid"] . '&amp;section=vhuser'; ?>">
				<table class="box" style="border-style: none;">
					<tr>
						<td width="150" class="box-sel-head"><?php echo $GLOBALS['language']['userv']['vhname']; ?>:</td>
						<td width="*" class="box-sel" align="right"><input type="text" style="width:536px;" size="105" name="frm_nvhname"></td>
					</tr>
					<tr>
						<td width="150" class="box-sel-head"><?php echo $GLOBALS['language']['userv']['vhpath']; ?>:</td>
						<td width="*" class="box-sel" align="right"><input type="text" style="width: 536px;" size="105" name="frm_nvhpath"></td>
					</tr>
				</table>
				<input type="hidden" name="frm_uid" value="<?=$res_data['uid']?>">
			<?php if ($config_ext['pdns']['enabled'] != 1) { echo '</form>'; } ?>
		</td>
	</tr>
	<?php if ($config_ext['pdns']['enabled'] == 1) { ?>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr><td colspan="2" class="box-subheadline"><?php echo $language['configure']['ext_vhost_pdns_record']; ?></td></tr>
	<tr>
		<td colspan="2">
				<table class="box" style="border-style: none;">
					<tr>
						<td class="box-subheadline" width="65">Type</td>
						<td class="box-subheadline">Content</td>
						<td class="box-subheadline" width="50">TTL</td>
						<td class="box-subheadline" width="50">Priority</td>
					</tr>
					<tr>
						<td class="box-sel">
							<select name="frm_record_type" style="width: 65px;">
								<option value="A">A</option>
								<option value="CNAME">CNAME</option>
							</select>
						</td>
						<td class="box-sel"><input type="text" name="frm_record_content" style="width: 511px;"></td>
						<td class="box-sel"><input type="text" name="frm_record_ttl" style="width: 50px;"></td>
						<td class="box-sel"><input type="text" name="frm_record_prio" style="width: 50px;"></td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
	<?php if (isset($exists) && $exists == 1) {
	        pdns_recnotify($language['configure']['pdns_domain_exists_true'], black);
	  } else if (isset($exists) && $exists == 0) {
	        pdns_recnotify($language['configure']['pdns_domain_exists_false'], red);
	  }
	}
	?>
</table>
<?php
$exp_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.newvhuser.reset()';
$exp_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.newvhuser.submit()';
doMenu($exp_menu);

function pdns_recnotify($text, $colour) {
	echo '<tr>';
	echo '	<td class="box-sel" align="center" valign="top"><img src="style/' . $GLOBALS['config_style_name'] . '/alert.' . $colour . '.gif" style="border: none;" align="center">';
	echo $text;
	echo '	</td>';
	echo '</tr>';
}
?>
