<?php
require_once('class_process.php');
?>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['status']['ps_processlist']; ?></td>
	</tr>
	<tr>
		<td>
		<table class="box" style="border-style: none;">
		<tr>
			<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['ps_name']; ?></td>
			<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['ps_pid']; ?></td>
			<td width="*" class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['ps_uid']; ?></td>
		</tr>
		<?php
			$existing_pids = array();

			$processes = array();
			$root =& new Process();
			$list = $system->get_processlist();
			$GLOBALS['insert_failed'] = array();

			foreach($list as $item) {
				array_push($existing_pids, $item['PID']);

				$process =& new Process();
				$process->uid 	= $item['UID'];
				$process->pid 	= $item['PID'];
				$process->ppid	= $item['PPID'];
				$process->cmd	= $item['NAME'];

				$GLOBALS['insert_success'] = false;
				$root->insert($process, 0);
				if (!$GLOBALS['insert_success']) array_push($GLOBALS['insert_failed'], $process);
			}

			$existing_pids = array_flip($existing_pids);

			while (count($GLOBALS['insert_failed'])) {
				$GLOBALS['insert_success'] = false;
				$item = array_shift($GLOBALS['insert_failed']);

				if (!array_key_exists($item->ppid, $existing_pids)) {
					$item->ppid = 0;
					$item->cmd .= ' <acronym title="' . $GLOBALS['language']['status']['ps_defunctprocess'] . '">&lt;?&gt; </acronym>';
				}

				$root->insert($item, 0);
				if (!$GLOBALS['insert_success']) array_push($GLOBALS['insert_failed'], $item);
			}
			$root->print_children();

			foreach($processes as $process) {
				echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
				echo '<td width="*" class="box-sel" align="left">';

				for ($i = 0; $i < $process['level']; $i++) {
					$process['NAME'] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $process['NAME'];
				}
				echo substr($process['NAME'], 0, (25 * $process['level']) + 130) . '</td>';

				echo '<td class="box-sel" align="right">' . $process['PID'] . '</td>';
				echo '<td class="box-sel" align="right">' . $process['UID'] . '</td>';
				echo '</tr>';
			}
		?>
		</table>
		</td>
	</tr>
</table>