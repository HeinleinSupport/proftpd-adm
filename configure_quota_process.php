<?php
	if (isset($_POST['frm_quota_turn']) || isset($_POST['frm_quota_turndefaulttype']) ||
		isset($_POST['frm_quota_turndefaultlimit']) || isset($_POST['frm_quota_turndefaultpersession']) ||
		isset($_POST['frm_quota_down_mb']) || isset($_POST['frm_quota_down_files']) ||
		isset($_POST['frm_quota_up_mb']) || isset($_POST['frm_quota_up_files']) ||
		isset($_POST['frm_quota_trans_mb']) || isset($_POST['frm_quota_trans_files'])) {

		$config_ext['quota']['enabled'] 	= @$_POST['frm_quota_turn'];
		$config_ext['quota']['type']		= @$_POST['frm_quota_turndefaulttype'];
		$config_ext['quota']['limittype']	= @$_POST['frm_quota_turndefaultlimit'];
		$config_ext['quota']['per_session']	= @$_POST['frm_quota_turndefaultpersession'];

		$config_ext['quota']['down_files'] 	= @$_POST['frm_quota_down_files'];
		$config_ext['quota']['up_files']	= @$_POST['frm_quota_up_files'];
		$config_ext['quota']['trans_files']	= @$_POST['frm_quota_trans_files'];

		$config_ext['quota']['down_mb'] 	= @$_POST['frm_quota_down_mb'];
		$config_ext['quota']['up_mb']		= @$_POST['frm_quota_up_mb'];
		$config_ext['quota']['trans_mb']	= @$_POST['frm_quota_trans_mb'];

		$writeconfig = true;
	}
?>