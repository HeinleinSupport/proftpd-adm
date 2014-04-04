<?php
$status = $db->get_db_status();
foreach ($status as $stats) {
	?>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $stats['name']; ?></td>
		</tr>
		<tr>
			<td>
			<table class="box" style="border-style: none;">
			<?php
			echo '<tr>';
			foreach($stats['category'] as $category) {
				echo '<td class="box-pl" align="center">' . $category . '</td>';
			}
			echo '</tr>';

			foreach($stats['values'] as $val) {
				echo '<tr onmouseover="if (typeof(this.style) != \'undefined\') this.className = \'overRow\';" onmouseout="if (typeof(this.style) != \'undefined\') this.className = \'\'">';
				for($i = 0; $i < count($stats['category']); $i++) {
					echo '<td class="box-sel">' . $val[$i]. '</td>';
				}
				echo '</tr>';
			}
			?>
			</table>
			</td>
		</tr>
	</table>
	<br><br>
	<?php
}
?>