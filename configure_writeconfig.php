<?php
$config_generator_version = 4;

/* Configuration options added with version 0.9 that should be added in case
 * we are handed an old (pre v0.9) configuration-file.
 */
if (!isset($configuration['generator']) || $configuration['generator'] < 1) {
	if(!isset($config_ext['vhosts']['enabled']) || strlen($config_ext['vhosts']['enabled']) == 0) $config_ext['vhosts']['enabled'] = 0;
	if(!isset($config_ext['quota']['enabled']) || ($config_ext['quota']['enabled'] != 0 && $config_ext['quota']['enabled'] != 1)) $config_ext['quota']['enabled'] = 0;
	if(!isset($config_ext['quota']['type']) || strlen($config_ext['quota']['type']) == 0) $config_ext['quota']['type'] = 'user';

	if(!isset($config_ext['quota']['limittype']) || strlen($config_ext['quota']['limittype']) == 0) $config_ext['quota']['limittype'] = 'soft';
	if(!isset($config_ext['quota']['per_session']) || strlen($config_ext['quota']['per_session']) == 0) $config_ext['quota']['per_session'] = 0;
	if(!isset($config_ext['quota']['down_files']) || strlen($config_ext['quota']['down_files']) == 0) $config_ext['quota']['down_files'] = 10;
	if(!isset($config_ext['quota']['up_files']) || strlen($config_ext['quota']['up_files']) == 0) $config_ext['quota']['up_files'] = 10;
	if(!isset($config_ext['quota']['trans_files']) || strlen($config_ext['quota']['trans_files']) == 0) $config_ext['quota']['trans_files'] = 20;

	$configuration['generator'] = 1;
	$configuration['saved_count'] = 0;
} else $configuration['saved_count']++;

/* proFTPd Administrator v1.0
 */
if (!isset($configuration['generator']) || $configuration['generator'] < 2) {
	if(!isset($config_ext['pdns']['enabled']) || strlen($config_ext['pdns']['enabled']) == 0) $config_ext['pdns']['enabled'] = 0;
	if(!isset($config_ext['quota']['select_quota']) || strlen($config_ext['quota']['select_quota']) == 0) $config_ext['quota']['select_quota'] = 0;
	$configuration['generator'] = 2;
}

/* proFTPd Administrator v1.1
 */
if (!isset($configuration['generator']) || $configuration['generator'] < 3) {
	if(!isset($configuration['database']['sub_type']) || strlen($configuration['database']['sub_type']) == 0) {
		$configuration['database']['sub_type'] = 'standard';
		$config_database_subtype = 'standard';
	}
	$configuration['generator'] = 3;
}

/* proFTPd Administrator v1.2
 */
if (!isset($configuration['generator']) || $configuration['generator'] < 4) {
	if(!isset($configuration['proftpd']['delete_users']['deleteuser_command'])) {
		$configuration['proftpd']['delete_users']['deleteuser_command'] = "";
		$config_deleteuser_command = "";
	}
	$configuration['generator'] = 4;
}

$out = 	"<?xml version='1.0' standalone='yes'?>\n";
$out .=	"<configuration>\n";
$out .=	"	<generator>" . $configuration['generator'] . "</generator>\n";
$out .=	"	<saved_count>" . $configuration['saved_count'] . "</saved_count>\n";
$out .=	"	<database>\n";
$out .=	"		<type>" . @$config_database_type . "</type>\n";
$out .=	"		<sub_type>" . @$config_database_subtype . "</sub_type>\n";
$out .=	"		<hostname>" . @$config_database_host . "</hostname>\n";
$out .=	"		<username>" . @$config_database_user . "</username>\n";
$out .=	"		<password>" . @$config_database_passord . "</password>\n";
$out .=	"		<database>" . @$config_database_database . "</database>\n";
$out .=	"	</database>\n";

$out .=	"	<proftpd>\n";
$out .=	"		<generic>\n";
$out .=	"			<ftp_root>" . @$config_ftp_root . "</ftp_root>\n";
$out .=	"		</generic>\n";
$out .=	"		<create_users>\n";
$out .=	"			<default_homedirectory>" . @$config_ftp_default_home . "</default_homedirectory>\n";
$out .=	"			<createuser_command>" . @$config_createuser_command . "</createuser_command>\n";
$out .=	"			<default_shell>" . @$config_default_shell . "</default_shell>\n";
$out .=	"		</create_users>\n";
$out .=	"		<delete_users>\n";
$out .=	"			<deleteuser_command>" . @$config_deleteuser_command . "</deleteuser_command>\n";
$out .=	"		</delete_users>\n";
$out .=	"	</proftpd>\n";

