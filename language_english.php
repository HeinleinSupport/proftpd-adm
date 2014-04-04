<?php
$language['name']['administrator'] 		= 'proFTPd Administrator';
$language['name']['sys_info_only'] 		= 'System Information';

/* General */
$language['general']['username'] 		= 'Username';
$language['general']['groups'] 			= 'Groups';
$language['general']['users'] 			= 'Users';
$language['general']['primarygroup'] 	= 'Primary group';
$language['general']['homedirectory'] 	= 'Home directory';
$language['general']['enabled'] 		= 'Enabled';
$language['general']['disabled'] 		= 'Disabled';
$language['general']['expiration'] 		= 'Expiration';
$language['general']['expiration_never']= 'Never';
$language['general']['password'] 		= 'Password';
$language['general']['shell'] 			= 'Shell';
$language['general']['description'] 	= 'Description';
$language['general']['delete'] 			= 'Delete';
$language['general']['delete_confirm']	= 'Are you sure you want to do this ?';
$language['general']['edit'] 			= 'Edit';
$language['general']['numlogins'] 		= '# Logins';
$language['general']['lastlogin'] 		= 'Last login';
$language['general']['lastlogout'] 		= 'Last logout';
$language['general']['userid'] 			= 'User ID';
$language['general']['select_subsection']= 'Select a subsection';
$language['general']['error_occured'] 	= 'Error';
$language['general']['error_type'] 		= 'Type';
$language['general']['error_details'] 	= 'Details';
$language['general']['error_db_errors'] = 'Database errors and debug messages';
$language['general']['log_in'] 			= 'Log in';


$language['general']['time_old'] 		= 'Leave value already set';
$language['general']['time_yesterday'] 	= 'Yesterday';
$language['general']['time_24h'] 		= '24 hours';
$language['general']['time_1week'] 		= 'One week';
$language['general']['time_2week'] 		= 'Two weeks';
$language['general']['time_1month'] 	= 'One month';
$language['general']['time_3month'] 	= 'Three months';
$language['general']['time_6month'] 	= 'Six months';
$language['general']['time_1year'] 		= 'One year';
$language['general']['time_never'] 		= 'Never';
$language['general']['time_now'] 		= 'Now';

$language['general']['name'] 			= 'Name';
$language['general']['email'] 			= 'E-mail';
$language['general']['adress'] 			= 'Adress';
$language['general']['notes'] 			= 'Notes';

$language['general']['yes'] 			= 'Yes';
$language['general']['no'] 				= 'No';

$language['general']['file_name'] 		= 'Filename';
$language['general']['file_size'] 		= 'Size';
$language['general']['file_created'] 	= 'Created';
$language['general']['file_modified'] 	= 'Modified';

/* Menuitems */
$language['menu']['mainpage'] 			= 'Main Page';
$language['menu']['users'] 				= 'Users';
$language['menu']['groups'] 			= 'Groups';
$language['menu']['transfers'] 			= 'Transfers';
$language['menu']['status'] 			= 'Status';
$language['menu']['about'] 				= 'About';
$language['menu']['sysinfo'] 			= 'SysInfo';
$language['menu']['configure'] 			= 'Configure';
$language['menu']['reset'] 				= 'Reset';
$language['menu']['submit'] 			= 'Submit';
$language['menu']['traffic'] 			= 'Traffic';
$language['menu']['section'] 			= 'Section';
$language['menu']['transfer_log'] 		= 'Transfer Log';
$language['menu']['statistics'] 		= 'Statistics';
$language['menu']['toplists'] 			= 'Top lists';
$language['menu']['manual'] 			= 'Manual';
$language['menu']['cleanup'] 			= 'Cleanup';
$language['menu']['log_files'] 			= 'Logs on file';
$language['menu']['log_out'] 			= 'Log out';
$language['menu']['user_details'] 		= 'User details';


/* Main Page */
$language['mainpage']['ftp'] 			= 'FTP';
$language['mainpage']['terminal'] 		= 'Terminal';
$language['mainpage']['pid'] 			= 'PID';
$language['mainpage']['uptime'] 		= 'Uptime';
$language['mainpage']['idle'] 			= 'Idle / %';
$language['mainpage']['command'] 		= 'Command';
$language['mainpage']['command_info']	= 'Command information';
$language['mainpage']['device'] 		= 'Device';
$language['mainpage']['time_login']		= 'Time of login';

/* Users */
$language['users']['newuser'] 			= 'Add user';
$language['users']['users'] 			= 'Users';
$language['users']['cmd_output'] 		= 'Command output';
$language['users']['pers_info'] 		= 'Personal details';
$language['users']['no_group'] 			= 'Unassigned';

/* Userview */
$language['userv']['user_error'] 		= 'User Error';
$language['userv']['user_no_such_user'] = <<<EOD
	A user ID was specified, but no user exists with that ID - select the user
	via the userlist instead of accessing this file manually.
EOD;
$language['userv']['user_no_user_specified'] = <<<EOD
	No user ID was specified - select the user via the userlist instead of
	accessing this file manually.
