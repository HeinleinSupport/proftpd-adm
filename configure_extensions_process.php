<?php
	if (isset($_POST['frm_enable_vhost']) || isset($_POST['frm_enable_quota']) || isset($_POST['frm_enable_pdns'])) {

		if (isset($_POST['frm_enable_vhost'])) $config_ext['vhosts']['enabled']	= @$_POST['frm_enable_vhost'];
		if (isset($_POST['frm_enable_quota'])) $config_ext['quota']['enabled'] 	= @$_POST['frm_enable_quota'];
		if (isset($_POST['frm_enable_pdns'])) $config_ext['pdns']['enabled']	= @$_POST['frm_enable_pdns'];

		$writeconfig = true;
	}
?>