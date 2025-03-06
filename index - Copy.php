<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'https://'; //this is http
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/goracings/');
	exit;
?>
Something is wrong with the XAMPP installation :-(