EOD;
$language['userv']['agu_info'] 			= 'Alter general user information';
$language['userv']['deleteuser'] 		= 'Delete user';
$language['userv']['userdeleted'] 		= 'The user has been deleted';
$language['userv']['assoc_ip'] 			= "Associated IP's";
$language['userv']['geninfo'] 			= 'General info.';
$language['userv']['set_password'] 		= 'Set password';
$language['userv']['set_expiration'] 	= 'Set expiration';
$language['userv']['expirationdate'] 	= 'Set expiration date';
$language['userv']['generated_traffic'] = 'Traffic Generated';
$language['userv']['down_sections'] 	= 'Downloads by section';
$language['userv']['up_sections'] 		= 'Uploads by section';

$language['userv']['selectdate'] 		= 'Select date';
$language['userv']['customdate'] 		= 'Custom date';

$language['userv']['quota'] 			= 'Quota';
$language['userv']['quota_add'] 		= 'Add Quota';
$language['userv']['quota_remove'] 		= 'Remove';
$language['userv']['quota_noquota'] 	= 'No quota has been specified for '
	. 'this user - click "' . $language['userv']['quota_add'] . '" to add a '
	. 'quota. Take note that the quota set will be a blank one - what this '
	. 'means is that previous filetransfers won&acute;t be taken into account.';
$language['userv']['quota_used'] 		= 'Quota usage';

$language['userv']['vhuser']	 		= 'Vhosts';
$language['userv']['vhusertitle'] 		= 'View users virtual hosts';
$language['userv']['vhuseraddnext'] 	= 'Add new vhost for a user';
$language['userv']['vhname']	 		= 'New virtual hostname';
$language['userv']['vhpath']	 		= 'Virtual hostname path';

$language['userv']['alter_maingroup'] 	= 'Alter primary group';
$language['userv']['alter_addgroup'] 	= 'Additional groups';
$language['userv']['memberof'] 			= 'Member of';
$language['userv']['joingroup'] 		= 'Join group';
$language['userv']['selectgroup'] 		= 'Select group';
$language['userv']['memberships'] 		= 'Memberships';

$language['userv']['edit_user'] 		= 'Edit user';

$language['userv']['setpassword'] 		= 'Set password';
$language['userv']['newpassword'] 		= 'New password';
$language['userv']['newpasswordagain'] 	= 'New password (again)';
$language['userv']['onchoosingpassword']= 'On the choosing of a good password';
$language['userv']['howto_password'] 	= <<<EOD
	As  a  general guideline,  passwords  should consist of 6 to 8 characters
	including one or more from each of following sets:
	<ul>
		<li>Lower case alphabetics
		<li>Upper case alphabetics
		<li>Digits 0 thru 9
		<li>Punctuation marks
	</ul>

	Compromises in  password  security  normally  result  from careless
	password selection or handling.  For this reason, you should not select
	a password which appears in  a  dictionary or  which  must  be  written
	down. The password should also not be a proper  name,  your  license
	number, birth  date,  or street address.  Any of these may be used as
	guesses to violate system security.
	<br><br>
	Your password must easily remembered so that you will  not be  forced  to
	write it on a piece of paper. Other methods of construction involve
	selecting an  easily remembered  phrase from literature and selecting the
	first or last letter from each word. An example of this is: "Ask not for
	whom the bell tolls", which produces "An4wtbt".
	<br><br>
	You may be reasonably sure few crackers will have included this  in  their
	dictionaries.  You should, however, select your own methods for
	constructing passwords and  not  rely exclusively on the methods given
	here.
	<br><br>
	(excerpt from the manual pages for passwd)
EOD;

$language['userv']['delete_user'] 		= 'Delete user';
$language['userv']['delete_user_desc'] 	= <<<EOD
	You have opted to delete this user. By doing this you
	should be aware that deleting the user will remove it
	completely. If you accidentaly deleted the user, the
	only way to recover will be to create a new user and
	assign that user the exact information originally
	entered to create a new identical user.
	<br><br>
	If this user has been assigned any additional groups,
	you will have to remove these memberships before you can
	delete this user - after you have done this a delete-button
	will appear below. Group memberships can be removed in the
	subsection called Groups.
EOD;


/* Groups */
$language['groups']['delete_group'] 	= 'Delete group';
$language['groups']['alter_group'] 		= 'Alter group information';
$language['groups']['alter'] 			= 'Alter';
$language['groups']['delete'] 			= 'Delete';
$language['groups']['newgroup'] 		= 'Add group';
$language['groups']['groups'] 			= 'Groups';
$language['groups']['groupname'] 		= 'Groupname';
$language['groups']['addgroup'] 		= 'Add group';
$language['groups']['groupid'] 			= 'Group ID';
$language['groups']['members'] 			= 'Members';
$language['groups']['desc_delete'] 		= <<<EOD
	You have opted to delete this group. By doing this you
	should be aware that deleting the group will remove it
	completely. If you accidentaly deleted the group, the
	only way to recover will be to create a new group and
	assign the users that used to belong to the original
	group to the group you just created.
EOD;
$language['groups']['desc_delete_prim']	= <<<EOD
	<br><br>
	Some of your users have this group assigned as
	their primary group - it is therefore highly
	recommended that you go through the list below
	and assign them another group as their primary.
	If you do not assign them a new group the results
	may be unpredictable depending on your configuration.
	<br><br>
EOD;

