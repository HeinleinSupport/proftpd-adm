<?php
require_once('include_config.php');
require_once('include_language.php');
require_once('include_system.php');

function doHeader() {
	global $config_style_name, $jscript, $config_main_menu, $config_sysinfo_only;

	$config_proftp_admin_name = $GLOBALS['language']['name']['administrator'];
	if ($config_sysinfo_only) $config_proftp_admin_name = $GLOBALS['language']['name']['sys_info_only'];

	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="style/<?php echo $config_style_name . '/' . $config_style_name; ?>.css">
			<title><?php echo $config_proftp_admin_name; ?></title>
			<script src="jscript/functions.js" type="text/javascript"></script>
		</head>
		<body>
			<table class="outerBounds">
				<tr>
					<td>
							<table class="box">
								<tr><td class="box-main_title" align="center"><?php echo $config_proftp_admin_name; ?></td></tr>
								<tr><td><table class="box" style="border-style: none;"><tr><td></td></tr></table></td></tr>
							</table>
							<?php
							if ($config_sysinfo_only == 0) {
								$main_menu = array();
								$main_menu[$GLOBALS['language']['menu']['mainpage']] 	= 'index.php';
								$main_menu[$GLOBALS['language']['menu']['users']]		= 'user_list.php';
								$main_menu[$GLOBALS['language']['menu']['groups']]		= 'group_list.php';
								$main_menu[$GLOBALS['language']['menu']['transfers']]	= 'transfers.php';
								if (sys_statusavailable()) $main_menu[$GLOBALS['language']['menu']['status']]	= 'status.php';
								$main_menu["<spacer>"]		= '';
							} else {
								if (sys_statusavailable()) $main_menu[$GLOBALS['language']['menu']['sysinfo']]	= 'index.php';
							}
							$main_menu[$GLOBALS['language']['menu']['about']]			= 'about.php';
							$main_menu[$GLOBALS['language']['menu']['manual']]			= 'manual.php';
							if(!isOldPHP()) $main_menu[$GLOBALS['language']['menu']['configure']]		= 'configure.php';
							doMenu($main_menu);

							echo '<br><br>';
}

function doFooter() {
					if (isset($GLOBALS['db']) && $GLOBALS['db']->log_has_errors())
						doErrorList($GLOBALS['language']['general']['error_db_errors'], $GLOBALS['db']->log_fetchlog());
					?>
					</td>
				</tr>
			</table>
		</body>
	</html>
	<?php
}

function doError($type, $message) {
	?>
		<table class="box">
			<tr>
				<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['general']['error_occured']; ?></td>
			</tr>
			<tr>
				<td>
				<table class="box" style="border-style: none;">
					<tr><td width="*" class="box-sel" colspan="2">&nbsp;</td></tr>
					<tr>
						<td width="50" class="box-sel" valign="top"><?php echo $GLOBALS['language']['general']['error_type']; ?>:</td>
						<td width="*"  class="box-sel"><?php echo $type; ?></td>
					</tr>
					<tr>
						<td width="50" class="box-sel" valign="top"><?php echo $GLOBALS['language']['general']['error_details']; ?>:</td>
						<td width="*"  class="box-sel"><?php echo $message; ?></td>
					</tr>
					<tr><td width="*" class="box-sel" colspan="2">&nbsp;</td></tr>
				</table>
				</td>
			</tr>
		</table>
	<?php
}

function doErrorList($title = 'Error', $errorlist) {
	?>
		<br><br>
		<table class="box">
			<tr>
				<td class="box-headline">&gt;&gt; <?php echo $title; ?></td>
			</tr>
			<tr>
				<td>
				<table class="box" style="border-style: none;">
					<tr><td width="*" class="box-sel" colspan="2">&nbsp;</td></tr>
					<?php
						foreach ($errorlist as $item) {
							echo '<tr>';
							$item['category'] = str_replace('__', '&nbsp;&nbsp;&nbsp;\\_', $item['category']);
							if ($GLOBALS['db']->debug_mode && !$item['debug']) echo '<td width="50" class="box-sel" valign="top"><span class="error">' . $item['category'] . '</span></td>';
							else echo '	<td width="50" class="box-sel" valign="top">' . $item['category'] . '</td>';

							echo '	<td width="*"  class="box-sel">' . $item['description'] . '</td>';
							echo '</tr>';
						}
					?>
					<tr><td width="*" class="box-sel" colspan="2">&nbsp;</td></tr>
				</table>
				</td>
			</tr>
		</table>
	<?php
}

function doMenu($menu_objects) {
	echo '<table class="menu_box" style="border-style: none;"><tr><td>&nbsp;</td>';
	$first = 0;
	foreach ($menu_objects as $title => $link) {
		$first++;
		if ($title == "<spacer>" 	||
			$title == "<spacer_1>"	||
			$title == "<spacer_2>") echo '<td class="menu-spacer">&nbsp;</td>';
		else {
			if ($first != 0) echo '<td class="menu-element-space">&nbsp;</td>';

			if ($title == "<confirm_delete>") {
				echo '<td class="leaflet" align="center"><a href="' . $link . '" onclick="return confirm_delete(this)">' . $GLOBALS['language']['general']['delete'] . '</a></td>';
			}
			else echo '<td class="leaflet" align="center"><a href="' . $link . '">' . $title . '</a></td>';
		}
	}
	echo '</tr></table>';
}