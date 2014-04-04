<?php
$sanity_checks_out = true;
$error_messages = '';


?>
<SCRIPT type="text/javascript">
// <!--
function reCalc() {
	document.confirm_write.frm_date.value = document.confirm_write.frm_date_selector.value;

	return true;
}
// -->
</SCRIPT>

<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['transfers']['write_to_file']; ?></td>
	</tr>
	<tr>
		<td>
		<form name="confirm_write" method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?section=write_logs'; ?>">
			<table class="box" style="border-style: none;">
				<?php
				if (!file_exists('logs/users/'))  log_error('<li>The directory needed to store user logs, "logs/users", does not exist!</li>');
				if (!file_exists('logs/groups/')) log_error('<li>The directory needed to store group logs, "logs/groups", does not exist!</li>');
				if (!is_writable('logs/users/'))  log_error('<li>The directory needed to store user logs, "logs/users", is not writable!</li>');
				if (!is_writable('logs/groups/')) log_error('<li>The directory needed to store group logs, "logs/groups", is not writable!</li>');

				if (!$sanity_checks_out) {
					?>
					<tr>
						<td width="150" class="box-sel-head" align="right" valign="top"><img src="style/<?php echo $GLOBALS['config_style_name']; ?>/alert.red.gif" style="border: none;" align="right"></td>
						<td width="*" class="box-sel" align="justify" valign="top">Some errors were detected:<ul><?php echo $error_messages; ?></ul></td>
					</tr>
					<?php
				} else {
					if (isset($_POST['frm_date']) && strlen($_POST['frm_date']) != 0) {
						$memberships = $db->get_user_memberships();
						$user_files	= array();
						$group_files= array();
						$errors = array();

						$lines = $db->get_transfer_logs($_POST['frm_date']);
						foreach ($lines as $line) {
							if (!isset($user_files[$line['userid']])) {
								$handle = fopen('logs/users/' . $line['userid'] . '.log', "a");
								if (!$handle) array_push($errors, 'Unable to open logs/users/' . $line['userid'] . '.log');
								else $user_files[$line['userid']] = $handle;
							}

							fwrite($user_files[$line['userid']], get_user_string($line));

							if (isset($memberships[$line['userid']])) {
								foreach($memberships[$line['userid']] as $group) {
									$string = get_group_string($line);

									if (!isset($group_files[$group])) {
										$handle = fopen('logs/groups/' . $group . '.log', "a");
										if (!$handle) array_push($errors, 'Unable to open logs/groups/' . $group . '.log');
										else $group_files[$group] = $handle;
									}

									fwrite($group_files[$group], $string);
								}
							}
						}

						foreach ($user_files as $file) fclose($file);
						foreach ($group_files as $file) fclose($file);
						?>
						<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
						<tr>
							<td class="box-sel" align="center" colspan="2">
								<span class="error">
									<?php echo count($lines) . ' ' . $GLOBALS['language']['transfers']['num_deleted']; ?>
								</span>
							</td>
						</tr>
						<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
						<?php
					}
					?>
					<tr>
						<td class="box-sel" colspan="2">
							<?php echo $GLOBALS['language']['transfers']['write_desc']; ?>
						</td>
					</tr>
					<tr><td colspan="2" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
					<tr>
						<td width="150" class="box-sel-head"><?php echo $GLOBALS['language']['transfers']['wrt_older_than']; ?></td>
						<td width="*" class="box-sel" align="right">
							<select name="frm_date_selector" style="width: 538px;" onChange="reCalc();">
							  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("now"))) ?>"><?php echo $GLOBALS['language']['general']['time_now']; ?>
							  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-1 day"))) ?>"><?php echo $GLOBALS['language']['general']['time_24h']; ?>
							  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-1 week"))) ?>"><?php echo $GLOBALS['language']['general']['time_1week']; ?>
							  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-2 weeks"))) ?>"><?php echo $GLOBALS['language']['general']['time_2week']; ?>
							  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-1 month"))) ?>"><?php echo $GLOBALS['language']['general']['time_1month']; ?>
							  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-3 months"))) ?>"><?php echo $GLOBALS['language']['general']['time_3month']; ?>
							  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-6 months"))) ?>"><?php echo $GLOBALS['language']['general']['time_6month']; ?>
							  <option value="<?php print(strftime("%Y-%m-%d %H:%M:%S",strtotime("-1 year"))) ?>"><?php echo $GLOBALS['language']['general']['time_1year']; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td width="150" class="box-sel-head"><?php echo $GLOBALS['language']['userv']['customdate']; ?>:</td>
						<td width="*" class="box-sel" align="right"><input type="text" style="width: 536px;" size="105" name="frm_date" value="<?php echo strftime("%Y-%m-%d %H:%M:%S",strtotime("now")); ?>"></td>
					</tr>
					<?php
				}
				?>
			</table>
		</form>
		</td>
	</tr>
</table>
<?php
$clean_menu[$GLOBALS['language']['transfers']['write_logs_bt']] = "javascript:submit_if_confirm('" . $GLOBALS['language']['general']['delete_confirm'] . "', document.confirm_write);";
doMenu($clean_menu);

function log_error($message) {
	global $error_messages, $sanity_checks_out;
	$error_messages .= $message;
	$sanity_checks_out = false;
}

function get_user_string($data) {
	return $data['time'] . ' - ' . $data['command'] . ' - ' . $data['file'] . ' - ' . $data['size'] . "\r\n";
}

function get_group_string($data) {
	return $data['time'] . ' - ' . $data['userid'] . ' - ' . $data['command'] . ' - ' . $data['file'] . ' - ' . $data['size'] . "\r\n";
}
?>