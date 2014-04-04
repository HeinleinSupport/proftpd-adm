<?php
require_once('include_config.php');

class Database {
	var $error_log 			= array();
	var $db_host			= '';
	var $db_username		= '';
	var $db_password		= '';
	var $db_database		= '';
	var $last_added_userid  = -1;

	var $debug_mode			= false;
	var $connected			= false;
	var $selected_database	= false;
	var $connection_handle;

	function Database() {
		$this->db_host 		= $GLOBALS['config_database_host'];
		$this->db_username 	= $GLOBALS['config_database_user'];
		$this->db_password 	= $GLOBALS['config_database_passord'];
		$this->db_database 	= $GLOBALS['config_database_database'];

		$this->log_add_debug('Initialization', 'Class: Database');
	}

	function is_ready() {
		if (!$this->connected || !$this->selected_database) return false;
		else return true;
	}

	function log_has_errors() {
		return count($this->error_log) != 0;
	}

	function log_additem($category = "", $description) {
		$item = array("category" => $category, "description" => $description, 'debug' => false);
		array_push($this->error_log, $item);
	}

	function log_add_debug($category = "", $description) {
		if ($this->debug_mode) {
			$item = array('category' => $category, 'description' => $description, 'debug' => true);
			array_push($this->error_log, $item);
		}
	}

	function log_fetchlog() {
		return $this->error_log;
	}

	function log_dumplog() {
		if ($this->log_has_errors()) {
			echo "Logged database errors:\n";

			foreach($this->error_log as $item) {
				echo "\t" . $item['category'] . ': ' . $item['description'] . "\n";
			}
		} else {
			print "No database errors logged\n";
		}
	}

	/*************************************************************************
	 * Dummy functions to be replaced by inheriting classes.                 *
	 *************************************************************************/
	// Generic database functions
	function do_connect() { $this->log_additem('do_connect', 'Function not implemented yet!'); }
	function do_select_db() { $this->log_additem('do_select_db', 'Function not implemented yet!'); }
	function get_table_exists($tablename) { $this->log_additem('get_table_exists', 'Function not implemented yet!'); }
	function get_quotas_exists() { $this->log_additem('get_quotas_exists', 'Function not implemented yet!'); }

	function get_USERNAMEbyUID($uid) { $this->log_additem('getUIDbyUSERNAME', 'Function not implemented yet!'); }
	function get_UIDbyUSERNAME($username) { $this->log_additem('getUIDbyUSERNAME', 'Function not implemented yet!'); }
	function get_GIDbyGROUPNAME($groupname) { $this->log_additem('get_GIDbyGROUPNAME', 'Function not implemented yet!'); }
	function get_UID_exists($userid) { $this->log_additem('get_UID_exists', 'Function not implemented yet!'); }
	function get_GID_exists($groupid) { $this->log_additem('get_GID_exists', 'Function not implemented yet!'); }

	// Userlist
	function do_add_user($username, $password, $homedir, $shell, $main_group, $expiration, $disabled, $name, $mail, $address, $notes) { $this->log_additem('do_add_user', 'Function not implemented yet!'); }
	function do_add_quota($username, $quota) { $this->log_additem('do_add_quota', 'Function not implemented yet!'); }
	function get_group_data($username) { $this->log_additem('get_group_data', 'Function not implemented yet!'); }
	function get_userlist() { $this->log_additem('get_userlist', 'Function not implemented yet!'); }
	function get_userquota() { $this->log_additem('get_userquota', 'Function not implemented yet!'); }
	function get_last_added_userid() { return $this->last_added_userid; }