/* About */
$language['about']['about'] 			= 'About';
$language['about']['revisions'] 		= 'Revisions';
$language['about']['version'] 			= 'Version';

$language['about']['newfeature'] 		= 'Added feature';
$language['about']['bugfix'] 			= 'Bugfix';
$language['about']['restructuring']		= 'Restructuring';
$language['about']['documentation']		= 'Documentation';

$language['about']['introduction'] 		= <<<EOD
	A while back ago working to set up an easily administered
	ftp I found the	shareware ftp-server Serv-U for Microsoft
	Windows(TM). All was great until the trial timed out
	effectively ending all the rejoycing (is this word spelled
	out	correctly anyway?) - the time had come to either pay
	up or get creative. There's no question what became of that
	question since my Slackware-server was up and ready to go.
	<br><br>
	After considering the alternatives for GNU/Linux when it
	comes to more professional ftp-servers I ended up choosing
	proFTPd. Unfortunately as I was quick to discover was that
	this server was a nightmare to compile (atleast if you needed
	additional modules compiled in), configure and administer.
	The two first can be solved with a proper-quality tutorial,
	and the implementation for the last part is what you're
	looking at right now.
EOD;

/* Manual */
$language['manual']['manual'] 			= 'Manual';
$language['manual']['introduction'] 	= <<<EOD
	In this section you will be able to access the manual and
	the various documents that are available to you at this
	moment. Take note that the documents available here is also
	available as standalone files that can be found in the
	location where you installed proFTPd Administrator. The content
	in these files are at the moment not applicable for translation
	due to their temporary nature during development.
EOD;

/* Transfers */
$language['transfers']['transfers'] 	= 'Transfers';
$language['transfers']['downloaders'] 	= 'downloaders';
$language['transfers']['uploaders'] 	= 'uploaders';
$language['transfers']['down_sections'] = 'Downloads by section';
$language['transfers']['up_sections'] 	= 'Uploads by section';
$language['transfers']['traffic_stats']	= 'Traffic statistics';
$language['transfers']['transfer_log'] 	= 'Transfer log';
$language['transfers']['on_file_title'] = 'Logs on file';
$language['transfers']['delete_logs']	= 'Delete logs';
$language['transfers']['write_logs']	= 'Write out logs';
$language['transfers']['write_to_file']	= 'Write out logs';
$language['transfers']['err_no_open']	= 'Could not open directory, ';
$language['transfers']['num_deleted']	= 'elements gone forever...';
$language['transfers']['delete_desc']	= <<<EOD
	Using this menu you'll have the ability to delete older logs so that
	they don't clog up your database - this can be convenient if you want
	to stay in control, but don't want to maintain long term logs. If you
	want to keep your logs, but move them to a file instead then you're in
	the wrong place and should select the option named "Write out logs". You
	should notice however that the sections named "Statistics", "Top Lists"
	and "Section" base their displayed results on the data in this data -
	for that reason I'd keep a representative amount of data in the database
	for example by regularly removing items older that six months.
EOD;
$language['transfers']['write_desc']	= <<<EOD
	Using this menu you'll have the ability to move older logs to individual
	files so that they don't clog up your database - this can be convenient
	if you want to stay in control, but don't want to maintain long term logs.
	The log files can be viewed via the section named "Logs on file". You
	should notice however that the sections named "Statistics", "Top Lists"
	and "Section" base their displayed results on the data in this data -
	for that reason I'd keep a representative amount of data in the database
	for example by regularly removing items older that six months.
EOD;
$language['transfers']['log_snippet_notice'] = <<<EOD
------------------------------------------------------------------------------------------------------

	In order to keep the size of the transferred data down to a minimum, only the
	200 latest entries are shown below. In order to view the whole log, press the
	button named "Full log" below.

------------------------------------------------------------------------------------------------------


EOD;

$language['transfers']['del_older_than']= 'Delete items older than:';
$language['transfers']['wrt_older_than']= 'Write items older than:';
$language['transfers']['full_log_bt']	= 'Full log';
$language['transfers']['delete_logs_bt']= 'Delete logs';
$language['transfers']['write_logs_bt'] = 'Write logs';


/* Util */
$language['util']['top'] 				= 'Top';
$language['util']['downloaded'] 		= 'Downloaded';
$language['util']['numfiles'] 			= '# Files';
$language['util']['uploaded'] 			= 'Uploaded';
$language['util']['total_amount'] 		= 'Total amount';
$language['util']['mostactive'] 		= 'Most active';

$language['util']['time_1hour'] 		= 'Last hour';
$language['util']['time_24hour'] 		= 'Last 24 hours';
$language['util']['time_7days'] 		= 'Last 7 days';
$language['util']['time_30days'] 		= 'Last 30 days';
$language['util']['time_total'] 		= 'Total';

$language['util']['transfer_log'] 		= 'Transfer log';
$language['util']['user'] 				= 'User';
$language['util']['timestamp'] 			= 'Timestamp';
$language['util']['filename'] 			= 'Filename';
$language['util']['size'] 				= 'Size';
$language['util']['command'] 			= 'Command';
$language['util']['duration'] 			= 'Time';

