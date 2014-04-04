<?php
require_once('include_general.php');
require_once('include_util.php');

doHeader();
?>
<table class="box">
	<tr>
		<td class="box-headline">&gt;&gt; <?php echo $GLOBALS['language']['manual']['manual']; ?></td>
	</tr>
	<tr>
		<td>
			<table class="box" style="border-style: none;">
				<tr>
					<td   class="box-sel" align="justify">
						<?php echo $GLOBALS['language']['manual']['introduction']; ?>

						<blockquote>
							&gt;&gt; <a href="?document=howto">Installation and troubleshooting</a><br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="?document=howto&amp;section=mysql">Installing MySQL</a><br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="?document=howto&amp;section=proftpd">Installing proFTPd</a><br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="?document=howto&amp;section=admin">Installing proFTPd Administrator</a><br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="?document=howto&amp;section=trouble">Troubleshooting</a><br>

							<br>
							&gt;&gt; Configuration examples for use with MySQL<br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="?document=proftpd_conf">Sample "proftpd.conf"-file</a><br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="?document=proftpd_conf_quota">Sample "proftpd.conf"-file with Quota</a><br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="?document=db_sql">Database structure</a><br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="?document=db_sql_upgrade">Database structure, upgrade to v0.9</a><br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="?document=db_sql_vhost">Database structure, needed for VHOST extension</a><br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="?document=db_sql_powerdns">Database structure, needed for PowerDNS extension</a><br>

							<br>
							&gt;&gt; Miscellaneous<br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="?document=gpl">GPL-License</a><br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="?document=todo">Pending features and changes</a><br>
							&nbsp;&nbsp;&nbsp;&gt;&gt; <a href="http://proftpd-adm.sourceforge.net/">Project homepage</a><br>
						</blockquote>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?php
if (isset($_GET['document']) && $_GET['document'] == 'howto') {
	$title  = 'Installing proFTPd Admin';
	$marker = '<!-- Installation instructions -->';

	if (isset($_GET['section'])) {
		switch ($_GET['section']) {
			case 'mysql':
				$title  = 'Installing MySQL';
				$marker = '<!-- MySQL -->';
				break;
			case 'proftpd':
				$title  = 'Installing proFTPd';
				$marker = '<!-- ProFTPd -->';
				break;
			case 'admin':
				$title  = 'Installing proFTPd Administrator';
				$marker = '<!-- Admin tool -->';
				break;
			case 'trouble':
				$title  = 'Troubleshooting';
				$marker = '<!-- Troubleshooting -->';
				break;
		}
	}

	$text = '';
	$file = @file('misc/howto_install/install.html');

	$markset = 0;
	foreach($file as $line) {
		if (trim($line) == $marker) {
			if($markset == 0) {
				$markset = 1;
				continue;
			}
			else break;
		}

		if ($markset == 1) $text .= $line;
	}

	output_document($title, $text);
}

if (isset($_GET['document']) && $_GET['document'] == 'db_sql_upgrade') {
	include_configuration('Database structure, upgrade to v0.9', 'misc/database_structure_mysql/upgrade_to_v0.9.sql');
}
if (isset($_GET['document']) && $_GET['document'] == 'db_sql_vhost') {
	include_configuration('Database structure, needed for VHOST extension', 'misc/database_structure_mysql/vhosts.sql');
}
if (isset($_GET['document']) && $_GET['document'] == 'db_sql_powerdns') {
	include_configuration('Database structure, needed for PowerDNS extension', 'misc/database_structure_mysql/powerdns.sql');
}
if (isset($_GET['document']) && $_GET['document'] == 'todo') {
	include_plain_text('Pending features and changes', 'TODO');
}
if (isset($_GET['document']) && $_GET['document'] == 'db_sql') {
	include_configuration('Database structure', 'misc/database_structure_mysql/db_structure.sql');
}
if (isset($_GET['document']) && $_GET['document'] == 'proftpd_conf') {
	include_configuration('Sample "proftpd.conf"-file', 'misc/sample_config/proftpd.conf');
}
if (isset($_GET['document']) && $_GET['document'] == 'proftpd_conf_quota') {
	include_configuration('Sample "proftpd.conf"-file with Quota', 'misc/sample_config/proftpd_quota.conf');
}
if (isset($_GET['document']) && $_GET['document'] == 'gpl') {
	include_plain_text('GPL-License', 'COPYING');
}
doFooter();


function include_plain_text($title, $filename) {
	$text = '';
	$lines = @file($filename);

	foreach($lines as $line) {
		$line = wordwrap($line, 120);
		$text .= htmlentities($line);
	}
	output_document($title, '<pre>' . $text . '</pre>');
}


function include_configuration($title, $filename) {
	$text = '';
	$lines = @file($filename);

	foreach($lines as $line) {
		$line = wordwrap($line, 120);
		$line = tab2space($line);
		$text .= htmlentities($line);
	}
	output_document($title, '<pre>' . $text . '</pre>');
}


function output_document($title, $text) {
	?>
	<br><br>
	<table class="box">
		<tr>
			<td class="box-headline">&gt;&gt; <?php echo $title; ?></td>
		</tr>
		<tr>
			<td>
			<table class="box" style="border-style: none;">
				<tr>
					<td class="box-sel" align="justify">
						<?php echo $text; ?>
					</td>
				</tr>
				<tr><td class="box-sel" align="justify">&nbsp;</td></tr>
			</table>
			</td>
		</tr>
	</table>
	<?php
}
?>
