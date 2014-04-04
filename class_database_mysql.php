<?php
require_once('class_database.php');

class MySQL extends Database {
	var $get_UID_cache 		= array();

	function MySQL() {
		/* Run constructor for parent class to make sure variables are set. */
		$this->Database();

		$this->log_add_debug('Initialization', 'Class: MySQL');
	}

	/* Generic functions *****************************************************/
	function do_connect() {
		$this->log_add_debug('do_connect', 	'Connecting to database with credentials ' .
							  $this->db_username . '@' . $this->db_host);
		$this->connection_handle = @mysql_connect(	$this->db_host,
													$this->db_username,
													$this->db_password);

		if (!$this->connection_handle) {
			$this->log_additem('do_connect', 'Connecting to database failed with errors: ' . mysql_error());
		} else $this->connected = true;
	}

	function do_select_db() {
		$this->log_add_debug('do_select_db', 'Selecting database "' . $this->db_database . '" ');
		if (!$this->connected) {
			$this->log_additem('do_select_db', 'Can\'t select database, not connected to database server');
			return;
		}

		$db_select = @mysql_select_db($this->db_database, $this->connection_handle);
		if (!$db_select) {
			$this->log_additem('do_select_db', 'Selecting database failed with errors: ' . mysql_error());
		} else $this->selected_database = true;
	}

	function get_table_exists($tablename) {
		if (count($this->__get_array_from_query('SHOW TABLES LIKE "' . $tablename . '"')) == 0) {
			$this->log_add_debug('get_table_exists', 'Checking if table, "' . $tablename . '", exists ... no it doesn\'t');
			return false;
		}
		else {
			$this->log_add_debug('get_table_exists', 'Checking if table, "' . $tablename . '", exists ... yes it does');
			return true;
		}
	}

	function get_quotas_exists() {
		return !(count($this->__get_array_from_query('SELECT NULL FROM ftpquotalimits')) == 0);
	}

	function get_USERNAMEbyUID($uid) {
		$list = array_flip($this->get_UID_cache);

		if (array_key_exists($uid, $list)) {
			$this->log_add_debug('get_USERNAMEbyUID', 'Get username for the uid "' . $uid. '"... username is ' . $list[$uid] . ' (cached)');
			return $list[$uid];
		} else {
			$sql = mysql_query('SELECT userid FROM usertable WHERE uid="' . $uid . '";', $this->connection_handle);

			if (mysql_num_rows($sql) == 0) {
				$this->log_add_debug('get_USERNAMEbyUID', 'Get username for the uid "' . $uid . '"... none found');
				return null;
			}
			else {
				$data = mysql_fetch_array($sql);
				$this->log_add_debug('get_USERNAMEbyUID', 'Get username for the uid "' . $uid . '"... username is "' . $data["userid"] . '"');
				$this->get_UID_cache[$data["userid"]] = $uid;
				return $data["userid"];
			}
		}
	}

	function get_UIDbyUSERNAME($username) {
		if (array_key_exists($username, $this->get_UID_cache)) {
			$this->log_add_debug('getUIDbyUSERNAME', 'Get UID for the username "' . $username . '"... UID is ' . $this->get_UID_cache[$username] . ' (cached)');
			return $this->get_UID_cache[$username];
		}

		$sql = mysql_query('SELECT uid FROM usertable WHERE userid="' . $username . '";', $this->connection_handle);

		if (mysql_num_rows($sql) == 0) {
			$this->log_add_debug('getUIDbyUSERNAME', 'Get UID for the username "' . $username . '"... none found');
			$this->get_UID_cache[$username] = -1;
			return -1;
		}
		else {
			$data = mysql_fetch_array($sql);
			$this->log_add_debug('getUIDbyUSERNAME', 'Get UID for the username "' . $username . '"... UID is ' . $data["uid"]);
			$this->get_UID_cache[$username] = $data["uid"];
			return $data["uid"];
		}
	}

	function get_GIDbyGROUPNAME($groupname) {
		$sql = mysql_query('SELECT gid FROM grouptable WHERE groupname="' . $groupname . '";', $this->connection_handle);

		if (mysql_num_rows($sql) == 0) {
			$this->log_add_debug('get_GIDbyGROUPNAME', 'Get GID for the groupname "' . $groupname . '"... none found');
			return -1;
		}
		else {
			$data = mysql_fetch_array($sql);
			$this->log_add_debug('get_GIDbyGROUPNAME', 'Get GID for the groupname "' . $groupname . '"... GID is ' . $data["gid"]);
			return $data["gid"];
		}
	}

	function get_UID_exists($userid) {
		$sql = mysql_query('SELECT NULL FROM usertable WHERE uid="' . $userid . '";', $this->connection_handle);

		if (mysql_num_rows($sql) == 0) {
			$this->log_add_debug('get_UID_exists', 'Checking for existing UID, "' . $userid . '"... none found');
			return false;
		}
		else {
			$data = mysql_fetch_array($sql);
			$this->log_add_debug('get_UID_exists', 'Checking for existing UID, "' . $userid . '"... UID exists');
			return true;
		}
	}