/* Status */
$language['status']['nosupport']		= 'Status Error';
$language['status']['nosupport_desc'] 	= <<<EOD
	You are using an operating system that is not currently supported. This
	part of the package is heavily dependant on os-specific code, but
	hopefully this will get implemented in the future. The rest of the page
	should however be available without any other exceptions
EOD;
$language['status']['status'] 			= 'Status';
$language['status']['system'] 			= 'System';
$language['status']['version'] 			= 'Version';
$language['status']['name'] 			= 'Name';
$language['status']['value'] 			= 'Value';
$language['status']['program'] 			= 'Program';

$language['status']['ip'] 				= 'Listening IP';
$language['status']['http'] 			= 'HTTP server';
$language['status']['kernel_version'] 	= 'Kernel version';
$language['status']['db_server'] 		= 'MySQL server';
$language['status']['uptime'] 			= 'Uptime';
$language['status']['php_version'] 		= 'PHP version';
$language['status']['idle_time'] 		= 'Idle time';
$language['status']['zend_version'] 	= 'Zend PHP Engine';
$language['status']['term_users'] 		= 'Terminal users';
$language['status']['ftp_users'] 		= 'Ftp users';
$language['status']['proftpd_version'] 	= 'proFTPd';
$language['status']['load'] 			= 'Load';
$language['status']['web_interface'] 	= 'Web-interface';

$language['status']['menu_processlist'] = 'Processlist';
$language['status']['menu_resources'] 	= 'Resources';
$language['status']['menu_hardware'] 	= 'Hardware';
$language['status']['menu_kernel'] 		= 'Kernel';
$language['status']['menu_database'] 	= 'Database';
$language['status']['menu_proftpd'] 	= 'ProFTPd';

$language['status']['server_down'] 		= 'Server down';
$language['status']['secured_apache'] 	= 'Secured servers only report the name, Apache.';
$language['status']['uptime_linux'] 	= 'Load average of the system over the last 1, 5, and 15 minutes.';

$language['status']['ps_processlist'] 	= 'Processlist';
$language['status']['ps_name'] 			= 'Name';
$language['status']['ps_pid'] 			= 'PID';
$language['status']['ps_uid'] 			= 'UID';
$language['status']['ps_defunctprocess']= 'Parent process no longer exists, on a *Nix system this means your software is buggy.';

$language['status']['pro_proftpd'] 		= 'ProFTPd';
$language['status']['pro_compiled_in'] 	= 'Compiled-in modules';
$language['status']['pro_module_field'] = 'Module';
$language['status']['pro_module_desc'] 	= 'Description';

$language['status']['krnl_kernel'] 		= 'Kernel information';
$language['status']['krnl_kernelconf'] 	= 'Kernel Configuration';
$language['status']['krnl_kernelparams']= 'Kernel parameters';
$language['status']['krnl_compiledin']	= 'Feature compiled in';
$language['status']['krnl_modularized']	= 'Modularized';
$language['status']['krnl_conf_file'] 	= 'Kernel configuration file';

$language['status']['hw_hardware'] 		= 'Hardware information';
$language['status']['hw_processor'] 	= 'Processor';
$language['status']['hw_pci'] 			= 'PCI-devices';
$language['status']['hw_pciadress'] 	= 'Adress';
$language['status']['hw_pcivalue'] 		= 'Description';
$language['status']['hw_ide'] 			= 'IDE-devices';
$language['status']['hw_idedevice'] 	= 'Device';
$language['status']['hw_idefield'] 		= 'Field';
$language['status']['hw_idevalues'] 	= 'Value';

$language['status']['db_database'] 		= 'Database statistics';
$language['status']['db_tablename']		= 'Name';
$language['status']['db_rows'] 			= 'Rows';
$language['status']['db_rowformat'] 	= 'Row format';
$language['status']['db_tablesize'] 	= 'Size';
$language['status']['db_created'] 		= 'Create time';
$language['status']['db_updated'] 		= 'Last update';
$language['status']['db_checktime'] 	= 'Check time';
$language['status']['db_var_name']		= 'Variable name';
$language['status']['db_var_value']		= 'Value';
$language['status']['db_sec_tablestats']= 'Table statistics';
$language['status']['db_sec_status']	= 'Database status';
$language['status']['db_sec_processes']	= 'Process list';
$language['status']['db_process_user']	= 'User';
$language['status']['db_process_db']	= 'Database';
$language['status']['db_process_cmd']	= 'Command';
$language['status']['db_process_time']	= 'Time';
$language['status']['db_process_state']	= 'State';
$language['status']['db_process_info']	= 'Information';


$language['status']['res_totalt']		= 'Total capacity';
$language['status']['res_resources']	= 'Resources';
$language['status']['res_storage']		= 'Storage';
$language['status']['res_mountpoint']	= 'Mountpoint';
$language['status']['res_perc_capacity']= 'Percent capacity';
$language['status']['res_free']			= 'Free';
$language['status']['res_used']			= 'Used';
$language['status']['res_size']			= 'Size';
$language['status']['res_phys_device']	= 'Physical device';
$language['status']['res_withfs']		= 'with filesystem';

$language['status']['res_memory']		= 'Memory';
$language['status']['res_memcategory']	= 'Type';
$language['status']['res_memphysical']	= 'Physical memory';
$language['status']['res_memvirtual']	= 'Virtual memory';

