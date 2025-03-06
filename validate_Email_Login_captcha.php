<?php
session_start();

// Assuming your captcha validation logic here
$captchaValue = isset($_SESSION['secure']) ? $_SESSION['secure'] : "";

// Get the user input from AJAX request
$userCaptcha = isset($_POST['userCaptcha']) ? $_POST['userCaptcha'] : "";

// Validate captcha
if ($userCaptcha === $captchaValue) {
  echo "valid";
} else {
  echo "invalid";
}
?>
