<?php
if (!isset($config_language)) $config_language == 'english';
else {
	/* Language support is still limited, and due to the ongoing development we
	 * first load the english language in order to assure that untranslated
	 * text doesn't appear a blank space.
	 */
	require_once('language_english.php');
	switch ($config_language) {
		default:
		case 'english':
			require_once('language_english.php');
			break;
		case 'hungarian':
			require_once('language_hungarian.php');
			break;
		case 'norwegian':
			require_once('language_norwegian.php');
			break;
	}
}
?>