<?php
//GENERATING RANDOM 4 CHARACTER FOR CAPTCHA
  $string='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefhijklmnopqrstuvwxyz1234567890';
  $string_shuff=str_shuffle($string);
  $text=substr($string_shuff,0,4);

//STARTING AND CREATING SESSION
  session_start();
  unset($_SESSION['LECaptcha']);
  $_SESSION['secure']=$text;
?>
<div style="width: 150px;height: 50px; ">
  <img src="captcha-generator/img_gen.php">
</div> 
