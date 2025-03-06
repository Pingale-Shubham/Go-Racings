<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredOTP = $_POST['UserMobileNumberOTP'];

    // Retrieve the OTP stored in session
    $storedOTP = $_SESSION['grotp'];

    if ($enteredOTP == $storedOTP) {
        echo 'success';
        // Optionally, you can unset the OTP session variable after successful verification
        // unset($_SESSION['grotp']);
    } else {
        echo 'Incorrect OTP. Please try again.';
    }
}
?>