$language['status']['res_network']		= 'Network';
$language['status']['res_devname']		= 'Device name';
$language['status']['res_netrecv']		= 'Recieved';
$language['status']['res_netsend']		= 'Sent';
$language['status']['res_neterror']		= 'Err/Drop';

$language['status']['res_netnic']		= 'Network card';
$language['status']['res_netlocnic']	= 'localhost (loopback device)';
$language['status']['res_netppp']		= 'Point to Point Protocol device';
$language['status']['res_netsit']		= 'Simple Internet Transition device (ipv6 over ipv4)';

/* Configure */
$language['configure']['configure']		= 'Configure';
$language['configure']['menu_database']	= 'Database';
$language['configure']['menu_proftpd']	= 'ProFTPd';
$language['configure']['menu_interface']= 'Interface';
$language['configure']['menu_mpoint']	= 'Mountpoints';
$language['configure']['menu_sections']	= 'Sections';
$language['configure']['menu_filepaths']= 'Filepaths';
$language['configure']['menu_quota']	= 'Quota';
$language['configure']['menu_pdns']	= 'PowerDNS';
$language['configure']['menu_extension']= 'Extensions';

$language['configure']['db_type']		= 'Database server';
$language['configure']['db_suptype']	= 'Subtype';
$language['configure']['db_st_notused']	= '&lt; Not in use &gt;';
$language['configure']['db_st_standard']= 'Standard';
$language['configure']['db_st_old_pass']= 'Old database password system';
$language['configure']['db_database']	= 'Database';
$language['configure']['db_hostname']	= 'Hostname';
$language['configure']['db_database']	= 'Database';
$language['configure']['db_connectfail']= <<<EOD
	Connecting to MySQL-database failed using the credentials you've supplied - most likely this is simply due to
	a misspelled username or password. A default MySQL-installation can be accessed using the username "root" and
	an empty password. For more information see the full error message recieved from the database-server below.
EOD;
$language['configure']['db_dbfail']= <<<EOD
	Connecting to MySQL-database was successfull using the credentials you've supplied - however selecting
	the database failed due to a misspelt database name, or the database not existing. The default setup
	described in the installation-instructions specifies a database called "<a href="javascript:void();" onclick="document.config_database.frm_database_database.value = 'proftpd_admin';">proftpd_admin</a>".
	For more information see the full error message recieved from the database-server below.
EOD;

$language['configure']['pdns_pdns']		= 'PowerDNS';
$language['configure']['pdns_domain_list']	= 'Choose domain name from list';

$language['configure']['ftp_ftp']		= 'ProFTPd';
$language['configure']['ftp_ftproot']	= 'FTP root';
$language['configure']['ftp_defhome']	= 'Default homedirectory';
$language['configure']['ftp_createcmd']	= 'Create user command';
$language['configure']['ftp_deletecmd']	= 'Delete user command';
$language['configure']['ftp_defshell']	= 'Default shell';

$language['configure']['ext_ext']		= 'Extensions';
$language['configure']['ext_no_db']		= <<<EOD
	Most of the extensions available on this page require access to a database
	to function, and you do not have a functioning database setup - configure
	the database first! If the database have already been installed, select
	the <a href="configure.php?section=database">database-tab</a> above to
	configure "proFTPd Administrator".
EOD;
$language['configure']['ext_vhost']		= 'Apache Virtual Hosts';
$language['configure']['ext_vhost_pdns_record']	= 'Create PowerDNS record for virtual host';
$language['configure']['ext_vhost_no_table_activated']= <<<EOD
	You have activated the functionality for configuring Apache Virtual Hosts
	from within this tool, but you have not yet added the necessary tables in
	your database - import the database structure filed named "vhtable.sql". If
	you don't already know what this is or intend to actually use it then you
	are advised to disable it.
EOD;
$language['configure']['ext_vhost_no_table']= <<<EOD
	The functionality for configuring Apache Virtual Hosts from within this tool
	requires additional tables added to your database, but you have not yet added
	these - import the database structure filed named "vhtable.sql". If
	you don't already know what this is or intend to actually use it then you
	are advised to leave this disabled.
EOD;
$language['configure']['ext_quota']			= 'Quota';
$language['configure']['ext_quota_no_table_activated']= <<<EOD
	You have activated the functionality for "mod_quotatab", support for quotas,
	from within this tool, but you have not yet added the necessary tables in
	your database - import the database structure filed named "upgrade_to_v0.9.sql".
	Also note that support for "mod_quotatab" must be compiled in to the proftpd
	server for this to work.
EOD;
$language['configure']['ext_quota_no_table']= <<<EOD
	The functionality for "mod_quotatab", support for quotas, from within this tool
	requires additional tables added to your database, but you have not yet added
	these - import the database structure filed named "upgrade_to_v0.9.sql". Also
	note that support for "mod_quotatab" must be compiled in to the proftpd
	server for this to work.
EOD;
$language['configure']['ext_quota_no_mods']	= <<<EOD
	In order to enable and use the support for quotas you need to have the needed
	modules compiled into proftpd - more specifically you will in addition to the
	"mod_sql"-modules you hopefully already have also need "mod_quotatab" and
	"mod_quotatab_sql". Note that this message will also show if you haven't
	configured the correct path to you proftpd-executable in the
	<a href="configure.php?section=paths">"File paths"-section</a>.