	function get_GID_exists($groupid) {
		$sql = mysql_query('SELECT NULL FROM grouptable WHERE gid="' . $groupid . '";', $this->connection_handle);

		if (mysql_num_rows($sql) == 0) {
			$this->log_add_debug('get_GID_exists', 'Checking for existing GID, "' . $groupid . '"... none found');
			return false;
		}
		else {
			$data = mysql_fetch_array($sql);
			$this->log_add_debug('get_GID_exists', 'Checking for existing GID, "' . $groupid . '"... GID exists');
			return true;
		}
	}

	function get_user_memberships() {
		$this->log_add_debug('get_user_memberships', 'Building list of users and their group memberships, both primary and additional groups.');
		$memberships = array();

		$groups = $this->__get_array_from_query('SELECT userid, groupname FROM usertable LEFT JOIN grouptable ON usertable.gid = grouptable.gid');
		foreach($groups as $group) {
			$memberships[$group['userid']] = array();
			array_push($memberships[$group['userid']], $group['groupname']);
		}

		$groups = $this->__get_array_from_query('SELECT groupname, members FROM grouptable');
		foreach ($groups as $group) {
			$users = explode(',', $group['members']);

			foreach ($users as $user) {
				$user = trim($user);
				if (strlen($user) == 0) continue;

				if (!isset($memberships[$user])) $memberships[$user] = array();
				if (!in_array($group['groupname'], $memberships[$user])) array_push($memberships[$user], $group['groupname']);
			}
		}
		return $memberships;
	}

	/* Userlist **************************************************************/
	function do_add_user($username, $password, $homedir, $shell,
						 $main_group, $expiration, $disabled,
						 $name, $mail, $address, $notes) {
		$this->log_add_debug('do_add_user', 'Adding user, details in next "__do_basic_query"');
		$this->__do_basic_query('INSERT INTO usertable SET userid="' . $username .
							  '", passwd=password("' . $password . '"), homedir="' . $homedir .
							  '", shell="' . $shell . '", gid="' . $main_group . '", expiration="' .
							  $expiration . '", disabled="' . $disabled . '", det_name="' . @$name .
							  '", det_mail="' . @$mail . '", det_adress="' . @$address .
							  '", det_notes="' . @$notes . '"');
		$this->last_added_userid = mysql_insert_id($this->connection_handle);
	}
	/* Quotalimit **************************************************************/
	function do_add_quota($username, $quotatype, $quota_persession, $quota_limittype, $upload_byteondisk, $download_bytefromdisk, $transfer_byteinout, $upload_fileondisk, $download_filefromdisk, $transfer_fileinout) {
		$this->log_add_debug('do_add_quota', 'Adding quota, details in next "__do_basic_query"');
		$this->__do_basic_query('INSERT INTO ftpquotalimits SET name="' . $username .
							  '", quota_type="' . $quotatype . '", per_session="' . $quota_persession .
							  '", limit_type="' . $quota_limittype . '", bytes_in_avail="' . $upload_byteondisk .
							  '", bytes_out_avail="' . $download_bytefromdisk . '", bytes_xfer_avail="' . $transfer_byteinout .
							  '", files_in_avail="' . $upload_fileondisk . '", files_out_avail="' . $download_filefromdisk .
							  '", files_xfer_avail="' . $transfer_fileinout . '"');
	}

	function get_group_data(){
		$this->log_add_debug('get_group_data', 'Building list of users and their group memberships (only additional groups).');

		$members = array();
		$groupnames = array();

		$res = mysql_query('SELECT * FROM grouptable', $this->connection_handle);

		while($row = mysql_fetch_array($res)) {
			$groupnames[$row["gid"]] = $row["groupname"];

			if (isset($row["members"]) && strlen($row["members"]) != 0) {
				$names = explode(",", $row["members"]);

				foreach($names as $name) {
					if (strlen($name) == 0) continue;

					if (!array_key_exists($name, $members)) $members[$name] = array();
					if (!in_array($row['groupname'], $members[$name])) array_push($members[$name], $row['groupname']);
				}
			} else continue;
		}

		$data = array("members" => $members, "names" => array_flip($groupnames));
		return $data;
	}

	function get_userlist() {
		$this->log_add_debug('get_userlist', 'Fetching data for users');
		return $this->__get_array_from_query('SELECT usertable.*, grouptable.groupname FROM usertable LEFT JOIN grouptable ON usertable.gid=grouptable.gid ORDER BY userid', $this->connection_handle);
	}

