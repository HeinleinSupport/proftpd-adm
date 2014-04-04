<?php
	if (isset($_POST['frm_ui_topnames']) || isset($_POST['frm_ui_logitems']) ||
		isset($_POST['frm_ui_padtop']) || isset($_POST['frm_ui_striplog']) ||
		isset($_POST['frm_ui_onlysys']) || isset($_POST['frm_ui_style']) ||
		isset($_POST['frm_ui_language']) || isset($_POST['frm_ui_sel_quota'])) {

		$config_toplist_num_names = (int)$_POST['frm_ui_topnames'];
		$config_userview_logitems = (int)$_POST['frm_ui_logitems'];
		$config_toplist_padlist = $_POST['frm_ui_padtop'];
		$config_userview_striplogpath = $_POST['frm_ui_striplog'];
		$config_sysinfo_only = $_POST['frm_ui_onlysys'];
		$config_style_name = $_POST['frm_ui_style'];
		$config_language = $_POST['frm_ui_language'];
		$config_ext['quota']['select_quota'] = $_POST['frm_ui_sel_quota'];
		$writeconfig = true;
	}
?>