	// User view
	function do_add_default_quota($username) { $this->log_additem('do_add_default_quota', 'Function not implemented yet!'); }
	function do_delete_user($userid) { $this->log_additem('do_delete_user', 'Function not implemented yet!'); }
	function do_delete_quota($username) { $this->log_additem('do_delete_quota', 'Function not implemented yet!'); }
	function do_set_user_expiration($userid, $expiration) { $this->log_additem('do_set_user_expiration', 'Function not implemented yet!'); }
	function do_set_user_password($userid, $expiration) { $this->log_additem('do_set_user_password', 'Function not implemented yet!'); }
	function do_set_user_primarygroup($userid, $groupid) { $this->log_additem('do_set_user_primarygroup', 'Function not implemented yet!'); }
	function do_user_joingroup($username, $groupid) { $this->log_additem('do_user_joingroup', 'Function not implemented yet!'); }
	function do_user_leavegroup($username, $groupid) { $this->log_additem('do_user_leavegroup', 'Function not implemented yet!'); }
	function do_set_user($userid, $shell, $disabled, $homedir, $det_name, $det_mail, $det_adress, $det_notes) { $this->log_additem('do_set_user', 'Function not implemented yet!'); }
	function do_set_quota($username, $quota_persession, $quota_limittype, $upload_byteondisk, $download_bytefromdisk, $transfer_byteinout, $upload_fileondisk, $download_filefromdisk, $transfer_fileinout) { $this->log_additem('do_set_quota', 'Function not implemented yet!'); }
	function do_add_vhuser($username, $homedir, $uid, $pdns, $type, $content, $ttl, $prio) { $this->log_additem('do_add_vhuser', 'Function not implemented yet!'); }
	function do_delete_vhuser($uid) { $this->log_additem('do_delete_vhuser', 'Function not implemented yet!'); }
	function do_delete_one_vhuser($vhostname, $pdns) { $this->log_additem('do_delete_one_vhuser', 'Function not implemented yet!'); }
	function get_user_exists($username) { $this->log_additem('get_user_exists', 'Function not implemented yet!'); }
	function get_userlist_by_id($userid) { $this->log_additem('get_userid_exists', 'Function not implemented yet!'); }
	function get_userquota_by_id($userid) { $this->log_additem('get_userquota_by_id', 'Function not implemented yet!'); }
	function get_associated_ipadresses($username) { $this->log_additem('get_associated_ipadresses', 'Function not implemented yet!'); }
  	function get_vhuser_by_id($uid) { $this->log_additem('get_vhuser_by_id', 'Function not implemented yet!'); }

	// PowerDNS
	function get_pdns_domains() { $this->log_additem('get_pdns_domains', 'Function not implemented yet!'); }
	function get_domain_id($dname) { $this->log_additem('get_domain_id', 'Function not implemented yet!'); }
	function get_pdns_domain_edit_details($domain_id) { $this->log_additem('get_pdns_domain_edit_details', 'Function not implemented yet!'); }
	function get_pdns_domain_details($domainname) { $this->log_additem('get_pdns_domain_details', 'Function not implemented yet!'); }
	function do_add_new_domain_record($domain_id, $domain_root, $domain_name, $domain_type, $domain_content, $domain_ttl, $domain_prio) { $this->log_additem('do_add_new_domain_record', 'Function not implemented yet!'); }
	function do_add_new_pdns_domain($dname, $dtype, $ip) { $this->log_additem('do_add_new_pdns_domain', 'Function not implemented yet!'); }
	function do_edit_existing_domain($dname, $dtype, $master, $id) { $this->log_additem('do_edit_existing_domain', 'Function not implemented yet!'); }
	function do_edit_existing_domain_record($domain_name, $domain_type, $domain_content, $domain_ttl, $domain_prio, $domain_record_id) { $this->log_additem('do_edit_existing_domain_record', 'Function not implemented yet!'); }
	function do_delete_domain_record($id, $domainname) { $this->log_additem('do_delete_domain_record', 'Function not implemented yet!'); }
	function do_delete_whole_domain($domain_id, $domain) { $this->log_additem('do_delete_whole_domain', 'Function not implemented yet!'); }

	// Grouplist
	function do_add_group($groupname, $description = "") { $this->log_additem('do_add_group', 'Function not implemented yet!'); }
	function get_grouplist() { $this->log_additem('get_grouplist', 'Function not implemented yet!'); }

	// Groupview
	function do_set_group($groupid, $description = "") { $this->log_additem('do_set_group', 'Function not implemented yet!'); }
	function do_delete_group($groupid) { $this->log_additem('do_delete_group', 'Function not implemented yet!'); }
	function get_grouplist_by_id($groupid) { $this->log_additem('get_grouplist_by_id', 'Function not implemented yet!'); }
	function get_groupmembers_main($groupid) { $this->log_additem('get_groupmembers_main', 'Function not implemented yet!'); }

	// Statistics
	function get_stats_bycommand($command) { $this->log_additem('get_stats_bycommand', 'Function not implemented yet!'); }
	function get_stats_bytimestamp($username="total") { $this->log_additem('get_stats_bycommand', 'Function not implemented yet!'); }
	function get_stats_bysection($path, $ftp_command, $username="total") { $this->log_additem('get_stats_bysection', 'Function not implemented yet!'); }
	function get_stats_logs($skipped, $username="total") { $this->log_additem('get_stats_bysection', 'Function not implemented yet!'); }

	// Transfers
	function do_delete_logs($date) { $this->log_additem('do_delete_logs', 'Function not implemented yet!'); }

	// Status
	function get_db_status() { $this->log_additem('get_db_status', 'Function not implemented yet!'); }

	// User information
	function get_authentication_uid($username, $password) { $this->log_additem('get_authentication_uid', 'Function not implemented yet!'); }

	/*************************************************************************
	 * Private functions intended for internal usage only.                   *
	 *************************************************************************/
}
?>
