<?php
require_once('include_prepare.php');

if ((isset($_GET['domain_name']) && $_GET['domain_name']!='') AND (isset($_GET['domain_id']) && $_GET['domain_id']!='') AND (isset($_GET['deletion_confirmed']) && $_GET['deletion_confirmed']==1)) {
		$db->do_delete_whole_domain($_GET['domain_id'], $_GET['domain_name']);
}
if ((isset($_POST['frm_domain_edit_name']) && $_POST['frm_domain_edit_name']!='') AND (isset($_POST['frm_domain_edit_type']) && $_POST['frm_domain_edit_type']!='') AND (isset($_POST['frm_domain_edit_id']) && $_POST['frm_domain_edit_id']!='') AND (isset($_POST['frm_domain_edit_master']))) {
		$db->do_edit_existing_domain($_POST['frm_domain_edit_name'], $_POST['frm_domain_edit_type'], $_POST['frm_domain_edit_master'], $_POST['frm_domain_edit_id']);
		$domain_id = $db->get_domain_id($_POST['frm_domain_edit_name']);
		$domain = $_POST['frm_domain_edit_name'];
}
if ((isset($_POST['frm_pdns_new_domain_name']) && $_POST['frm_pdns_new_domain_name']!='') AND (isset($_POST['frm_pdns_domaintype']))) {
	if ((isset($_POST['frm_masters_ip_1']) && $_POST['frm_masters_ip_1']!='') AND (isset($_POST['frm_masters_ip_2']) && $_POST['frm_masters_ip_2']!='') AND (isset($_POST['frm_masters_ip_3']) && $_POST['frm_masters_ip_3']!='') AND (isset($_POST['frm_masters_ip_4']) && $_POST['frm_masters_ip_4']!='')) {
	    $master_ip = $_POST['frm_masters_ip_1'].'.'.$_POST['frm_masters_ip_2'].'.'.$_POST['frm_masters_ip_3'].'.'.$_POST['frm_masters_ip_4'];
        }
		$db->do_add_new_pdns_domain($_POST['frm_pdns_new_domain_name'], $_POST['frm_pdns_domaintype'], $master_ip);
		$domain_id = $db->get_domain_id($_POST['frm_pdns_new_domain_name']);
		$domain = $_POST['frm_pdns_new_domain_name'];
		$new_domain = 1;
}
if (isset($_POST['frm_pdns_domainname']) && $_POST['frm_pdns_domainname']!='') {
		$domain_id = $db->get_domain_id($_POST['frm_pdns_domainname']);
		$domain = $_POST['frm_pdns_domainname'];
} else if (isset($_GET['domain']) && $_GET['domain']!='') {
		$domain_id = $db->get_domain_id($_GET['domain']);
		$domain = $_GET['domain'];
}		    
    if ((isset($_POST['frm_domain_name']) && $_POST['frm_domain_name']!='') AND (isset($_POST['frm_domain_type']) && $_POST['frm_domain_type']!='') AND (isset($_POST['frm_domain_content']) && $_POST['frm_domain_content']!='') AND (isset($_POST['frm_domain_ttl']) && $_POST['frm_domain_ttl']!='') AND (isset($_POST['frm_domain_prio']) && $_POST['frm_domain_prio']!='')){
	if (!isset($_POST['frm_pdns_edit']) && (!isset($_POST['frm_domain_record_id']))) {
		$db->do_add_new_domain_record($_POST['frm_domain_id'], $_POST['frm_domain_root'], $_POST['frm_domain_name'], $_POST['frm_domain_type'], $_POST['frm_domain_content'], $_POST['frm_domain_ttl'], $_POST['frm_domain_prio']);
	} else {
		$db->do_edit_existing_domain_record($_POST['frm_domain_name'], $_POST['frm_domain_type'], $_POST['frm_domain_content'], $_POST['frm_domain_ttl'], $_POST['frm_domain_prio'], $_POST['frm_domain_record_id']);
	}	
    } else if (isset($_GET['del']) && $_GET['del']==1) {
		$db->do_delete_domain_record($_GET['id'], $_GET['domain']);
    }