	function get_userlist_quota() {
		$this->log_add_debug('get_userlist_quota', 'Fetching data and quota for users');
		$result = array();

		$user_list = $this->__get_array_from_query('SELECT usertable.*, grouptable.groupname FROM usertable LEFT JOIN grouptable ON usertable.gid=grouptable.gid ORDER BY userid', $this->connection_handle);
		$quota_list= $this->__get_array_from_query('SELECT name FROM ftpquotalimits', $this->connection_handle);

		$quota_name= array();
		foreach ($quota_list as $quota) array_push($quota_name, $quota['name']);
		$quota_name= array_flip($quota_name);

		foreach ($user_list as $user) {
			if (array_key_exists($user['userid'], $quota_name)) $user['have_quota'] = 1;
			else $user['have_quota'] = 0;

			array_push($result, $user);
		}
		return $result;

		//return $this->__get_array_from_query('SELECT usertable.*, grouptable.groupname, ftpquotalimits.bytes_in_avail FROM usertable CROSS JOIN grouptable CROSS JOIN ftpquotalimits WHERE usertable.gid=grouptable.gid AND usertable.userid=ftpquotalimits.name ORDER BY userid', $this->connection_handle);
	}

	/* Userview **************************************************************/
	function do_add_default_quota($username) {
		$this->log_add_debug('do_add_default_quota', 'Adding default quota for user with username"' . $username . '"');

		if ($GLOBALS['config_ext']['quota']['per_session'] == 1) $GLOBALS['config_ext']['quota']['per_session'] = 'true';
		else $GLOBALS['config_ext']['quota']['per_session'] = 'false';

		$this->__do_basic_query('INSERT INTO ftpquotalimits SET name="' . $username .
							  '", quota_type="user", per_session="' . $GLOBALS['config_ext']['quota']['per_session'] .
							  '", limit_type="' . $GLOBALS['config_ext']['quota']['limittype'] . '", bytes_in_avail="' . mb2byte($GLOBALS['config_ext']['quota']['up_mb']) .
							  '", bytes_out_avail="' . mb2byte($GLOBALS['config_ext']['quota']['down_mb']) . '", bytes_xfer_avail="' . mb2byte($GLOBALS['config_ext']['quota']['trans_mb']) .
							  '", files_in_avail="' . $GLOBALS['config_ext']['quota']['up_files'] . '", files_out_avail="' . $GLOBALS['config_ext']['quota']['down_files'] .
							  '", files_xfer_avail="' . $GLOBALS['config_ext']['quota']['trans_files'] . '"');
	}

	function do_delete_user($uid) {
		$this->log_add_debug('do_delete_user', 'Deleting user with uid "' . $uid . '"');

		$username = $this->get_USERNAMEbyUID($uid);
		$this->do_delete_quota($username);
		if($GLOBALS['config_ext']['vhosts']['enabled'] == 1) $this->do_delete_vhuser($uid);
		$this->__do_basic_query('DELETE FROM usertable WHERE uid="' . $uid . '"');
	}

	function do_delete_quota($username) {
		$this->log_add_debug('do_delete_quota', 'Deleting quota for user with username "' . $username . '"');
		$this->__do_basic_query('DELETE FROM ftpquotalimits WHERE name="' . $username . '"');
		$this->__do_basic_query('DELETE FROM ftpquotatallies WHERE name="' . $username . '"');
	}

	function do_set_user_expiration($userid, $expiration) {
		$this->log_add_debug('do_set_user_expiration', 'Setting account expiration-date for user with userid "' .
							 $userid . '" to ' . $expiration);
		$this->__do_basic_query('UPDATE usertable SET expiration="' . $expiration . '" WHERE uid="' . $userid . '"');
	}

	function do_set_user_password($userid, $password) {
		$this->log_add_debug('do_set_user_password', 'Setting password for account with userid "' .
							 $userid . '" to ' . $password);
		$this->__do_basic_query('UPDATE usertable SET passwd=password("' . $password . '") WHERE uid="' . $userid . '"');
	}

	function do_set_user_primarygroup($userid, $groupid) {
		$user_data = $this->get_userlist_by_id($userid);
		$user_data = $user_data[0];

		$this->do_user_leavegroup($user_data['userid'], $groupid);

		$this->log_add_debug('do_set_user_primarygroup', 'User with username "' . $user_data['userid'] . '" now has his/her primary group set as the group with groupid ' . $groupid . '.');
		$this->__do_basic_query('UPDATE usertable SET gid="' . $groupid . '" WHERE uid="' . $userid . '"');
	}

	function do_user_joingroup($username, $groupid) {
		$group_data = $this->get_grouplist_by_id($groupid);
		$group_data = $group_data[0];

		if (strpos(@$group_data['members'], ',' . $username) === false) {
			$this->log_add_debug('do_user_joingroup', 'User with username "' . $username . '" joins group with groupid ' . $groupid);
			$this->__do_basic_query('UPDATE grouptable SET members="' . @$group_data['members'] . ',' . $username . '" WHERE gid="' . $groupid . '"');
		} else {
			$this->log_add_debug('do_user_joingroup', 'User with username "' . $username . '" tries to join group with groupid ' . $groupid . ', but is allready a member.');
		}
	}

