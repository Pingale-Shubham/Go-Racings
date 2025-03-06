<?php
// Start the session
session_start();

if (isset($_SESSION['LECaptcha']) && $_SESSION['LECaptcha'] === "yes") {
    $emailCaptcha = true;
} else {
    $error_message = "User need to fill correct captcha.";
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
        $error_message = "User must be logged in.";
    }

    // JavaScript code to display styled popup alert
    echo '<script>';
    echo 'setTimeout(function() {';
    echo '    var alertMessage = document.createElement("div");';
    echo '    alertMessage.innerHTML = "' . $error_message . '";';
    echo '    alertMessage.style.backgroundColor = "yellow";'; // Set background color to yellow
    echo '    alertMessage.style.color = "black";'; // Set text color to black
    echo '    alertMessage.style.padding = "10px";'; // Add padding for better visibility
    echo '    alertMessage.style.position = "fixed";'; // Position the alert message
    echo '    alertMessage.style.fontSize = "15px";';
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
<html lang="mr">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta charset="utf-8">
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <title>Forgot Password</title>
  <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="assets/css/forgot.css">
   <!-- JavaScript code embedded within <script> tags -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
          var passwordInput = document.getElementById("UserEmailPasscode");
          var confirmPasswordInput = document.getElementById("UserEmailcPasscode");
    
          passwordInput.addEventListener("input", validatePassword);
          confirmPasswordInput.addEventListener("input", validatePassword);
    
          function validatePassword() {
            var password = passwordInput.value;
            var confirmPassword = confirmPasswordInput.value;
    
            if (password === "" || confirmPassword === "") {
              // If either password field is empty, don't show any message
              confirmPasswordInput.setCustomValidity("");
            } else if (password !== confirmPassword) {
              // If passwords don't match, set a custom validity message
              confirmPasswordInput.setCustomValidity("Passwords do not match");
            } else {
              // If passwords match, clear any previous custom validity message
              confirmPasswordInput.setCustomValidity("");
            }
          }
        });
      </script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
        async function checkStatus() {
            try {
                const response = await fetch('../gRconnection.php');
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
</head>
<body>
<div class="sub-header-1">
    <div class="logo">
      <a href="index.php">
        <img src="images/goracingslogo.png" alt="Go Race"></a>
      <h4><span id="go">Go</span><span id="race">Racings</span></h4>
    </div>
    <div class="help-num">
      <p>सहाय्यता क्रमांक: +91 02040008444</p>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <nav class="main-nav">
        <!-- ***** Menu Start ***** -->
        <ul class="nav">
          <li><a href="index.php">मुख्यपृष्ठ</a></li>
          <li class="dropdown-service">
                        <button>सेवाएं</button>
                        <div class="dropdown-menu">
                            <a href="services.php?section=Race-Audience-Ticket-Cancel">रेस ऑडियन्स टिकट रद्द करणे</a>
                            <a href="services.php?section=Race-Participant-Cancel">रेस सहभाग रद्द करणे</a>
                            <a href="services.php?section=Organizer-Race-Cancel">रेस आयोजक रेस रद्द करणे</a>
                            <a href="services.php?section=Race-Advertise">रेस जाहिरात</a>
                        </div>
                    </li>
          <li><a href="gallery.php">गॅलरी</a></li>
          <li class="dropdown-norms">
        <button>रेसिंग नियम</button>
        <div class="dropdown-menu">
          <a href="racingnorms.php?section=privacy-policy">प्रायव्हसी पॉलिसी</a>
          <a href="racingnorms.php?section=terms-condition">अटी आणि शर्ती</a>
          <a href="racingnorms.php?section=responsible-Gaming">जवाबदार गेमिंग</a>          
        </div>
    </li>
          <li><a href="login.php"><i class="fa fa-user"></i> लॉगिन/नोंदणी</a></li>
        </ul>
        <a class='menu-trigger'>
          <span>Menu</span>
        </a>
        <!-- ***** Menu End ***** -->
      </nav>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
   
<!-- ***** second sub Header Area start ***** -->
<div class="sub-header-2"></div>
<!-- ***** second sub Headerr Area End ***** -->

  <div class="forgot-container">
    <h3>तुमचा ईमेल पासवर्ड पुनर्प्राप्त करा</h3>
    <div id="email-form">
      <form action="reset_password.php" method="POST">
        <table>
          <tr>
            <td><label for="UserEmailID">ईमेल:</label></td>
            <td><input type="email" id="UserEmailID" name="UserEmailID" placeholder="तुमचा इमेल पत्ता प्रविष्ट करा" required></td>
          </tr>
        </table>
        <button type="submit">पासवर्ड तुमच्या ईमेलवर पाठवा</button>
      </form>
    </div>
  </div>

<!-- *********फूटर क्षेत्र********* -->
<footer>
  <div class="footer-line-1">
    <p>या प्लॅटफॉर्मसाठी सर्व अटी व शर्ती मान्य करा</p>
    </div>
    <div class="footer-container">
      <div class="footer-col-1">
        <div class="footer-column">
          <h4>साइटमॅप</h4>
          <ul>
            <li><a href="#">रेसेस</a></li>
            <li><a href="#">प्रमोशन्स</a></li>
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
          <h4>माहिती</h4>
          <ul>
            <li><a href="#">Rules</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="racingnorms.php?section=privacy-policy">प्रायव्हसी पॉलिसी</a></li>
          <li><a href="racingnorms.php?section=terms-condition">अटी आणि शर्ती</a></li>
          <li><a href="racingnorms.php?section=responsible-Gaming">जवाबदार गेमिंग</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-col-2">
        <div class="footer-column">
          <h4>संपर्क</h4>
          <ul>
            <li>
              <div class="footer-logo">
                <h4><span id="go">Go</span><span id="race">Racings</span></h4>
              </div>
            </li>
            <li>GPC 1, MIDC रोड,</br> सातारा, महाराष्ट्र,<br> भारत - ४१५००१</li>
          </ul>
        </div>
        <div class="footer-column">
          <h4>SOCIAL</h4>
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
          <li>हेल्प नंबर - ०२०४०००८४४४</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-line-2">
    <p>
      <span>&copy; २०२४. Swyom, Swyomsoft And Swyom Enterprises.</span> सर्व हक्क राखीव.
    </p>
    </div>
    <div class="connection_line2">
      <div id="status-dot" class="connection_dot"></div>
    </div>
  </footer>
  <!-- **** फूटर क्षेत्र समाप्त **** -->

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
