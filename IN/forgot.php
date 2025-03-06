<!DOCTYPE html>
<html lang="hi">
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


</head>
<body>
  <div class="sub-header-1">
    <div class="logo">
      <a href="index.php">
        <img src="images/goracingslogo.png" alt="Go Race"></a>
      <h4><span id="go">Go</span><span id="race">Racings</span></h4>
    </div>
    <div class="help-num">
      <p>सहायता नंबर : +91 02040008444</p>
    </div>
  </div>

<!-- ***** हेडर क्षेत्र प्रारंभ ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <nav class="main-nav">
            <!-- ***** मेनू प्रारंभ ***** -->
            <ul class="nav">
                <li><a href="index.php">होम</a></li>
                <li class="dropdown-service">
                    <button>सेवाएँ</button>
                    <div class="dropdown-menu">
                        <a href="services.php?section=Race-Audience-Ticket-Cancel">रेस दर्शक टिकट रद्द</a>
                        <a href="services.php?section=Race-Participant-Ticket-Cancel">रेस प्रतिभागी टिकट रद्द</a>
                        <a href="services.php?section=Organizer-Race-Cancel">रेस आयोजक रद्द</a>
                        <a href="services.php?section=Race-Advertise">रेस विज्ञापन</a>
                    </div>
                </li>
                <li><a href="gallery.php">गैलरी</a></li>
                <li class="dropdown-norms">
                    <button>रेसिंग नियम</button>
                    <div class="dropdown-menu">
                        <a href="racingnorms.php?section=terms-condition" class="dropdown-item">नियम और शर्तें</a>
                        <a href="racingnorms.php?section=privacy-policy" class="dropdown-item">गोपनीयता नीति</a>
                        <a href="racingnorms.php?section=refund-cancelation" class="dropdown-item">रिफंड और रद्दीकरण</a>
                    </div>
                </li>
                <li><a href="login.php"><i class="fa fa-user"></i> लॉगिन/रजिस्टर</a></li>
            </ul>
            <a class='menu-trigger'>
                <span>मेनू</span>
            </a>
            <!-- ***** मेनू समाप्त ***** -->
        </nav>
    </div>
</header>
<!-- ***** हेडर क्षेत्र समाप्त ***** -->

  <div class="sub-header-2">
    <div class="columns">
      <div class="connect" id="connectionStatus">
        <!-- Site is under maintenance -->
      </div>
    </div>
  </div>


  <div class="forgot-container">
    <h3>अपना ईमेल पासवर्ड पुनः प्राप्त करें</h3>
    <div id="email-form">
      <form action="reset_password.php" method="POST">
        <table>
          <tr>
            <td><label for="UserEmailID">ईमेल:</label></td>
            <td><input type="email" id="UserEmailID" name="UserEmailID" placeholder="अपना ईमेल पता दर्ज करें" required></td>
          </tr>
        </table>
        <button type="submit">पासवर्ड आपके ईमेल पर भेजें</button>
      </form>
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

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