	function do_user_leavegroup($username, $groupid) {
		$group_data = $this->get_grouplist_by_id($groupid);
		$group_data = $group_data[0];

		// Undefined function stripos...(PHP5)
		if (strpos(@$group_data['members'], ',' . $username) === false) {
			$this->log_add_debug('do_user_leavegroup', 'User with username "' . $username . '" tries to leave the group with groupid ' . $groupid . ', but wasn\'t a member.');
		} else {
			$this->log_add_debug('do_user_leavegroup', 'User with username "' . $username . '" left the group with groupid ' . $groupid . '.');

			if (isset($group_data["members"]) && strlen($group_data["members"]) != 0) {
				$members	= "";
				$names		= explode(",", $group_data["members"]);
				array_shift($names);

				foreach($names as $name) {
					if ($name != $username) $members .= ',' . $name;
				}
				$this->__do_basic_query('UPDATE grouptable SET members="' . $members . '" WHERE gid="' . $groupid . '"');
			}
		}
	}

	function do_set_user($userid, $shell, $disabled, $homedir, $det_name, $det_mail, $det_adress, $det_notes) {
		$this->__do_basic_query('UPDATE usertable SET shell="' . $shell . '", disabled="' . $disabled . '", homedir="' . $homedir . '", det_name="' . @$det_name . '", det_mail="' . @$det_mail . '", det_adress="' . @$det_adress . '", det_notes="' . @$det_notes . '" WHERE uid="' . $userid . '";');
	}

	function do_set_quota($username, $quota_persession, $quota_limittype, $upload_byteondisk, $download_bytefromdisk, $transfer_byteinout, $upload_fileondisk, $download_filefromdisk, $transfer_fileinout) {
		$this->log_add_debug('do_set_quota', 'Redefining quate for user with username "' . $username . '"');
		$this->__do_basic_query('UPDATE ftpquotalimits SET per_session="' . $quota_persession .
							  '", limit_type="' . $quota_limittype . '", bytes_in_avail="' . $upload_byteondisk .
							  '", bytes_out_avail="' . $download_bytefromdisk . '", bytes_xfer_avail="' . $transfer_byteinout .
							  '", files_in_avail="' . $upload_fileondisk . '", files_out_avail="' . $download_filefromdisk .
							  '", files_xfer_avail="' . $transfer_fileinout . '" WHERE name="' . $username . '"');
	}

	function do_add_vhuser($username, $homedir, $uid, $pdns, $type, $content, $ttl, $prio) {
		$this->log_add_debug('do_add_vhuser', 'Adding vhuser, details in next "__do_basic_query"');
		$this->__do_basic_query('INSERT INTO vhtable SET servername="' . $username .
							  '", docroot="' . $homedir .
							  '", user_id="' . $uid . '"');
		$wwwalias = "www".".".$username;
		$this->__do_basic_query('INSERT INTO vhtable SET servername="' . $wwwalias .
							  '", docroot="' . $homedir .
							  '", user_id="' . $uid . '"');

		if ($pdns == 1 && $type!='' && $content!='' && $ttl!='' && $prio!='') {
		    $domain_fix = split('[.]', $username);
		    $domain_name = $domain_fix[count($domain_fix)-2].".".$domain_fix[count($domain_fix)-1];
		    $z = count($domain_fix) - 3;
			for ($i=2; $i<=count($domain_fix); $i++) {
			        $sql = mysql_query('SELECT id FROM domains WHERE name = "'. $domain_name .'"', $this->connection_handle);
				if (mysql_num_rows($sql) > 0) {
				    $data = mysql_fetch_array($sql);
					$this->__do_basic_query('INSERT INTO records SET domain_id="'. $data['id'] .'", name="'. $username .'", type="'. $type .'", content="'. $content.'", ttl="'. $ttl .'", prio="'. $prio .'"');
					$this->__do_basic_query('INSERT INTO records SET domain_id="'. $data['id'] .'", name="'. $wwwalias .'", type="'. $type .'", content="'. $content.'", ttl="'. $ttl .'", prio="'. $prio .'"');
				    $i = count($domain_fix) + 1;
				    return true;
				} else {
				    $domain_name = $domain_fix[$z].".".$domain_name;
				    $z--;
				}
			}
		}
		return false;
	}

	function do_delete_vhuser($uid) {
		$this->log_add_debug('do_delete_vhuser', 'Deleting vhosts for user with username "' . $username . '"');
		$this->__do_basic_query('DELETE FROM vhtable WHERE user_id="' . $uid . '"');
	}

	function do_delete_one_vhuser($vhostname, $pdns) {
		$this->log_add_debug('do_delete_one_vhuser', 'Deleting one vhost with a name "' . $vhostname . '"');
		$this->__do_basic_query('DELETE FROM vhtable WHERE servername="' . $vhostname . '"');
		if ($pdns == 1) {
		$sql = mysql_query('SELECT id FROM records WHERE name = "'. $vhostname .'" AND type = "A" OR name = "'. $vhostname .'" AND type = "CNAME"', $this->connection_handle);
		    if (mysql_num_rows($sql) > 0) {
			$record_id = mysql_fetch_array($sql);
			$this->__do_basic_query('DELETE FROM records WHERE id="' . $record_id['id'] . '"');
		    }
		}
	}