EOD;
$language['configure']['ext_quota_no_activated'] = <<<EOD
	Quotas have been disabled, but there are quotas that are still active for some
	of your users. In order to fully deactivate quotas you would have to first
	reactivate the functionality, remove the set quotas and then finally disable
	this functionality.
EOD;
$language['configure']['ext_pdns']			= 'PowerDNS';
$language['configure']['pdns_delete']			= 'Delete domain';
$language['configure']['pdns_delete_desc']= <<<EOD
	You are about to delete the whole domain with all its records from the
	database. By doing this you should be aware that the domain will no longer
	be supported by the PowerDNS system and will be erased completely.
	<br><br>
	If this	is what you really intend to achieve, please continue.
EOD;
$language['configure']['ext_pdns_no_table_activated']= <<<EOD
	You have activated the functionality for "Power DNS", support for pdns
	from within this tool, but you have not yet added the necessary tables in
	your database - import the database structure filed named "powerdns.sql".
	Also note that support for "pdns" requires proper software to be installed
	and configured in your system.
EOD;
$language['configure']['ext_pdns_no_table']= <<<EOD
	The functionality for "Power DNS", support for pdns
	from within this tool, requires additional tables to be added to your
	your database - import the database structure filed named "powerdns.sql" if
	you intend to use it.
	Also note that support for "pdns" requires proper software to be installed
	and configured in your system.
EOD;
$language['configure']['pdns_no_domain_records']= <<<EOD
	No records found. Please use the form below to create new records.
EOD;
$language['configure']['pdns_new_domain_records']= <<<EOD
	Domain has been added. Please use the form below to create new records.
EOD;
$language['configure']['pdns_domain_exists_true']= <<<EOD
	New records have been added to the PowerDNS database for the domain.<br>Domain supported by PowerDNS system.<br><br>
EOD;
$language['configure']['pdns_domain_exists_false']= <<<EOD
	No records have been added to the PowerDNS database.<br>Domain NOT supported by PowerDNS system.<br><br>
EOD;

$language['configure']['quota_activate']	= 'Activate support for quotas';
$language['configure']['quota_whattype']	= 'Default quota type';
$language['configure']['quota_whatlimit']	= 'Default limit type';
$language['configure']['quota_whatsession']	= 'Quota only per session';
$language['configure']['quota_details']		= 'Details for standard quota';
$language['configure']['quota_down_mb']		= 'Downloaded MB';
$language['configure']['quota_up_mb']		= 'Uploaded MB';
$language['configure']['quota_trans_mb']	= 'Transferred MB';
$language['configure']['quota_down_files']	= 'Downloaded files';
$language['configure']['quota_up_files']	= 'Uploaded files';
$language['configure']['quota_trans_files']	= 'Transferred files';
$language['configure']['quota_no_limit']	= 'No Quota';

$language['configure']['ui_ui']			= 'Interface';
$language['configure']['ui_numnames']	= 'Names in toplist';
$language['configure']['ui_numlogitems']= 'Logitems shown';
$language['configure']['ui_padtoplist']	= 'Toplist padding';
$language['configure']['ui_striplogs']	= 'Strip logpaths';
$language['configure']['ui_sysonly']	= 'SysInfo only';
$language['configure']['ui_style']		= 'Selected style';
$language['configure']['ui_language']	= 'Language';
$language['configure']['ui_sel_quota']	= 'Drop-down quotas';

$language['configure']['mp_mp']			= 'Mountpoints';
$language['configure']['mp_skipped_mp']	= 'Skipped mountpoints';
$language['configure']['mp_hide_mp']	= 'Add mountpoint to hide from status screen';
$language['configure']['mp_select_mp']	= 'Select mountpoint';

$language['configure']['sec_downloads']	= 'Sections: Download';
$language['configure']['sec_uploads']	= 'Sections: Upload';
$language['configure']['sec_adddownload']= 'Add download section to transfer screen';
$language['configure']['sec_addupload']	= 'Add upload section to transfer screen';
$language['configure']['sec_relpath']	= 'Relative section path';
$language['configure']['sec_down_topic']= '<acronym title="FTP root, to be concatenated with the relative section paths to form complete paths.">Basepath:</acronym><br>Download sections:';
$language['configure']['sec_up_topic']	= '<acronym title="FTP root, to be concatenated with the relative section paths to form complete paths.">Basepath:</acronym><br>Upload sections:';

$language['configure']['fp_fp']			= 'Filepaths';
$language['configure']['fp_generic_cmd']= 'Path to generic commands';
$language['configure']['fp_cmdspecific']= '-specific';
$language['configure']['fp_conf_file']	= 'Kernel configuration file';

$language['configure']['pdns_domain_details']			= 'Details for domain:';
$language['configure']['pdns_domain_edit']				= 'Edit domain:';
$language['configure']['pdns_add_new_domain']			= 'Create new domain';
$language['configure']['pdns_add_new_domain_name']		= 'Enter new domain name';
$language['configure']['pdns_add_new_domain_type']		= 'Select domain type';
$language['configure']['pdns_add_new_domain_masters_ip']= 'Enter Master`s IP address';
$language['configure']['new_domain_record']				= 'Add a new record for the domain';
$language['configure']['edit_domain_record']			= 'Edit an existing domain record';

