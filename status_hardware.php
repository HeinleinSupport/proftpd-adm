<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['status']['hw_hardware']; ?></td>
	</tr>
	<tr>
		<td>
		<table class="box" style="border-style: none;">
		<?php
		$cpu_info = $system -> get_hardware_cpu();
		if (sizeof($cpu_info) != 0) {
				echo '<tr><td colspan="3" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>';
				echo '<tr><td colspan="3" class="box-subheadline">' . $GLOBALS['language']['status']['hw_processor'];
				if (sizeof($cpu_info) != 1) echo 's';
				echo '</td></tr>';

				foreach($cpu_info as $cpu => $cpu_info) {
					echo '<tr><td colspan="3" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>';
					echo '<tr><td colspan="3" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>';
					echo '<tr><td colspan="3" class="box-pl" style="line-height: 10px;">' . $GLOBALS['language']['status']['hw_processor'] . ' ' . $cpu;
					if (isset($cpu_info['model name'])) echo ': ' . $cpu_info['model name'];
					echo '</td></tr>';

					print_info($cpu_info);
				}

		}
		$pci_info = $system -> get_hardware_pci();
		if (sizeof($pci_info) != 0) {
			echo '<tr><td colspan="3" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>';
			echo '<tr><td colspan="3" class="box-subheadline">' . $GLOBALS['language']['status']['hw_pci'] . '</td></tr>';
			echo '<tr>';
			echo '	<td width="140"  class="box-pl" align="center">' . $GLOBALS['language']['status']['hw_pciadress'] . '</td>';
			echo '	<td width="*" colspan="2" class="box-pl" align="center">' . $GLOBALS['language']['status']['hw_pcivalue'] . '</td>';
			echo '</tr>';
			print_info($pci_info);
		}

		$ide_info = $system -> get_hardware_ide();
		if (sizeof($ide_info) != 0) {
			echo '<tr><td colspan="3" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>';
			echo '<tr><td colspan="3" class="box-subheadline">' . $GLOBALS['language']['status']['hw_ide'] . '</td></tr>';
			echo '<tr>';
			echo '	<td width="140"  class="box-pl" align="center">' . $GLOBALS['language']['status']['hw_idedevice'] . '</td>';
			echo '	<td width="*" class="box-pl" align="center">' . $GLOBALS['language']['status']['hw_idefield'] . '</td>';
			echo '	<td width="300" class="box-pl" align="center">' . $GLOBALS['language']['status']['hw_idevalues'] . '</td>';
			echo '</tr>';
			foreach($ide_info as $ide => $ide_info) {
				$device = $ide;
				$field  = '';
				$value	= '';
				foreach ($ide_info as $device_field => $device_value) {
					$field .= $device_field . '<br>';
					$value .= $device_value . '<br>';
				}
				echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
				echo '<td width="140"  class="box-sel" align="left" valign="top">' . $device . '</td>';
				echo '<td width="*"  class="box-sel" align="left">' . $field . '</td>';
				echo '<td width="300"  class="box-sel" align="left">' . $value . '</td>';
				echo '</tr>';
			}
		}
		?>
		</table>
		</td>
	</tr>
</table>
<?php

?>