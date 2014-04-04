<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['status']['res_resources']; ?></td>
	</tr>
	<tr>
		<td>
		<table class="box" style="border-style: none;">
		<?php
			$hd_info = $system -> get_resource_hd();
			if (sizeof($hd_info) != 0) {
				?>
				<tr><td colspan="6" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
				<tr><td colspan="6" class="box-subheadline"><?php echo $GLOBALS['language']['status']['res_storage']; ?></td></tr>
				<tr>
					<td width="*"   class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['res_mountpoint']; ?></td>
					<td width="310" class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['res_perc_capacity']; ?></td>
					<td width="25"  class="box-pl" align="center">%</td>
					<td width="80"  class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['res_free']; ?></td>
					<td width="80"  class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['res_used']; ?></td>
					<td width="80"  class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['res_size']; ?></td>
				</tr>
				<?php
				show_resource($hd_info, 0);
			} else {
				?>
					<tr><td colspan="6" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
				<?php
			}

			$mem_info = $system -> get_resource_memory();
			if (sizeof($mem_info) != 0) {
				if (sizeof($hd_info) != 0) {
					?>
					<tr><td colspan="6" class="box-subheadspace">&nbsp;</td></tr>
					<?php
				}
				?>
				<tr><td colspan="6" class="box-subheadline"><?php echo $GLOBALS['language']['status']['res_memory']; ?></td></tr>
				<tr>
					<td width="*"   class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['res_memcategory']; ?></td>
					<td width="310" class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['res_perc_capacity']; ?></td>
					<td width="25"  class="box-pl" align="center">%</td>
					<td width="80"  class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['res_free']; ?></td>
					<td width="80"  class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['res_used']; ?></td>
					<td width="80"  class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['res_size']; ?></td>
				</tr>
				<?php
				show_resource($mem_info, 0);
			}

			$net_info = $system -> get_resource_network();
			if (sizeof($net_info) != 0) {
				?>
				<tr><td colspan="6" class="box-subheadspace">&nbsp;</td></tr>
				<tr><td colspan="6" class="box-subheadline"><?php echo $GLOBALS['language']['status']['res_network']; ?></td></tr>
				<tr>
					<td width="*"   class="box-pl" align="center" colspan=2><?php echo $GLOBALS['language']['status']['res_devname']; ?></td>
					<td width="105" class="box-pl" align="center" colspan=2><?php echo $GLOBALS['language']['status']['res_netrecv']; ?></td>
					<td width="80"  class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['res_netsend']; ?></td>
					<td width="80"  class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['res_neterror']; ?></td>
				</tr>
				<?php

				foreach ($net_info as $device) {
					echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
					echo '<td width="*"   class="box-sel" align="left" colspan=2>'. $device['device_name'] . '</td>';
					echo '<td width="105" class="box-sel" align="right" colspan=2>' . number_format($device['megabyte_recieved'], 2, ".", " ") . ' MB</td>';
					echo '<td width="80"  class="box-sel" align="right">' . number_format($device['megabyte_sent'], 2, ".", " ") . ' MB</td>';
					echo '<td width="80"  class="box-sel" align="right">' . $device['error'] . '/' . $device['drop'] . '</td>';
					echo '</tr>';
				}
			}
		?>
		</table>
		</td>
	</tr>
</table>
<?php
function show_resource($res_data, $decimals = 0) {
	$hd_free = 0;
	$hd_used = 0;
	$hd_size = 0;

	foreach($res_data as $mpoint) {
		resource_row($mpoint, $decimals);

		$hd_free += $mpoint["megabyte_free"];
		$hd_used += $mpoint["megabyte_used"];
		$hd_size += $mpoint["megabyte_total"];
	}

	$mpoint["mountpoint"] 		= $GLOBALS['language']['status']['res_totalt'];
	$mpoint["megabyte_free"] 	= $hd_free;
	$mpoint["megabyte_used"] 	= $hd_used;
	$mpoint["megabyte_total"] 	= $hd_size;
	$mpoint["percent_used"] 	= (int)($hd_used * 100 / $hd_size);

	echo '<tr><td colspan="6" class="box-pl" style="font-size: 2px;">&nbsp;</td></tr>';
	echo '<tr><td colspan="6" class="box-sel" style="font-size: 2px;">&nbsp;</td></tr>';
	resource_row($mpoint, $decimals);
}

function resource_row($mpoint, $decimals = 0) {
	global $config_style_name;

	$color = getColor($mpoint["percent_used"]);
	$percent = ($mpoint["percent_used"] * 300 / 100);

	echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
	echo '<td width="*"   class="box-sel">' . $mpoint["mountpoint"] . '</td>';
	echo '<td width="310" class="box-sel" align="center"><img src="style/' . $config_style_name . '/' . $color . '.gif" width="' . $percent . '" height="8" class="bar-left"><img src="style/' . $config_style_name . '/black.gif" width="' . (300 - $percent) . '" height="8" class="bar-right"></td>';
	echo '<td width="30"  class="box-sel" align="right">' . $mpoint["percent_used"] . ' %</td>';
	echo '<td width="80"  class="box-sel" align="right">' . number_format($mpoint["megabyte_free"], 	$decimals, " ", " ") . ' MB</td>';
	echo '<td width="80"  class="box-sel" align="right">' . number_format($mpoint["megabyte_used"], 	$decimals, " ", " ") . ' MB</td>';
	echo '<td width="80"  class="box-sel" align="right">' . number_format($mpoint["megabyte_total"], 	$decimals, " ", " ") . ' MB</td>';
	echo '</tr>';
}
?>