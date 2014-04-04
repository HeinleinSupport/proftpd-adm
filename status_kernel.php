<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['status']['krnl_kernel']; ?></td>
	</tr>
	<tr>
		<td>
			<table class="box" style="border-style: none;">
				<?php
					$kernel_config = $system->get_kernel_configuration();
					if (sizeof($kernel_config) != 0) {
						?>
						<tr><td colspan="3" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
						<tr><td colspan="3" class="box-subheadline"><?php echo $GLOBALS['language']['status']['krnl_kernelconf']; ?></td></tr>
						<?php
						foreach($kernel_config as $key => $value) {
							echo '<tr><td colspan="3" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>';
							echo '<tr><td colspan="3" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>';
							echo '<tr><td colspan="3" class="box-pl" style="line-height: 10px;">' . $key . '</td></tr>';
							print_info($value);
						}
						echo '<tr><td colspan="3" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>';
					}
				?>
				<?php
					$sysctl = $system->get_sysctl();
					if (sizeof($sysctl) != 0) {
						?>
						<tr><td colspan="3" class="box-subheadspace" style="line-height: 10px;">&nbsp;</td></tr>
						<tr><td colspan="3" class="box-subheadline"><?php echo $GLOBALS['language']['status']['krnl_kernelparams']; ?></td></tr>
						<tr>
							<td width="140"  class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['name']; ?></td>
							<td width="*" colspan="2" class="box-pl" align="center"><?php echo $GLOBALS['language']['status']['value']; ?></td>
						</tr>
						<?php
						print_info($sysctl);
					}
				?>
			</table>
		</td>
	</tr>
</table>