$language['configure']['fp_who_rel']= <<<EOD
	The path you've supplied has either been specified as a relative path, or
	the supplied path is empty. Although this shouldn't be a problem for a
	basic command such as this one it is recommended that you supply the full
	path - if only to remove this warning. The default value
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_who.value = '/usr/bin/who';">/usr/bin/who</a>")
	should suffice for both Linux and *BSD systems.
EOD;
$language['configure']['fp_who_no']= <<<EOD
	The file you've specified do not seem to exist - adjust the value of this
	field and supply the full path to the command. The default value is
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_who.value = '/usr/bin/who';">/usr/bin/who</a>".
EOD;

$language['configure']['fp_df_rel']= <<<EOD
	The path you've supplied has either been specified as a relative path, or
	the supplied path is empty. Although this shouldn't be a problem for a
	basic command such as this one it is recommended that you supply the full
	path - if only to remove this warning. The default value ("
	<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_df.value = '/usr/bin/df';">/usr/bin/df</a>")
	should suffice for both Linux and *BSD systems.
EOD;
$language['configure']['fp_df_no']= <<<EOD
	The file you've specified do not seem to exist - adjust the value of this
	field and supply the full path to the command. The default value is "
	<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_df.value = '/usr/bin/df';">/usr/bin/df</a>".
EOD;

$language['configure']['fp_ps_rel']= <<<EOD
	The path you've supplied has either been specified as a relative path, or
	the supplied path is empty. Although this shouldn't be a problem for a
	basic command such as this one it is recommended that you supply the full
	path - if only to remove this warning. The default value (
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_ps.value = '/bin/ps';">/bin/ps</a>")
	should suffice for both Linux and *BSD systems.
EOD;
$language['configure']['fp_ps_no']= <<<EOD
	The file you've specified do not seem to exist - adjust the value of this
	field and supply the full path to the command. The default value is
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_ps.value = '/bin/ps';">/bin/ps</a>".
EOD;

$language['configure']['fp_sysctl_rel']= <<<EOD
	The path you've supplied has either been specified as a relative path, or
	the supplied path is empty. The default value
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_sysctl.value = '/sbin/sysctl';">/sbin/sysctl</a>")
	should suffice for both Linux and *BSD systems.
EOD;
$language['configure']['fp_sysctl_no']= <<<EOD
	The file you've specified do not seem to exist - adjust the value of this
	field and supply the full path to the command. The default value is
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_sysctl.value = '/sbin/sysctl';">/sbin/sysctl</a>".
EOD;

$language['configure']['fp_ftpwho_rel']= <<<EOD
	The path you've supplied has either been specified as a relative path, or
	the supplied path is empty. The default value
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_ftpwho.value = '/usr/local/bin/ftpwho';">/usr/local/bin/ftpwho</a>")
	should suffice for both Linux and *BSD systems.