	function get_user_exists($username) {
		$sql = mysql_query('SELECT NULL FROM usertable WHERE userid="' . $username . '"', $this->connection_handle);
		if (mysql_num_rows($sql) == 0) {
			$this->log_add_debug('get_user_exists', 'Checking for existing user "' . $username . '"... none found');
			return false;
		} else {
			$this->log_add_debug('get_user_exists', 'Checking for existing user "' . $username . '"... user exist');
			return true;
		}
	}

	function get_userlist_by_id($userid) {
		$this->log_add_debug('get_userlist_by_id', 'Fetching data for user with id "' . $userid . '"');
		return $this->__get_array_from_query('SELECT * FROM usertable LEFT JOIN grouptable ON usertable.gid=grouptable.gid WHERE uid = "' . $userid . '"', $this->connection_handle);
	}

	function get_associated_ipadresses($username) {
		$this->log_add_debug('get_userlist', 'Compiling list of IP-adresses associated with the username, "' . $username . '".');
		return $this->__get_array_from_query('SELECT address_ip FROM xfer_stat WHERE userid="' . $username . '" GROUP BY address_ip', $this->connection_handle);
	}

	function get_userquota_by_id($username) {
		$this->log_add_debug('get_userquota_by_id', 'Getting quota-settings for the username, "' . $username . '".');
		$result = array();

		$totals = $this->__get_array_from_query('SELECT * FROM ftpquotalimits WHERE name = "' . $username . '"', $this->connection_handle);
		if (count($totals) == 0) {
			$result['have_quota'] = false;
			return $result;
		} else {
			$used = $this->__get_array_from_query('SELECT * FROM ftpquotatallies WHERE name = "' . $username . '"', $this->connection_handle);
			if (count($used) == 0) {
				$result['used']['bytes_in_used']	= 0;
				$result['used']['bytes_out_used']	= 0;
				$result['used']['bytes_xfer_used']	= 0;
				$result['used']['files_in_used']	= 0;
				$result['used']['files_out_used']	= 0;
				$result['used']['files_xfer_used']	= 0;
			} else {
				$result['used'] = $used[0];
			}

			$result['total'] = $totals[0];
			$result['have_quota'] = true;
			return $result;
		}
	}

  	function get_vhuser_by_id($uid) {
		$this->log_add_debug('get_vhuser_by_id', 'Getting list of vhosts associated with the userid, "' . $uid . '".');
		return $this->__get_array_from_query('SELECT * FROM vhtable WHERE user_id="' . $uid . '"', $this->connection_handle);
	}

  	/* PowerDNS **************************************************************/
	function get_pdns_domains() {
		$this->log_add_debug('get_pdns_domains', 'Fetching all domains from pdns database');
		return $this->__get_array_from_query('SELECT * FROM domains ORDER BY name', $this->connection_handle);
	}

	function get_domain_id($dname) {
		$sql = mysql_query('SELECT id FROM domains WHERE name="' . $dname . '";', $this->connection_handle);
		$data = mysql_fetch_array($sql);
			$this->log_add_debug('get_domain_id', 'Fetching domain id from pdns database');
			return $data["id"];
	}

	function get_pdns_domain_edit_details($domain_id) {
		$sql = mysql_query('SELECT * FROM domains WHERE id="' . $domain_id . '";', $this->connection_handle);
		$data = mysql_fetch_array($sql);
			$this->log_add_debug('get_pdns_domain_edit_details', 'Fetching domain data from pdns database');
			return $data;
	}

	function get_pdns_domain_details($domainname) {
		$this->log_add_debug('get_pdns_domain_details', 'Fetching details for domain "'. $domainname  .'"');
		return $this->__get_array_from_query('SELECT domains.id, records.* FROM domains LEFT JOIN records ON domains.id=records.domain_id WHERE domains.name= "'. $domainname  .'" ORDER BY records.type DESC', $this->connection_handle);
	}

	function do_add_new_domain_record($domain_id, $domain_root, $domain_name, $domain_type, $domain_content, $domain_ttl, $domain_prio) {
		$this->log_add_debug('do_add_new_domain_record', 'Adding new rocord for domain "'. $domain_root .'"');
		$this->__do_basic_query('INSERT INTO records SET domain_id="' . $domain_id .
							  '", name="' . $domain_name . '", type="' . $domain_type .
							  '", content="' . $domain_content . '", ttl="' . $domain_ttl . '", prio="'. $domain_prio .'"');
	}

	function do_add_new_pdns_domain($dname, $dtype, $ip) {
		$this->log_add_debug('do_add_new_pdns_domain', 'Adding new pdns domain "'. $dname .'"');
		if ($ip != '') {
		$this->__do_basic_query('INSERT INTO domains SET name="'. $dname .'", type="'. $dtype .'", master="'. $ip .'"');
		} else {
		$this->__do_basic_query('INSERT INTO domains SET name="'. $dname .'", type="'. $dtype .'"');
		}
	}