$out .=	"	<user_interface>\n";
$out .=	"		<toplist_num_names>" . @$config_toplist_num_names . "</toplist_num_names>\n";
$out .=	"		<toplist_padlist>" . @$config_toplist_padlist . "</toplist_padlist>\n";
$out .=	"		<userview_logitems>" . @$config_userview_logitems . "</userview_logitems>\n";
$out .=	"		<userview_striplogpath>" . @$config_userview_striplogpath . "</userview_striplogpath>\n\n";
$out .=	"		<sysinfo_only>" . @$config_sysinfo_only . "</sysinfo_only>\n";
$out .=	"		<style>" . @$config_style_name . "</style>\n";
$out .=	"		<language>" . @$config_language . "</language>\n";
$out .=	"		<skip_mountpoints>\n";
foreach(@$config_skip_mpoints as $mountpoint) {
	$out .=	"			<mountpoint>" . $mountpoint . "</mountpoint>\n";
}
$out .=	"		</skip_mountpoints>\n";
$out .=	"		<sections>\n";
foreach(@$config_ftp_sections_down as $download) {
	$out .=	"			<download>" . $download . "</download>\n";
}
foreach(@$config_ftp_sections_up as $upload) {
	$out .=	"			<upload>" . $upload . "</upload>\n";
}
$out .=	"		</sections>\n";
$out .=	"	</user_interface>\n";
$out .=	"	<file_paths>\n";
$out .=	"		<generic>\n";
$out .=	"			<who>" . @$config_path_to_who . "</who>\n";
$out .=	"			<df>" . @$config_path_to_df . "</df>\n";
$out .=	"			<ps>" . @$config_path_to_ps . "</ps>\n";
$out .=	"			<sysctl>" . @$config_path_to_sysctl . "</sysctl>\n";
$out .=	"			<ftpwho>" . @$config_path_to_ftpwho . "</ftpwho>\n";
$out .=	"		</generic>\n";
$out .=	"		<os_specific>\n";
$out .=	"			<winnt>\n";
$out .=	"				<ftpadmin_utils>" . @$configuration['file_paths']['os_specific']['winnt']['ftpadmin_utils'] . "</ftpadmin_utils>\n";
$out .=	"			</winnt>\n";
$out .=	"			<linux>\n";
$out .=	"				<kernel_configuration>" . @$configuration['file_paths']['os_specific']['linux']['kernel_configuration'] . "</kernel_configuration>\n";
$out .=	"				<proftpd>" . @$configuration['file_paths']['os_specific']['linux']['proftpd'] . "</proftpd>\n";
$out .=	"			</linux>\n";
$out .=	"			<bsd>\n";
$out .=	"				<kernel_configuration>" . $configuration['file_paths']['os_specific']['bsd']['kernel_configuration'] . "</kernel_configuration>\n";
$out .=	"				<proftpd>" . @$configuration['file_paths']['os_specific']['bsd']['proftpd'] . "</proftpd>\n";
$out .=	"			</bsd>\n";
$out .=	"		</os_specific>\n";
$out .=	"	</file_paths>\n";
$out .=	"	<extensions>\n";
$out .=	"		<vhosts>\n";
$out .=	"			<enabled>" . $config_ext['vhosts']['enabled'] . "</enabled>\n";
$out .=	"		</vhosts>\n";
$out .=	"		<quota>\n";
$out .=	"			<enabled>" . @$config_ext['quota']['enabled'] . "</enabled>\n";
$out .=	"			<select_quota>" . @$config_ext['quota']['select_quota'] . "</select_quota>\n";
$out .=	"			<type>" . @$config_ext['quota']['type'] . "</type>\n";
$out .=	"			<limit_type>" . @$config_ext['quota']['limittype'] . "</limit_type>\n";
$out .=	"			<per_session>" . @$config_ext['quota']['per_session'] . "</per_session>\n";
$out .=	"			<download_byte_limit>" . mb2byte(@$config_ext['quota']['down_mb']) . "</download_byte_limit>\n";
$out .=	"			<upload_byte_limit>" . mb2byte(@$config_ext['quota']['up_mb']) . "</upload_byte_limit>\n";
$out .=	"			<transferred_byte_limit>" . mb2byte(@$config_ext['quota']['trans_mb']) . "</transferred_byte_limit>\n";
$out .=	"			<download_file_limit>" . @$config_ext['quota']['down_files'] . "</download_file_limit>\n";
$out .=	"			<upload_file_limit>" . @$config_ext['quota']['up_files'] . "</upload_file_limit>\n";
$out .=	"			<transferred_file_limit>" . @$config_ext['quota']['trans_files'] . "</transferred_file_limit>\n";
$out .=	"		</quota>\n";
$out .=	"		<pdns>\n";
$out .=	"			<enabled>" . @$config_ext['pdns']['enabled'] . "</enabled>\n";
$out .=	"		</pdns>\n";
$out .=	"		<germanwings>\n";
$out .=	"			<internal>" . $config_group_internal . "</internal>\n";
$out .=	"			<external>" . $config_group_external . "</external>\n";
$out .=	"		</germanwings>\n";
$out .=	"	</extensions>\n";
$out .=	"</configuration>";

@file_put_contents('configuration.xml', $out);
?>