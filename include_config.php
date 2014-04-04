<?php
$config_enforce_oldstyle_config 			= false;
$config_proftp_admin_version 				= file_get_contents('VERSION');
//$config_quota_quotatypes					= array( "user", "group", "class", "all" );
$config_quota_quotatypes					= array( "user" );
$config_quota_select_filecount				= array(10, 50, 100, 500, 1000, 5000, 10000, 50000, 100000, 500000, 10000000);
$config_quota_select_datasize				= array(array('v' => 10, 		'd' => '10 MB'),
													array('v' => 30, 		'd' => '30 MB'),
													array('v' => 50, 		'd' => '50 MB'),
													array('v' => 100, 		'd' => '100 MB'),
													array('v' => 512, 		'd' => '512 MB'),
													array('v' => 1024, 		'd' => '1 GB'),
													array('v' => 10240, 	'd' => '10 GB'),
													array('v' => 30720, 	'd' => '30 GB'),
													array('v' => 51200, 	'd' => '50 GB'));
$config_valid_shells 						= file('/etc/shells');
$config_valid_pdns_record_types				= array( "A", "PTR", "TXT", "CNAME", "SOA", "NS", "MX" );
$config_valid_pdns_domain_types				= array( "NATIVE", "MASTER", "SLAVE" );

if (isOldPHP()) {
	require_once('include_config_oldstyle.php');
} else {
	require_once('include_config_utils.php');
	require_once('include_util.php');

	$configuration = load_configuration();

	$config_sysinfo_only					= @$configuration['user_interface']['sysinfo_only'];
	$config_database_type 					= @$configuration['database']['type'];
	$config_database_subtype 				= @$configuration['database']['sub_type'];
	$config_database_host 					= @$configuration['database']['hostname'];
	$config_database_user 					= @$configuration['database']['username'];
	$config_database_passord 				= @$configuration['database']['password'];
	$config_database_database 				= @$configuration['database']['database'];
	$config_language						= @$configuration['user_interface']['language'];
	$config_skip_mpoints					= @(array)$configuration['user_interface']['skip_mountpoints']['mountpoint'];
	$config_ftp_default_home 				= @$configuration['proftpd']['create_users']['default_homedirectory'];
	$config_createuser_command 				= @$configuration['proftpd']['create_users']['createuser_command'];
	$config_deleteuser_command 				= @$configuration['proftpd']['delete_users']['deleteuser_command'];
	$config_ftp_root 						= @$configuration['proftpd']['generic']['ftp_root'];
	$config_ftp_sections_down				= @(array)$configuration['user_interface']['sections']['download'];
	$config_ftp_sections_up 				= @(array)$configuration['user_interface']['sections']['upload'];
	$config_toplist_num_names 				= @$configuration['user_interface']['toplist_num_names'];
	$config_toplist_padlist 				= (bool)@$configuration['user_interface']['toplist_padlist'];
	$config_userview_logitems 				= @$configuration['user_interface']['userview_logitems'];
	$config_userview_striplogpath 			= (bool)@$configuration['user_interface']['userview_striplogpath'];

	$config_default_shell 					= @$configuration['proftpd']['create_users']['default_shell'];
	$config_style_name						= @$configuration['user_interface']['style'];
	$config_path_to_who						= @$configuration['file_paths']['generic']['who'];
	$config_path_to_ps						= @$configuration['file_paths']['generic']['ps'];
	$config_path_to_df						= @$configuration['file_paths']['generic']['df'];
	$config_path_to_sysctl					= @$configuration['file_paths']['generic']['sysctl'];
	$config_path_to_kernel_config			= @$configuration['file_paths']['generic']['kernel_configuration'];
	$config_path_to_ftpwho					= @$configuration['file_paths']['generic']['ftpwho'];
	$config_path_to_proftpd					= @$configuration['file_paths']['generic']['proftpd'];
	$path_to_ftpadmin_utils					= @$configuration['file_paths']['generic']['ftpadmin_utils'];

	$config_ext['pdns']['enabled']			= @$configuration['extensions']['pdns']['enabled'];
	$config_ext['vhosts']['enabled']		= @$configuration['extensions']['vhosts']['enabled'];
	$config_ext['quota']['enabled']			= @$configuration['extensions']['quota']['enabled'];
	$config_ext['quota']['select_quota']	= @$configuration['extensions']['quota']['select_quota'];
	$config_ext['quota']['type']			= @$configuration['extensions']['quota']['type'];
	$config_ext['quota']['limittype']		= @$configuration['extensions']['quota']['limit_type'];
	$config_ext['quota']['per_session']		= @$configuration['extensions']['quota']['per_session'];
	$config_ext['quota']['down_files']		= @$configuration['extensions']['quota']['download_file_limit'];
	$config_ext['quota']['up_files']		= @$configuration['extensions']['quota']['upload_file_limit'];
	$config_ext['quota']['trans_files']		= @$configuration['extensions']['quota']['transferred_file_limit'];
	$config_ext['quota']['down_mb']			= byte2mb(@$configuration['extensions']['quota']['download_byte_limit']);
	$config_ext['quota']['up_mb']			= byte2mb(@$configuration['extensions']['quota']['upload_byte_limit']);
	$config_ext['quota']['trans_mb']		= byte2mb(@$configuration['extensions']['quota']['transferred_byte_limit']);
}

function isOldPHP() {
	global $config_enforce_oldstyle_config;
	if ($config_enforce_oldstyle_config == true) return true;

	$version = explode('.', phpversion());
	if ($version[0] < 5) return true;
	else return false;
}
?>