	function do_edit_existing_domain($dname, $dtype, $master, $id) {
		$this->log_add_debug('do_edit_existing_domain', 'Changing existing pdns domain "'. $dname .'"');
		if ($master != '' && $dtype == 'SLAVE') {
		$this->__do_basic_query('UPDATE domains SET name="'. $dname .'", type="'. $dtype .'", master="'. $master .'" WHERE id="' . $id . '"');
		} else {
		$this->__do_basic_query('UPDATE domains SET name="'. $dname .'", type="'. $dtype .'", master=NULL WHERE id = "'. $id .'"');
		}
	}

	function do_edit_existing_domain_record($domain_name, $domain_type, $domain_content, $domain_ttl, $domain_prio, $domain_record_id) {
		$this->log_add_debug('do_edit_existing_domain_record', 'Editing existing domain rocord number id "'. $domain_record_id .'"');
		$this->__do_basic_query('UPDATE records SET name="' . $domain_name . '", type="' . $domain_type .
							  '", content="' . $domain_content . '", ttl="' . $domain_ttl . '", prio="'. $domain_prio .'" WHERE id="'. $domain_record_id .'"');
	}

	function do_delete_domain_record($id, $domainname) {
		$this->log_add_debug('do_delete_domain_record', 'Deleting a record in domain "' . $domainname . '".');
		$this->__do_basic_query('DELETE FROM records WHERE id="' . $id . '"');
	}

	function do_delete_whole_domain($domain_id, $domain) {
		$this->log_add_debug('do_delete_whole_domain', 'Deleting whole domain and all its records "' . $domain . '".');
		$this->__do_basic_query('DELETE FROM records WHERE domain_id="' . $domain_id . '"');
		$this->__do_basic_query('DELETE FROM domains WHERE id="' . $domain_id . '"');
	}

	/* Grouplist *************************************************************/
	function get_grouplist() {
		$this->log_add_debug('get_grouplist', 'Fetching data for groups');
		return $this->__get_array_from_query('SELECT * FROM grouptable ORDER by groupname', $this->connection_handle);
	}

	function do_add_group($groupname, $description = "") {
		$this->log_add_debug('do_add_group', 'Adding group, details in next "__do_basic_query"');
		$this->__do_basic_query('INSERT INTO grouptable SET groupname="' . $groupname . '", description="' . $description . '"');
	}

	function get_group_exists($groupname) {
		$sql = mysql_query('SELECT NULL FROM grouptable WHERE groupname="' . $groupname . '"', $this->connection_handle);
		if (mysql_num_rows($sql) == 0) {
			$this->log_add_debug('get_group_exists', 'Checking for existing group "' . $groupname . '"... none found');
			return false;
		} else {
			$this->log_add_debug('get_group_exists', 'Checking for existing group "' . $groupname . '"... group exist');
			return true;
		}
	}

	/* Groupview *************************************************************/
	function do_set_group($groupid, $description = "") {
		$this->log_add_debug('do_set_group', 'Altering group with id, "' . $groupid . '". Details in next "__do_basic_query"');
		$this->__do_basic_query('UPDATE grouptable SET description="' . $description . '" WHERE gid="' . $groupid . '"');
	}

	function get_grouplist_by_id($groupid) {
		$this->log_add_debug('get_grouplist_by_id', 'Fetching data for group with id "' . $groupid . '"');
		return $this->__get_array_from_query('SELECT * FROM grouptable WHERE gid = "' . $groupid . '"', $this->connection_handle);
	}

	function do_delete_group($groupid) {
		$this->log_add_debug('do_delete_group', 'Deleting group with groupid, "' . $groupid . '".');
		$this->__do_basic_query('DELETE FROM grouptable WHERE gid="' . $groupid . '"');
	}

	function get_groupmembers_main($groupid) {
		$this->log_add_debug('get_groupmembers_main', 'Fetching list of users that has a group with groupid, "' . $groupid . '", set as their primary group.');
		return $this->__get_array_from_query('SELECT userid, uid FROM usertable WHERE gid="' . $groupid . '"', $this->connection_handle);
	}


	/* Statistics ************************************************************/
	function get_stats_bycommand($command) {
		$this->log_add_debug('get_stats_bycommand', 'Compiling statistics based on the command, "' . $command . '".');
		return $this->__get_array_from_query('SELECT xfer_stat.userid, uid, sum(size) AS bytes , count(*) AS files, lastlogin FROM xfer_stat LEFT JOIN usertable ON usertable.userid=xfer_stat.userid WHERE command="' . $command . '" AND cmd="c" GROUP BY userid ORDER BY bytes DESC LIMIT ' . $GLOBALS['config_toplist_num_names'], $this->connection_handle);
	}

