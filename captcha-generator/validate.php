<?php 
	session_start();
	if($_SESSION['secure'] == $_POST['user_captcha']){
	  echo "captcha validated.";
	} 
	else{
	  echo "captcha validation failed.";
	}
?>