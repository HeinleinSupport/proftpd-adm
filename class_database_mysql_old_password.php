<?php
require_once('class_database_mysql.php');

class MySQL_OLD extends MySQL {
	function MySQL_OLD() {
		/* Run constructor for parent class to make sure variables are set. */
		$this->MySQL();

		$this->log_add_debug('Initialization', 'Class: MySQL_OLD');
	}

	function do_add_user($username, $password, $homedir, $shell,
			     $main_group, $expiration, $disabled,
			     $name, $mail, $address, $notes, $sshkey) {
		$this->log_add_debug('do_add_user', 'Adding user, details in next "__do_basic_query"');
		$this->__do_basic_query('INSERT INTO usertable SET userid="' . $username .
							  '", passwd=OLD_PASSWORD("' . $password . '"), homedir="' . $homedir .
							  '", shell="' . $shell . '", gid="' . $main_group . '", expiration="' .
							  $expiration . '", disabled="' . $disabled . '", det_name="' . @$name .
							  '", det_mail="' . @$mail . '", det_adress="' . @$address .
							  '", det_notes="' . @$notes . '", sshkey="' . @$sshkey . '"');
		$this->last_added_userid = mysql_insert_id($this->connection_handle);
	}

	function do_set_user_password($userid, $password) {
		$this->log_add_debug('do_set_user_password', 'Setting password for account with userid "' .
							 $userid . '" to ' . $password);
		$this->__do_basic_query('UPDATE usertable SET passwd=OLD_PASSWORD("' . $password . '") WHERE uid="' . $userid . '"');
	}

	/* Status ****************************************************************/
	function get_authentication_uid($username, $password) {
		$username = addslashes($username);
		$password = addslashes($password);

		$data = $this->__get_array_from_query('SELECT uid FROM usertable WHERE userid="' . $username . '" AND passwd=OLD_PASSWORD("' . $password . '")');
		if (count($data) == 0) return -1;
		else return $data[0]['uid'];
	}
}
?>