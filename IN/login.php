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
<html lang="hi">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta charset="utf-8">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    async function checkStatus() {
      try {
        const response = await fetch('gRconnection.php');
        const data = await response.json();
        const statusDot = document.getElementById('status-dot');
        if (data.connected) {
          statusDot.classList.add('connected');
          statusDot.classList.remove('disconnected');
        } else {
          statusDot.classList.add('disconnected');
          statusDot.classList.remove('connected');
        }
      } catch (error) {
        console.error('Error fetching status:', error);
        const statusDot = document.getElementById('status-dot');
        statusDot.classList.add('disconnected');
        statusDot.classList.remove('connected');
      }
    }

    // Check status on page load
    checkStatus();

    // Optionally, check status periodically
    setInterval(checkStatus, 5000); // every 5 seconds
  </script>
  <script>
    $(document).ready(function () {
      $('.dropdown-service, .dropdown-norms').click(function (event) {
        event.preventDefault();
        alert('You need to first login to access this ');
      });
    });
  </script>
  <title>GoRacings - Speed to win</title>
  <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <link rel="stylesheet" href="assets/css/login.css">

</head>

<body>
  <div class="sub-header-1">
    <div class="logo">
      <a href="index.php">
        <img src="images/goracingslogo.png" alt="Go Race"></a>
      <h4><span id="go">Go</span><span id="race">Racings</span></h4>
    </div>
    <div class="help-num">
      <p>सहायत्ता नंबर : +91 02040008444</p>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <nav class="main-nav">
        <!-- ***** Menu Start ***** -->
        <ul class="nav">
          <li><a href="index.php" class="active">होम</a></li>
          <li class="dropdown-service">
            <button>सेवाएँ</button>
            <div class="dropdown-menu">
              <a href="#">रेस दर्शक टिकट बुकिंग</a>
              <a href="#">रेस दर्शक टिकट रद्दीकरण</a>
              <a href="#">रेस प्रतिभागी भाग लेते हैं</a>
              <a href="#">रेस भागीदारी रद्द</a>
              <a href="#">रेस आयोजक रेस आयोजित करते हैं</a>
              <a href="#">रेस आयोजक रेस रद्द करते हैं</a>
              <a href="#">रेस विज्ञापन</a>
            </div>
          </li>
          <li><a href="gallery.php">गैलरी</a></li>
          <li class="dropdown-norms">
            <button>रेसिंग नियम</button>
            <div class="dropdown-menu">
              <a href="racingnorms.php">रेसिंग नियम</a>
            </div>
          </li>
          <li><a href="login.php"><i class="fa fa-user"></i>  लॉगिन/रजिस्टर</a></li>
        </ul>
        <a class='menu-trigger'> 
          <span>Menu</span>
        </a>
        <!-- ***** Menu End ***** -->
      </nav>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** second sub Headerr Area start ***** -->
  <div class="sub-header-2">
    <div class="columns">
      <!-- <div class="connect" id="connectionStatus"> -->
    </div>
  </div>
  </div>
  <!-- ***** second sub Headerr Area End ***** -->

  <!-- login form -->

  <div class="login-container">
    <h2>Login</h2>
    <div class="login-options">
      <button onclick="showOTPForm()">OTP के साथ लॉगिन करें</button>
      <button onclick="showEmailForm()">ईमेल के साथ लॉगिन करें</button>
    </div>
    <div id="otp-form" style="display:none">
      <h3>OTP के साथ लॉगिन करें</h3>
      <form action="signin.php" method="POST">
        <input type="tel" id="UserMobileNumber" name="UserMobileNumber" placeholder="मोबाइल नंबर दर्ज करें" required>
        <button type="button" id="send-otp-btn" onclick="sendOTP()">OTP भेजें</button>
        <input type="text" id="UserMobileNumberOTP" name="UserMobileNumberOTP" placeholder="प्राप्त OTP दर्ज करें" required>
        <button type="button" id="verify_otp_button" onclick="verifyOTP()">सत्यापित करें OTP</button>
        <button type="submit" id="login_button" disabled>लॉगिन</button>
        <p>Don't have an account? <a href="register.php">रजिस्टर करें</a></p>
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
    <div id="email-form" style="display: none;">
      <h3>ईमेल के साथ लॉगिन करें</h3>
      <form action="signin.php" method="POST">
        <table>
          <tr>
            <td><label for="UserEmailID">ईमेल:</label></td>
            <td><input type="email" id="UserEmailID" name="UserEmailID" placeholder="ईमेल दर्ज करें" required>
            </td>
          </tr>
          <tr>
            <td><label for="UserEmailPasscode">पासवर्ड:</label></td>
            <td class="password-container">
              <input type="password" id="UserEmailPasscode" name="UserEmailPasscode">
              <span class="password-toggle" onclick="togglePassword('UserEmailPasscode', 'toggleIcon2')">
                <img src="images/eye.png" alt="Show/Hide Password" id="toggleIcon2">
              </span>
            </td>
          </tr>
          <script>
            function togglePassword(passwordFieldId, toggleIconId) {
              const passwordInput = document.getElementById(passwordFieldId);
              const toggleIcon = document.getElementById(toggleIconId);

              if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.src = 'images/eye.png'; // Change the image source when password is visible
              } else {
                passwordInput.type = 'password';
                toggleIcon.src = 'images/eye.png'; // Change the image source when password is hidden
              }
            }
          </script>
          <tr>
            <td><label for="captcha">कॅप्चा:</label></td>
            <td>
              <div id="ae_captcha_api"></div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="captchafield">
                <div class="verifycaptcha">
                  <button type="button" onclick="validateRefreshCaptcha()">सत्यापित करें</button>
                </div>
                <div class="captchacheckbox">
                  <input type="checkbox" id="captchaCheckbox" disabled></input>
                  <!-- <i class="fa fa-check-square" aria-hidden="true"></i> -->
                </div>
              </div>
            </td>
            <td><input type="text"  placeholder="केप्चा भरे" name="user_captcha" id="user_captcha" /></td>
          </tr>
        </table>


        <script>
          function validateCaptcha() {

            // Get the user input
            var userCaptcha = document.getElementById('user_captcha').value;
            //alert(userCaptcha);

            // Get the captcha value
            var captchaValue = "<?php echo $_SESSION['secure']; ?>";//document.getElementById('ae_captcha_api').innerText.trim();
            //alert(captchaValue);

            // Check if the user input matches the captcha value
            if (userCaptcha === captchaValue) {
              setSessionVariableYes();
              // If captcha is validated, check the checkbox
              document.getElementById('captchaCheckbox').checked = true;

            } else {
              // If captcha validation fails, uncheck the checkbox
              setSessionVariableNo();
              document.getElementById('captchaCheckbox').checked = false;

            }
          }

        </script>

        <script>
          function validateRefreshCaptcha() {
            // Get the user input
            var userCaptcha = document.getElementById('user_captcha').value;

            // AJAX call to validate captcha
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "validate_Email_Login_captcha.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
              if (xhr.readyState === 4 && xhr.status === 200) {
                // Response from server
                var response = xhr.responseText;
                if (response.trim() === "valid") {
                  // If captcha is validated, check the checkbox
                  setSessionVariableYes();
                  document.getElementById('captchaCheckbox').checked = true;
                } else {
                  // If captcha validation fails, uncheck the checkbox
                  setSessionVariableNo();
                  document.getElementById('captchaCheckbox').checked = false;
                }
              }
            };
            // Send user input as data
            xhr.send("userCaptcha=" + userCaptcha);
          }
        </script>

        <script>
          function setSessionVariableYes() {
            // Make an AJAX request to a PHP script to set the session variable
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'set_session_variable_yes.php', true);
            xhr.onload = function () {
              if (xhr.status === 200) {
                // Session variable set successfully
                console.log('Session variable set successfully');
              } else {
                // Error setting session variable
                console.error('Error setting session variable');
              }
            };
            xhr.send();
          }
        </script>

        <script>
          function setSessionVariableNo() {
            // Make an AJAX request to a PHP script to set the session variable
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'set_session_variable_no.php', true);
            xhr.onload = function () {
              if (xhr.status === 200) {
                // Session variable set successfully
                console.log('Session variable set successfully');
              } else {
                // Error setting session variable
                console.error('Error setting session variable');
              }
            };
            xhr.send();
          }
        </script>

        <div class="add-options">

          <a href="forgot.php">पासवर्ड भूल गए?</a>
        </div>
        <button type="submit">लॉगिन </button>
        <p id="signingup">क्या आपके पास खाता नहीं है? <a href="register.php">रजिस्टर करें</a></p>
      </form>
      <script src="captcha-generator/asset/main.js"></script>
    </div>
  </div>

  <!-- *********फुटर क्षेत्र********* -->
  <footer>
    <div class="footer-line-1">
      <p>इस प्लेटफॉर्म के सभी शर्तों और नियमों से सहमत</p>
    </div>
    <div class="footer-container">
      <div class="footer-col-1">
        <div class="footer-column">
          <h4>साइटमैप</h4>
          <ul>
            <li><a href="#">रेस</a></li>
            <li><a href="#">प्रमोशन</a></li>
            <li>
              <div class="footer-logo">
                <a href="index.php">
                  <img src="images/goracingslogo.png" alt="Go Race"></a>
                <h4><span id="go">Go</span><span id="race">Racings</span></h4>
              </div>
            </li>
          </ul>
        </div>
        <div class="footer-column">
          <h4>जानकारी</h4>
          <ul>
            <li><a href="#">नियम</a></li>
            <li><a href="#">सामान्य प्रश्न</a></li>
            <li><a href="racingnorms.php?section=privacy-policy">गोपनीयता नीति</a></li>
            <li><a href="racingnorms.php?section=terms-condition">नियम और शर्तें</a></li>
            <li><a href="racingnorms.php?section=responsible-Gaming">जिम्मेदार गेमिंग</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-col-2">
        <div class="footer-column">
          <h4>संपर्क करें</h4>
          <ul>
            <li>
              <div class="footer-logo">
                <h4><span id="go">Go</span><span id="race">Racings</span></h4>
              </div>
            </li>
            <li>जीपीसी 1, एमआईडीसी रोड,</br> सातारा, महाराष्ट्र,<br> भारत - 415001</li>
          </ul>
        </div>
        <div class="footer-column">
          <h4>सामाजिक</h4>
          <ul>
            <li>
              <div class="footer-icon">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="http://www.youtube.com/@goracings"><i class="fab fa-youtube"></i></a>
                <a href="https://wa.me/919764662357" target="_blank"><i class="fab fa-whatsapp"></i></a>
              </div>
            </li>
            <li>ई-मेल - goracings@swyomsoft.com</li>
            <li>सहायता नंबर - 02040008444</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-line-2">
      <p>
        <span>&copy; 2024. Swyom, Swyomsoft And Swyom Enterprises.</span> सर्वाधिकार सुरक्षित।
      </p>
    </div>
    <div class="connection_line2">
      <div id="status-dot" class="connection_dot"></div>
    </div>
  </footer>
  <!-- **** footer area end **** -->

  <!-- Scripts -->

  <script>
    function showOTPForm() {
      document.getElementById('otp-form').style.display = 'block';
      document.getElementById('email-form').style.display = 'none';
    }

    function showEmailForm() {
      document.getElementById('otp-form').style.display = 'none';
      document.getElementById('email-form').style.display = 'block';
    }

  </script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>