	function get_stats_bytimestamp($username = "total") {
		$this->log_add_debug('get_stats_bytimestamp', 'Compiling statistics based on various timespans.');
		$whereclause = ' (command="RETR" OR command="STOR") AND cmd="c"';
		if ($username != 'total') $whereclause = 'userid="' . $username . '" AND' . $whereclause;

		$results = array();
		array_push($results, $this->__get_stats_bytimestamp($GLOBALS['language']['util']['time_1hour'], 'SELECT SUM(size) AS bytes, command, COUNT(*) AS files FROM xfer_stat WHERE ' . $whereclause . ' AND time >= SUBDATE(NOW(), INTERVAL 1 HOUR) GROUP BY command'));
		array_push($results, $this->__get_stats_bytimestamp($GLOBALS['language']['util']['time_24hour'], 'SELECT SUM(size) AS bytes, command, COUNT(*) AS files FROM xfer_stat WHERE ' . $whereclause . ' AND time >= SUBDATE(NOW(), INTERVAL 24 HOUR) GROUP BY command'));
		array_push($results, $this->__get_stats_bytimestamp($GLOBALS['language']['util']['time_7days'], 'SELECT SUM(size) AS bytes, command, COUNT(*) AS files FROM xfer_stat WHERE ' . $whereclause . ' AND time >= SUBDATE(NOW(), INTERVAL 7 DAY) GROUP BY command'));
		array_push($results, $this->__get_stats_bytimestamp($GLOBALS['language']['util']['time_30days'], 'SELECT SUM(size) AS bytes, command, COUNT(*) AS files FROM xfer_stat WHERE ' . $whereclause . ' AND time >= SUBDATE(NOW(), INTERVAL 30 DAY) GROUP BY command'));
		array_push($results, $this->__get_stats_bytimestamp($GLOBALS['language']['util']['time_total'], 'SELECT SUM(size) AS bytes, command, COUNT(*) AS files FROM xfer_stat WHERE ' . $whereclause . ' GROUP BY command'));
		return $results;
	}

	function get_stats_bysection($path, $ftp_command, $username="total") {
		$this->log_add_debug('get_stats_bysection', 'Compiling statistics based on the various defined sections.');
		$whereclause = ' command="' . $ftp_command . '" AND cmd="c" ';
		if ($username != 'total') $whereclause =  'xfer_stat.userid="' . $username . '" AND ' . $whereclause;

		return $this->__get_array_from_query('SELECT xfer_stat.userid, uid, SUM(size) AS file_size, COUNT(*) AS num_files FROM xfer_stat LEFT JOIN usertable ON xfer_stat.userid=usertable.userid WHERE ' . $whereclause . ' AND file LIKE "' . $path . '%" GROUP BY xfer_stat.userid');
	}

	function get_stats_logs($skipped, $username="total") {
		if ($username == "total") {
			$this->log_add_debug('get_stats_logs', 'Getting logs for all users');
			return $this->__get_array_from_query('SELECT * FROM xfer_stat WHERE cmd="c" ORDER BY time DESC LIMIT ' . $skipped . ',' . $GLOBALS['config_userview_logitems']);

		} else {
			$this->log_add_debug('get_stats_logs', 'Getting logs related to username "' . $username . '"');
			return $this->__get_array_from_query('SELECT * FROM xfer_stat WHERE userid="' . $username . '" AND cmd="c" ORDER BY time DESC LIMIT ' . $skipped . ',' . $GLOBALS['config_userview_logitems']);
		}
	}

	/* Transfers *************************************************************/
	function do_delete_logs($date) {
		$this->log_add_debug('do_delete_logs', 'Deleting all log-items older than ' . $date);

		$this->__do_basic_query('DELETE FROM xfer_stat WHERE time <= "' . $date . '"');
		return mysql_affected_rows($this->connection_handle);
	}

	function get_transfer_logs($date) {
		$data = $this->__get_array_from_query('SELECT * FROM xfer_stat WHERE time <= "' . $date . '" ORDER BY time');
		$this->do_delete_logs($date);
		return $data;
	}