?>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['pdns_pdns']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="config_pdns" action="configure.php?section=pdns" method="POST">
			<table class="box" style="border-style: none;">

				<tr>
					<td width="180" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['pdns_domain_list']; ?>:</td>
					<td width="*" class="box-sel" align="center">
						<select name="frm_pdns_domainname" style="width: 314px;" editable onChange="this.form.submit();">
							<?php
							$domainlist = $db->get_pdns_domains();
									echo '<option value="">Select domain...</option>';
								foreach($domainlist as $domain_name) {
									echo '<option value="' . $domain_name['name'] . '"';
									if ($domain == $domain_name['name']) echo 'selected';
									echo '>' . $domain_name['name'] . '</option>';
								}
							?>
						</select>
					</td>
					<td class="box-sel-head" width="55" height="5" align="center"><?php if ($domain) { echo '<a href="'. $_SERVER['PHP_SELF'] .'?section=pdns&amp;domain='. $domain .'&amp;domain_id='. $domain_id .'&amp;edite=1">'. $language['general']['edit'] .'</a>'; } ?></td>
					<td class="box-sel-head" width="55" height="5" align="center"><?php if ($domain) { echo '<a href="'. $_SERVER['PHP_SELF'] .'?section=pdns&amp;domain='. $domain .'&amp;domain_id='. $domain_id .'&amp;delete=1">'. $language['general']['delete'] .'</a>'; } ?></td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
	<?php if (!$domain) { ?>
	<tr>
		<td>
		<form name="config_pdns_add_new_domain" action="configure.php?section=pdns" method="POST">
			<table class="box" style="border-style: none;">
				<tr><td colspan="4" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
				<tr><td colspan="4" class="box-subheadline"><?php echo $GLOBALS['language']['configure']['pdns_add_new_domain']; ?></td></tr>
				<tr>
					<td width="175" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['pdns_add_new_domain_name']; ?>:</td>
					<td colspan="3" width="*" class="box-sel" align="right">
						<input type="text" size="100" name="frm_pdns_new_domain_name" style="width: 512px;">
					</td>
				</tr>
				<tr>
					<td width="175" class="box-sel-head"><?php echo $GLOBALS['language']['configure']['pdns_add_new_domain_type']; ?>:</td>
					<td width="*" class="box-sel" align="left">
						<select name="frm_pdns_domaintype" style="width: 104px;" editable onChange="return check('<?=$GLOBALS['language']['configure']['pdns_add_new_domain_masters_ip'];?>');">
						    <option value="NATIVE">NATIVE</option>
						    <option value="MASTER">MASTER</option>
						    <option value="SLAVE">SLAVE</option>
						</select>
					</td>
					<td width="175"  class="box-sel-head" align="right"><input type="text" name="infotxt" style="border: 0px; background-color: #424f5c;" disabled;></td>
					<td width="*" class="box-sel" align="right">
						<input type="hidden" size="3" name="frm_masters_ip_1" style="width: 40px;">&nbsp;
						<input type="hidden" size="3" name="frm_masters_ip_2" style="width: 40px;">&nbsp;
						<input type="hidden" size="3" name="frm_masters_ip_3" style="width: 40px;">&nbsp;
						<input type="hidden" size="3" name="frm_masters_ip_4" style="width: 40px;">
					</td>
				</tr>
			</table>
		</form>
		</td>
	</tr>
	<?php } if (($domain) AND (!isset($_GET['edite'])) || $_GET['edite']!=1) {
	    $domain_details = $db->get_pdns_domain_details($domain);
		if (count($domain_details[0]['id'])>0) {
	?>
	<tr>
		<td>
			<table class="box" style="border-style: none;">
				<tr><td colspan="7" class="box-subheadline"><?php echo $GLOBALS['language']['configure']['pdns_domain_details'].' &nbsp;<i>' . $domain; ?></i></td></tr>
				<tr>
					<td class="box-subheadline">Name</td>
					<td class="box-subheadline" width="50">Type</td>					
					<td class="box-subheadline">Content</td>
					<td class="box-subheadline" width="50">TTL</td>
					<td class="box-subheadline" width="50">Priority</td>
					<td class="box-subheadline" width="35">&nbsp;</td>
					<td class="box-subheadline" width="50">&nbsp;</td>
				</tr>
				<?php
					foreach($domain_details as $detail) {
					    echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
					    echo '<td class="box-sel">'. $detail['name'] .'</td>';					    
					    echo '<td class="box-sel" align="center">'. $detail['type'] .'</td>';
					    echo '<td class="box-sel">'. $detail['content'] .'</td>';
					    echo '<td class="box-sel" align="center">'. $detail['ttl'] .'</td>';
					    echo '<td class="box-sel" align="center">'. $detail['prio'] .'</td>';
					    echo '<td class="box-sel" align="center"><a href="'. $_SERVER['PHP_SELF'] .'?section=pdns&amp;domain='. $domain .'&amp;id='. $detail['id'] .'&amp;edit=1&amp;name='. $detail['name'] .'&amp;type='. $detail['type'] .'&amp;cont='. $detail['content'] .'&amp;ttl='. $detail['ttl'] .'&amp;prio='. $detail['prio'] .'">'. $language['general']['edit'] .'</a></td>';
					    echo '<td class="box-sel" align="center"><a onClick="return Alert(\''. $language['general']['delete_confirm'] .'\');" href="'. $_SERVER['PHP_SELF'] .'?section=pdns&amp;domain='. $domain .'&amp;&amp;id='. $detail['id'] .'&amp;del=1">'. $language['general']['delete'] .'</a></td>';
					    echo '</tr>';
					}
				?>
			</table>
		</td>
	</tr>
	<?php } else { 
		if ($new_domain) {
		pdns_notify($language['configure']['pdns_new_domain_records'], black);
		} else {
		pdns_notify($language['configure']['pdns_no_domain_records'], black);
		}
	    }
	?>
	<tr>
		<td>
		<form name="config_pdns_domain_details" action="configure.php?section=pdns" method="POST">
			<table class="box" style="border-style: none;">
				<tr><td colspan="5" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
				<tr><td colspan="5" class="box-subheadline"><?php if (isset($_GET['edit']) && $_GET['edit']==1) { echo $GLOBALS['language']['configure']['edit_domain_record']; } else { echo $GLOBALS['language']['configure']['new_domain_record']; } ?></td></tr>
				<tr>
					<td class="box-subheadline" width="150">Name</td>
					<td class="box-subheadline" width="65">Type</td>					
					<td class="box-subheadline">Content</td>
					<td class="box-subheadline" width="50">TTL</td>
					<td class="box-subheadline" width="50">Priority</td>
				</tr>
				<tr>
					<td class="box-sel"><input type="text" name="frm_domain_name" style="width: 150px;" value="<? if (isset($_GET['edit']) && $_GET['edit']==1) { echo $_GET['name']; } else { echo $domain; } ?>"></td>
					<td class="box-sel">
						<select name="frm_domain_type" style="width: 65px;">
							<?php
								foreach($config_valid_pdns_record_types as $types) {
									echo '<option value="' . $types . '"';
									if ((isset($_GET['edit']) && $_GET['edit']==1) AND $_GET['type'] == $types) echo 'selected';
									echo '>' . $types . '</option>';
								}
							?>
						</select>
					</td>					
					<td class="box-sel"><input type="text" name="frm_domain_content" style="width: 355px;" value="<? if (isset($_GET['edit']) && $_GET['edit']==1) echo $_GET['cont'];?>"></td>
					<td class="box-sel"><input type="text" name="frm_domain_ttl" style="width: 50px;" value="<? if (isset($_GET['edit']) && $_GET['edit']==1) echo $_GET['ttl'];?>"></td>
					<td class="box-sel"><input type="text" name="frm_domain_prio" style="width: 50px;" value="<? if (isset($_GET['edit']) && $_GET['edit']==1) echo $_GET['prio'];?>"></td>
					<input type="hidden" name="frm_domain_id" value="<?=$domain_id;?>">
					<input type="hidden" name="frm_domain_root" value="<?=$domain;?>">
					<input type="hidden" name="frm_pdns_domainname" value="<?=$domain;?>">
					<?php if (isset($_GET['edit']) && $_GET['edit']==1) {
						echo '<input type="hidden" name="frm_pdns_edit" value="1">';
						echo '<input type="hidden" name="frm_domain_record_id" value="'. $_GET['id'] .'">';
					 }
					?>
				</tr>
			</table>
		</form>
		</td>
	</tr>
	<?php }	 else if (isset($_GET['edite']) && $_GET['edite'] == 1) { 
	    $domain_edit = $db->get_pdns_domain_edit_details($_GET['domain_id']);
	?>
	<tr>
		<td>
		<form name="config_pdns_domain_edite" action="configure.php?section=pdns" method="POST">		
			<table class="box" style="border-style: none;">
				<tr><td colspan="7" class="box-subheadline"><?php echo $GLOBALS['language']['configure']['pdns_domain_edit'].' &nbsp;<i>' . $domain; ?></i></td></tr>
				<tr>
					<td class="box-subheadline">Name</td>
					<td class="box-subheadline" width="104">Type</td>					
					<td class="box-subheadline" width="202">Master`s IP address</td>
				</tr>
				<tr>
				<?php
				    echo '<td class="box-sel"><input type="text" name="frm_domain_edit_name" value="'. $domain_edit['name'] .'" style="width: 378px;"></td>';
				    echo '<td class="box-sel"><select name="frm_domain_edit_type" style="width: 104px;" editable onChange="return edit(\'' .$domain_edit['master'] .'\')">';
						foreach($config_valid_pdns_domain_types as $dtypes) {
						    echo '<option value="'. $dtypes.'"';
						    if ($domain_edit['type'] == $dtypes) echo 'selected';
						    echo '>' . $dtypes . '</option>';
						}
				    echo '</select>';
				    echo '</td>';
				    echo '<td class="box-sel"><input type="text" name="frm_domain_edit_master" style="width: 200px;" value="'. $domain_edit['master'] .'"></td>';
				    echo '<input type="hidden" name="frm_domain_edit_id" value="'. $domain_edit['id'].'"';
				?>
				</tr>
			</table>
		</form>
		</td>
	</tr>
	<?php } ?>
</table>
<?php
if ($domain && (!isset($_GET['edite']))) {
$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_pdns_domain_details.reset()';
$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_pdns_domain_details.submit()';
doMenu($alter_menu);
} else if ($domain && $_GET['edite'] == 1) {
$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_pdns_domain_edite.reset()';
$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_pdns_domain_edite.submit()';
doMenu($alter_menu);
} else {
$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_pdns_add_new_domain.reset()';
$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_pdns_add_new_domain.submit()';
doMenu($alter_menu);
}
if ((isset($_GET['domain_id']) && $_GET['domain_id']!='') AND (isset($_GET['delete']) && $_GET['delete']==1)) {
include('configure_pdns_delete.php');
}

function pdns_notify($text, $colour) {
	echo '<tr>';
	echo '	<td class="box-sel-head" align="center" valign="top"><img src="style/' . $GLOBALS['config_style_name'] . '/alert.' . $colour . '.gif" style="border: none;" align="center">';
	echo $text;
	echo '	</td>';
	echo '</tr>';
}
?>
<script language="javascript">
<!--
function Alert(warn) {
    if (!confirm(warn))
    {
	return false;
    } else {
    	return true;
    }
}

function check(msg) {
    if (document.config_pdns_add_new_domain.frm_pdns_domaintype.value == 'SLAVE')    
    {
	document.config_pdns_add_new_domain.frm_masters_ip_4.type = 'text';
	document.config_pdns_add_new_domain.frm_masters_ip_3.type = 'text';
	document.config_pdns_add_new_domain.frm_masters_ip_2.type = 'text';
	document.config_pdns_add_new_domain.frm_masters_ip_1.type = 'text';
	document.config_pdns_add_new_domain.infotxt.value = msg;
    } else {
    	document.config_pdns_add_new_domain.infotxt.value = '';
	document.config_pdns_add_new_domain.frm_masters_ip_1.type = 'hidden';
	document.config_pdns_add_new_domain.frm_masters_ip_2.type = 'hidden';
	document.config_pdns_add_new_domain.frm_masters_ip_3.type = 'hidden';
	document.config_pdns_add_new_domain.frm_masters_ip_4.type = 'hidden';
    }
}

function edit(master) {
    if (document.config_pdns_domain_edite.frm_domain_edit_type.value == 'SLAVE')
    {
	document.config_pdns_domain_edite.frm_domain_edit_master.value = master;
    } else {
	document.config_pdns_domain_edite.frm_domain_edit_master.value = '';
    }
}
-->
</script>