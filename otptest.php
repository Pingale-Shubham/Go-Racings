<?php
// Start the session
session_start();

if (isset($_SESSION['LECaptcha']) && $_SESSION['LECaptcha'] === "yes") {
  $emailCaptcha = true;
} else {
  $error_message = "User need to fill correct catcha.";
  $emailCaptcha = false;
}
$color = "brown";
// Check if the session variable is set
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true && $emailCaptcha === true) {

  $LogInshowButton = true;
  $LogInWith = $_SESSION["loginCredential"];

  $error_message = "Welcome to GoRacings.";

  // JavaScript code to create a popup alert with yellow color
  echo '<script>';
  echo 'setTimeout(function() {';
  echo '    var alertMessage = document.createElement("div");';
  echo '    alertMessage.innerHTML = "' . $error_message . '";';
  echo '    alertMessage.style.backgroundColor = "yellow";'; // Set background color to yellow
  echo '    alertMessage.style.color = "black";'; // Set text color to black
  echo '    alertMessage.style.padding = "10px";'; // Add padding for better visibility
  echo '    alertMessage.style.position = "fixed";'; // Position the alert message
  echo '    alertMessage.style.top = "0";'; // Position at the top of the page
  echo '    alertMessage.style.left = "50%";'; // Position horizontally in the middle
  echo '    alertMessage.style.transform = "translateX(-50%)";'; // Center horizontally
  echo '    alertMessage.style.zIndex = "9999";'; // Set z-index to ensure it's on top of other elements
  echo '    document.body.appendChild(alertMessage);'; // Append the alert message to the body
  echo '    setTimeout(function() {';
  echo '        alertMessage.remove();'; // Remove the alert message after 15 seconds
  echo '    }, 15 * 1000);'; // Display alert for 15 seconds (15 * 1000 milliseconds)
  echo '}, 100);'; // Delay alert display by 100 milliseconds to ensure it's shown after page load
  echo '</script>';
} else {
  $LogInshowButton = false;

  if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === false) {
    $error_message = "Use correct credentials.";
  } else {
    if (isset($_SESSION['RePassword']) && $_SESSION['RePassword'] == false) {
      $error_message = "Wrong emailID entered.";
    } else if (isset($_SESSION['RePassword']) && $_SESSION['RePassword'] == true) {

      $error_message = "Reset email send to your emailID.";
    } else {
      $error_message = "User must be login.";
    }
  }
  // JavaScript code to display styled popup alert
  echo '<script>';
  echo 'setTimeout(function() {';
  echo '    var alertMessage = document.createElement("div");';
  echo '    alertMessage.innerHTML = "' . $error_message . '";';
  echo '    alertMessage.style.backgroundColor = "yellow";'; // Set background color to yellow
  echo '    alertMessage.style.color = "black";'; // Set text color to black
  echo '    alertMessage.style.padding = "10px";'; // Add padding for better visibility
  echo '    alertMessage.style.fontSize = "15px";';
  echo '    alertMessage.style.position = "fixed";'; // Position the alert message
  echo '    alertMessage.style.top = "0";'; // Position at the top of the page
  echo '    alertMessage.style.left = "50%";'; // Position horizontally in the middle
  echo '    alertMessage.style.transform = "translateX(-50%)";'; // Center horizontally
  echo '    alertMessage.style.zIndex = "9999";'; // Set z-index to ensure it's on top of other elements
  echo '    document.body.appendChild(alertMessage);'; // Append the alert message to the body
  echo '    setTimeout(function() {';
  echo '        alertMessage.remove();'; // Remove the alert message after 15 seconds
  echo '    }, 15 * 1000);'; // Display alert for 15 seconds (15 * 1000 milliseconds)
  echo '}, 100);'; // Delay alert display by 100 milliseconds to ensure it's shown after page load
  echo '</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta charset="utf-8">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <title>GoRacings - Speed to win</title>
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <div class="login-container">
    <div id="otp-form">
      <h3>Login with OTP</h3>
      <form action="signin.php" method="POST">
        <input type="tel" id="UserMobileNumber" name="UserMobileNumber" placeholder="Enter Mobile Number" required>
        <button type="button" id="send-otp-btn" onclick="sendOTP()">Send OTP</button>
        <input type="text" id="UserMobileNumberOTP" name="UserMobileNumberOTP" placeholder="Enter Received OTP"
          required>
        <button type="button" id="verify_otp_button" onclick="verifyOTP()">Verify OTP</button>
        <button type="submit" id="login_button" disabled>Login</button>
        <p>Don't have an account? <a href="register.php">Register</a></p>
      </form>
    </div>
    <script>
      function sendOTP() {
        const mobileNumber = document.getElementById('UserMobileNumber').value;
        if (mobileNumber === '') {
          alert('Please enter a mobile number.');
          return;
        }
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'otp_login.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.status === 'success') {
              alert(response.message);
              document.getElementById('UserMobileNumberOTP').disabled = false;
              document.getElementById('verify_otp_button').disabled = false;
            } else {
              alert(response.message);
            }
          }
        };
        const params = 'ajax=1&UserMobileNumber=' + encodeURIComponent(mobileNumber);
        xhr.send(params);
      }
      function verifyOTP() {
        const enteredOTP = document.getElementById('UserMobileNumberOTP').value;
        if (enteredOTP === '') {
          alert('Please enter the OTP.');
          return;
        }
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'v_OTP.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.status === 'success') {
              alert('OTP verified successfully!');
              document.querySelector('button[type="submit"]').disabled = false;
            } else {
              alert('OTP verification failed: ' + response.message);
            }
          }
        };
        const params = 'UserMobileNumberOTP=' + encodeURIComponent(enteredOTP);
        xhr.send(params);
      }
      window.onload = function () {
        document.getElementById('UserMobileNumberOTP').disabled = true;
        document.getElementById('verify_otp_button').disabled = true;
        document.querySelector('button[type="submit"]').disabled = true;
      };
    </script>
    </div>
</body>
</html>