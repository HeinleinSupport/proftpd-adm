<?php
require_once('include_util.php');


/* This file represents the old way of configuring proFTPd Administrator, and
 * will at some time (most likely at the time PHP5 reaches production servers)
 * be the only way of configuring this tool - this is only necessary if you're
 * still using PHP4. If you have the ability to I highly recommend that you
 * upgrade to PHP5 - the nice configuration gui implemented in this tool is
 * really a step up from editing files manually.
 */

/* Misc...
 */
$config_sysinfo_only			= false;

/* MySQL user and database settings. This need to be configured for anything at
 * all to function the way it was intended. Without a functioning configuration
 * you won't be able to access much of anything.
 */
$config_database_type 			= 'MySQL';
$config_database_subtype		= 'standard'; // "standard" or "old_password"
$config_database_host 			= 'localhost';
$config_database_user 			= 'root';
$config_database_passord 		= '';
$config_database_database 		= 'proftpd_admin';
$config_language 				= 'english'; // "english" or "norwegian"

/* "Hard drive" drive listing on status page. This determines which mountpoints
 * should not be included in this listing. Usefull for eliminating double
 * listings due to a filesystem bind, or if you simply don't want it to be
 * shown.
 *
 * Filesystem bind: This was functionality added in kernel 2.4.x to enable the
 * user to mount part of a filesystem twice or more in the same filesystem.
 * This is done like this:
 *		mount --bind /existing_dir_to_be_mounted/ /existing_mount_point/
 */
$config_skip_mpoints            =  array('/dev'
								        );

/* This is the default directory suggested as the homedirectory for users
 * created using the adduser-form. If the value given here ends in '%HOME%', a
 * short piece of Javascript will be used to autocomplete the used value (ie.
 * if you joe in the username-field, the %HOME%-part will be replaced with the
 * word 'joe' in the home-directory field).
 */
$config_ftp_default_home        = "/ftp";

/* This is the path to a script that is run every time a new user is created -
 * you can use a script to for instance create homedirectories and set the
 * correct permissions on that folder (leave blank if you do not wish to use
 * this feature). You probably need root-permission to do this, and this can be
 * done using sudo - a example script has been included in
 * misc/user_script/create_user.sh. This value could look like the following
 * (you need to include full path, as well as set-up sudo before this'll work):
 *
 *	     sudo /www/ftp_admin/misc/user_script/create_user.sh
 */
$config_createuser_command      = "";
$config_deleteuser_command      = "";

/* Root of the ftp file hierarchy. Should not have a trailing '/'. This is also
 * used with the values in "config_ftp_sections_down" and
 * "config_ftp_sections_up" below to form a complete path (ie: the array
 * members below are relative to config_ftp_root).
 */
$config_ftp_root                = "/ftp";
$config_ftp_sections_down       = array("/pub",
										"/distrib",
										"/incoming",
										"/tmp"
								        );
$config_ftp_sections_up         = array("/incoming"
								        );
$config_toplist_num_names       = 5;
$config_toplist_padlist         = true;
$config_userview_logitems       = 50;
$config_userview_striplogpath   = true;
$config_default_shell           = '/bin/false';

/* This one simply selects the style you want to use for this tool. Please
 * uncomment one of the following names to select the style you want. "Easy
 * Gray" is the default look.
 */
//$config_style_name 			= 'yellow';
//$config_style_name 			= 'easy_gray';
//$config_style_name 			= 'DOS_legacy';
$config_style_name 				= 'blueish_hue';

/* Paths to some utilities on your system. If they are not in the path you must
 * specify their paths here.
 */
// General
$config_path_to_who				= 'who';
$config_path_to_df				= 'df';
$config_path_to_ps				= 'ps';
$config_path_to_sysctl			= '/sbin/sysctl';
$config_path_to_kernel_config	= '/boot/config';			// Linux default
//$config_path_to_kernel_config	= '/usr/src/sys/i386/conf/GENERIC';
                                                            // FreeBSD default

// ProFTPd
$config_path_to_ftpwho			= '/usr/local/bin/ftpwho';
$config_path_to_proftpd			= '/usr/local/sbin/proftpd'; // From source
//$config_path_to_proftpd		= '/usr/local/libexec/proftpd';// FreeBSD ports


/* This is specific for Windows NT systems. There is only one option to set
 * here, and the path has to be set exactly - the full path. You also need to
 * use forward-slashes ('/'). Path can NOT have any spaces in it. If you
 * downloaded the Zip-file, you'll find binary copy of these utils in the
 * misc-directory (Just make sure you move them to a folder that complies with
 * the description above, and set the path below to point to them).
 *
 * An example:
 *		C:/ftpadmin_utils/
 */
$path_to_ftpadmin_utils			= 'C:/ftpadmin_utils/';


/* The configuration options that follows are relevant to users that wish to
 * use proFTPd with mod_quotatab, and want the ability to configure quotas
 * within proFTPd Administrator. Keep in mind that if you're upgrading to
 * version 0.9 you need to import the database alterations as well (found in
 * the misc-dir) - options for quota also needs to be added to "proftpd.conf".
 * Last, but not least - support for mod_quotatab need to be compiled into
 * proFTPd.
 *
 * You have the ability to limit the amount of downloaded/uploaded/transferred
 * files as well as downloaded/uploaded/transferred bytes. A value of 0 is
 * interpreted as disabled - ie there is no set limitation.
 *
 * Except from the first option all of these options are only the default
 * values and can be altered on a per-user basis after a quota has been added
 * to a user.
 */
$config_ext['quota']['enabled']			= 0;			// '1'=on, '0'=off
$config_ext['quota']['type']			= 'user';
$config_ext['quota']['limittype']		= 'soft';		// 'soft' or 'hard'
$config_ext['quota']['per_session']		= 0;
$config_ext['quota']['down_files']		= 10;
$config_ext['quota']['up_files']		= 10;
$config_ext['quota']['trans_files']		= 20;
$config_ext['quota']['down_mb']			= byte2mb(1048576000);  // 1000.00 MB
$config_ext['quota']['up_mb']			= byte2mb(1048576000);  // 1000.00 MB
$config_ext['quota']['trans_mb']		= byte2mb(2097152000);  // 2000.00 MB


/* For use alongwith Virtual Hosts for Apache2. At the moment this function is
 * undocumented and virtually untested - leave it off for now.
 */
$config_ext['vhosts']['enabled']		= 0;			// '1'=on, '0'=off

/* Adds support for administrating PowerDNS from within this user interface.
 * Untested, undocumented and requires that you add additional tables to your
 * database - to do so you must import "powerdns.sql".
 */
$config_ext['pdns']['enabled']			= 0;			// '1'=on, '0'=off
?>