EOD;
$language['configure']['fp_ftpwho_no']= <<<EOD
	The file you've specified do not seem to exist - adjust the value of this
	field and supply the full path to the command. The default value
	("<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_ftpwho.value = '/usr/local/bin/ftpwho';">/usr/local/bin/ftpwho</a>")
	should suffice for most Linux and *BSD systems.
EOD;

$language['configure']['fp_proftpd_rel']= <<<EOD
	The path you've supplied has either been specified as a relative path, or
	the supplied path is empty. If you manually compiled this program from
	sourcecode this file would most likely have been placed in
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_proftpd.value = '/usr/local/sbin/proftpd';">/usr/local/sbin/proftpd</a>".
	If you're using FreeBSD and installed proftpd using portage this file would
	have been placed in
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_proftpd.value = '/usr/local/libexec/proftpd';">/usr/local/libexec/proftpd</a>".
EOD;
$language['configure']['fp_proftpd_no']= <<<EOD
	The file you've specified do not seem to exist - adjust the value of this
	field and supply the full path to the command. If you manually compiled
	this program from sourcecode this file would most likely have been placed
	in "<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_proftpd.value = '/usr/local/sbin/proftpd';">/usr/local/sbin/proftpd</a>".
	If you're using FreeBSD and installed proftpd using portage this file
	would have been placed in
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_proftpd.value = '/usr/local/libexec/proftpd';">/usr/local/libexec/proftpd</a>".
EOD;

$language['configure']['fp_nokernel']= <<<EOD
	The file you've specified do not seem to exist - adjust the value of this
	field and supply the full path to the kernel configuration. The various
	Linux-distributions have different locations of placing this file, but you
	should atleast consider trying
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_kernel.value = '/boot/config';">/boot/config</a>"
	or "<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_kernel.value = '/usr/src/linux/.config';">/usr/src/linux/.config</a>".
	The various BSD-variations, if I'm not mistaken, usually place this file in
	"<a href="javascript:void();" onclick="document.config_filepaths.frm_config_path_kernel.value = '/usr/src/sys/i386/conf/GENERIC';">/usr/src/sys/i386/conf/GENERIC</a>".
EOD;

$language['configure']['no_write_config']= <<<EOD
	The configuration file, called "configuration.xml", is NOT writeable and you
	can not alter any of the settings before you have given the web-server
	permission to write to this file - check the manual for more information on
	how to do this. Subsections have been hidden until you rectify this error.
EOD;

/* ProFTPd Modules, and their descriptions. */
$language['status']['ftp_module']['mod_core.c']			= 'Core module.';
$language['status']['ftp_module']['mod_xfer.c']			= 'Transfer module.';
$language['status']['ftp_module']['mod_auth_unix.c']	= 'Enable authentication using UNIX-credentials.';
$language['status']['ftp_module']['mod_auth_file.c']	= 'Enable file-based authentication.';
$language['status']['ftp_module']['mod_auth_pam.c']		= 'Enable authentication using PAM.';
$language['status']['ftp_module']['mod_auth.c']			= 'Authentication module.';
$language['status']['ftp_module']['mod_rewrite.c']		= 'Rewriting support.';
$language['status']['ftp_module']['mod_ls.c']			= 'File listing functionality.';
$language['status']['ftp_module']['mod_log.c']			= 'Logging support.';
$language['status']['ftp_module']['mod_site.c']			= 'Implements SITE-commands.';
$language['status']['ftp_module']['mod_sql_mysql.c']	= 'Support for MySQL-database.';
$language['status']['ftp_module']['mod_cap.c']			= 'Capabilities module.';
$language['status']['ftp_module']['mod_ldap.c']			= 'LDAP authentication support.';
$language['status']['ftp_module']['mod_ratio.c']		= 'File/Byte ratio module.';
$language['status']['ftp_module']['mod_quotatab_sql.c']	= <<<EOD
	This submodule provides the SQL database "driver" for storing quota table
	information in SQL tables.
EOD;
$language['status']['ftp_module']['mod_readme.c']		= <<<EOD
	"README" file support that can be used to notify a user when a given file
	was last changed.
EOD;
$language['status']['ftp_module']['mod_sql.c']			= <<<EOD
	The mod_sql module is an authentication and logging module for ProFTPD. It
	is comprised of a front end module (mod_sql) and backend database-specific
	modules (mod_sql_mysql, mod_sql_postgres). The front end module leaves the
	specifics of handling database connections to the backend modules.
EOD;
$language['status']['ftp_module']['mod_radius.c']		= <<<EOD
	This module is used to authenticate users using the RADIUS protocol. It
	can also be used to do logging via RADIUS accounting packets.
EOD;
$language['status']['ftp_module']['mod_wrap.c']			= <<<EOD
	Interface to libwrap that enables the daemon to use the common tcpwrappers
	access control library while in standalone mode, and in a very configurable
	manner.
EOD;
$language['status']['ftp_module']['mod_site_misc.c']	= <<<EOD
	The mod_site_misc module implements miscellaneous SITE commands, such as:

	<ul>
	    <li>SITE MKDIR</li>
	    <li>SITE RMDIR</li>
	    <li>SITE SYMLINK</li>
    	<li>SITE UTIME</li>
    </ul>
EOD;
$language['status']['ftp_module']['mod_tls.c']			= <<<EOD
	Enables the usage of TLS, in other words certificates used with OpenSSL.
	SSL/TLS support.
EOD;
$language['status']['ftp_module']['mod_quotatab_ldap.c']= <<<EOD
	This submodule provides the LDAP-specific "driver" for retrieving quota
	limit table information from an LDAP server. LDAP-based quota tables
	(source-type of "ldap") can only be used for limit tables, not for tally
	tables. The frequent updates needed for maintaining tally tables mean
	that LDAP is not well-suited to handle tally table storage.
EOD;
$language['status']['ftp_module']['mod_quotatab_file.c']= <<<EOD
	This submodule provides the file-specific "driver" for storing quota table
	information in files. Using file-based quota tables (source-type of "file")
	the data will be stored in binary fixed-record format. This module is
	accompanied by a tool, ftpquota, to help in creating and managing these
	file-based tables.
EOD;
$language['status']['ftp_module']['mod_quotatab.c']		= <<<EOD
	This module is designed to impose quotas, both byte- and file-based, on
	FTP accounts, based on user, group, class, or for all accounts. It is
	based on the ideas contained in Eric Estabrook's mod_quota; however, this
	module has been written from scratch to implement quotas in a very
	different manner.
EOD;
$language['status']['ftp_module']['mod_ifsession.c']	= <<<EOD
	The purpose of mod_ifsession is to provide a flexible way of specifying
	that certain configuration directives only apply to certain sessions,
	based on credentials such as connection class, user, or group membership.
EOD;
$language['status']['ftp_module']['mod_ctrls_admin.c']	= <<<EOD
	This module implements administrative control actions for the ftpdctl
	program.
EOD;
$language['status']['ftp_module']['mod_delay.c']		= <<<EOD
	The mod_delay module is designed to make a certain type of information
	leak, known as a "timing attack", harder.
EOD;

/*
$language['status']['ftp_module']['']					= '';
$language['status']['ftp_module']['']					= '';
$language['status']['ftp_module']['']					= '';
$language['status']['ftp_module']['']					= '';
$language['status']['ftp_module']['']					= <<<EOD
EOD;
*/
?>