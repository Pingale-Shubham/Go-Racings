<?php
session_start();

if(isset($_POST['sessionValue'])) {
    // Retrieve the value sent from JavaScript
    $sessionValue = $_POST['sessionValue'];

    // Do something with the value, for example, store it in $_SESSION
    $_SESSION['CaptchaValue'] = $sessionValue;
}
?>