	/* Status ****************************************************************/
	function get_db_status() {
		$this->log_add_debug('get_db_status', 'Compiling statistics based on database status.');
		$result = array();

		/* Table statistics */
		$stats = array();
		$stats['name']		= $GLOBALS['language']['status']['db_sec_tablestats'];
		$stats['category'] 	= array();
		$stats['values'] 	= array();

		array_push($stats['category'], $GLOBALS['language']['status']['db_tablename']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_rows']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_rowformat']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_tablesize']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_created']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_updated']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_checktime']);

		$tabledata = $this->__get_array_from_query('SHOW TABLE STATUS');
		foreach ($tabledata as $data) {
			$el = array();

			$el[0] = $data['Name'];
			$el[1] = $data['Rows'];
			$el[2] = $data['Row_format'];
			$el[3] = number_format((($data['Data_length'] + $data['Index_length']) / 1024), 2) . ' KB';
			$el[4] = $data['Create_time'];
			$el[5] = $data['Update_time'];
			$el[6] = $data['Check_time'];

			array_push($stats['values'], $el);
		}
		array_push($result, $stats);
		unset($stats);


		/* Processlist */
		$stats = array();
		$stats['name']		= $GLOBALS['language']['status']['db_sec_processes'];
		$stats['category'] 	= array();
		$stats['values'] 	= array();

		array_push($stats['category'], $GLOBALS['language']['status']['db_process_user']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_process_db']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_process_cmd']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_process_time']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_process_state']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_process_info']);

		$tabledata = $this->__get_array_from_query('SHOW PROCESSLIST');
		foreach ($tabledata as $data) {
			//if($data['db'] != $this->db_database) continue;

			$el = array();
			$el[0] = $data['User'] . '@' . $data['Host'];
			$el[1] = $data['db'];
			$el[2] = $data['Command'];
			$el[3] = $data['Time'];
			$el[4] = $data['State'];
			$el[5] = $data['Info'];

			array_push($stats['values'], $el);
		}
		array_push($result, $stats);
		unset($stats);


		/* Database status */
		$stats = array();
		$stats['name']		= $GLOBALS['language']['status']['db_sec_status'];
		$stats['category'] 	= array();
		$stats['values'] 	= array();

		array_push($stats['category'], $GLOBALS['language']['status']['db_var_name']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_var_value']);
		array_push($stats['category'], '&nbsp;');
		array_push($stats['category'], $GLOBALS['language']['status']['db_var_name']);
		array_push($stats['category'], $GLOBALS['language']['status']['db_var_value']);

		$status_data = $this->__do_split_and_pad($this->__get_array_from_query('SHOW STATUS'));
		for ($i = 0; $i < count($status_data[0]); $i++) {
			$element = array($status_data[0][$i][0], $status_data[0][$i][1], '&nbsp;&nbsp;&nbsp;&nbsp;', $status_data[1][$i][0], $status_data[1][$i][1]);
			array_push($stats['values'], $element);
		}
		array_push($result, $stats);
		unset($stats);

		return $result;
	}

	/* Status ****************************************************************/
	function get_authentication_uid($username, $password) {
		$username = addslashes($username);
		$password = addslashes($password);

		$data = $this->__get_array_from_query('SELECT uid FROM usertable WHERE userid="' . $username . '" AND passwd=PASSWORD("' . $password . '")');
		if (count($data) == 0) return -1;
		else return $data[0]['uid'];
	}

	/*************************************************************************
	 * Private functions intended for internal usage only.                   *
	 *************************************************************************/
	function __get_stats_bytimestamp($label, $query) {
		$this->log_add_debug('__get_stats_' . str_replace(' ', '_', $label), $query);
		$data = array();
		$query = mysql_query($query);
		while ($row = mysql_fetch_array($query)) $data[$row["command"]] = $row;
		$data['label'] = $label;
		return $data;
	}

	function __do_basic_query($query) {
		if (!$this->is_ready()) {
			$this->log_additem('__do_basic_query', 'Connection to database not ready!');
		} else {
			$this->log_add_debug('__do_basic_query', $query);

			mysql_query($query, $this->connection_handle);
			if (strlen(mysql_error()) > 0) {
				$this->log_additem('__do_basic_query', 	'SQL: ' . $query);
				$this->log_additem('__do_basic_query', 	'SQL-error: ' . mysql_error());
			}
		}
	}

	function __get_oneresult_from_query($query) {
		$this->log_add_debug('__get_oneresult_from_query', $query);
		$result = array();

		$sql = mysql_query($query, $this->connection_handle);
		if (strlen(mysql_error()) > 0) {
				$this->log_additem('__get_oneresult_from_query', 'SQL-error: ' . mysql_error());
				return $result;
		}

		return mysql_fetch_array($sql);
	}

	function __get_array_from_query($query) {
		$this->log_add_debug('__get_array_from_query', $query);
		$result = array();

		$sql = mysql_query($query, $this->connection_handle);
		if (strlen(mysql_error()) > 0) {
				$this->log_additem('__get_array_from_query', 'SQL-error: ' . mysql_error());
				return $result;
		}

		while ($row = mysql_fetch_array($sql) ) array_push($result, $row);
		return $result;
	}

	function __do_split_and_pad($list) {
		$new_list[0] = array();
		$new_list[1] = array();

		if (count($list) == 0) return $new_list;

		for ($i = 0; $i < ((int)(count($list) / 2)); $i++) {
			array_push($new_list[0], $list[$i]);
		}

		for ($i = (int)(count($list) / 2); $i < count($list); $i++) {
			array_push($new_list[1], $list[$i]);
		}

		if (count($new_list[0]) != count($new_list[1])) {
			$element = $list[0];
			foreach ($element as $key=>$value) {
				$element[$key] = '&nbsp;';
			}
			array_push($new_list[1], $element);
		}

		return $new_list;
	}
}
?>