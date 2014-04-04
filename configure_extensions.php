<?php
require_once('include_database.php');
require_once('include_system.php');
?>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['configure']['ext_ext']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="config_extensions" action="configure.php?section=extensions" method="POST">
			<table class="box" style="border-style: none;">
				<?php
				$db_working = false;
				$db = db_get_dbclass();
				$db->do_connect();
				if (!$db->connection_handle) {
				} else {
					$db->do_select_db();
					if (!$db->selected_database) {
					} else {
						$db_working = true;
					}
				}


				if ($db_working) {
					?>
					<!-- Apache Virtual Hosts -->
					<?php
					$have_table = $db->get_table_exists('vhtable');
					?>
					<tr>
						<td width="175" class="box-sel-head"><?php echo $language['configure']['ext_vhost']; ?>:</td>
						<td width="*" class="box-sel" align="right">
							<select name="frm_enable_vhost" style="width: 514px;" <?php if (!$have_table && $config_ext['vhosts']['enabled'] == 0) echo 'disabled'; ?>>
								<option value="1" <?php if($config_ext['vhosts']['enabled'] == 1) echo 'selected'; ?>><?php echo $language['general']['enabled']; ?></option>
								<option value="0" <?php if($config_ext['vhosts']['enabled'] == 0) echo 'selected'; ?>><?php echo $language['general']['disabled']; ?></option>
							</select>
						</td>
					</tr>
					<?php
					if (!$have_table) {
						if ($config_ext['vhosts']['enabled'] == 1) notify($language['configure']['ext_vhost_no_table_activated']);
						else notify($language['configure']['ext_vhost_no_table'], 'black');
					}
					?>
					<!-- Quota -->
					<?php
					$have_table = $db->get_table_exists('ftpquotalimits') && $db->get_table_exists('ftpquotatallies');
					$have_modules = false;
					$have_section = true;
					if (sys_statusavailable() != 0) {
						$system = sys_getinfoclass();
						if ($system->get_have_ftpmodule('mod_quotatab.c') && $system->get_have_ftpmodule('mod_quotatab_sql.c')) {
							$have_modules = true;
						}
						$have_section = $system->have_section_proftpd();
					} else {
						// Can't tell, but assume we have the module anyway
						$have_modules = true;
					}
					?>
					<tr>
						<td width="175" class="box-sel-head"><?php echo $language['configure']['ext_quota']; ?>:</td>
						<td width="*" class="box-sel" align="right">
							<select name="frm_enable_quota" style="width: 514px;" <?php if ((!$have_table || !$have_modules) && $config_ext['quota']['enabled'] == 0) echo 'disabled'; ?>>
								<option value="1" <?php if($config_ext['quota']['enabled'] == 1) echo 'selected'; ?>><?php echo $language['general']['enabled']; ?></option>
								<option value="0" <?php if($config_ext['quota']['enabled'] == 0) echo 'selected'; ?>><?php echo $language['general']['disabled']; ?></option>
							</select>
						</td>
					</tr>
					<?php
					if (!$have_table) {
						if ($config_ext['quota']['enabled'] == 1) notify($language['configure']['ext_quota_no_table_activated']);
						else notify($language['configure']['ext_quota_no_table'], 'black');
					}
					if (!$have_modules && $have_section) {
						$color = 'black';
						if ($config_ext['quota']['enabled'] == 1) $color = 'red';
						notify($language['configure']['ext_quota_no_mods'], $color);
					}
					if($config_ext['quota']['enabled'] == 0) {
						$db = db_get_dbclass();
						$db->do_connect();
						if ($db->connection_handle) {
							$db->do_select_db();
							if ($db->selected_database) {
								if ($db->get_quotas_exists()) {
									notify($language['configure']['ext_quota_no_activated'], 'red');
								}
							}
						}
					}
					?>
					<!-- Power DNS -->
					<?php
					$have_table = $db->get_table_exists('domains') && $db->get_table_exists('records') && $db->get_table_exists('supermasters');
    				?>
					<tr>
						<td width="175" class="box-sel-head"><?php echo $language['configure']['ext_pdns']; ?>:</td>
						<td width="*" class="box-sel" align="right">
							<select name="frm_enable_pdns" style="width: 514px;" <?php if (!$have_table && $config_ext['pdns']['enabled'] == 0) echo 'disabled'; ?>>
								<option value="1" <?php if($config_ext['pdns']['enabled'] == 1) echo 'selected'; ?>><?php echo $language['general']['enabled']; ?></option>
								<option value="0" <?php if($config_ext['pdns']['enabled'] == 0) echo 'selected'; ?>><?php echo $language['general']['disabled']; ?></option>
							</select>
						</td>
					</tr>
					<?php
					if (!$have_table) {
					    if ($config_ext['pdns']['enabled'] == 1) notify($language['configure']['ext_pdns_no_table_activated']);
					    else notify($language['configure']['ext_pdns_no_table'], 'black');
					}


				} else {
					notify($language['configure']['ext_no_db']);
				}
				?>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$alter_menu[$GLOBALS['language']['menu']['reset']]	= 'javascript:document.config_extensions.reset()';
$alter_menu[$GLOBALS['language']['menu']['submit']]	= 'javascript:document.config_extensions.submit()';
doMenu($alter_menu);

function notify($text, $colour = 'red') {
	echo '<tr>';
	echo '	<td width="175" class="box-sel-head" align="right" valign="top"><img src="style/' . $GLOBALS['config_style_name'] . '/alert.' . $colour . '.gif" style="border: none;" align="right"></td>';
	echo '	<td width="*" class="box-sel" align="justify" valign="top">';
	echo $text;
	echo '	</td>';
	echo '</tr>';
}
?>