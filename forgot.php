<!DOCTYPE html>
<html lang="en">
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
    $(document).ready(function() {
        $('.dropdown-service, .dropdown-norms').click(function(event) {
            event.preventDefault();
            alert('You need to first login to access this ');
        });
    });
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
      <p>Help Number. : +91 02040008444</p>
    </div>
  </div>
  <header class="header-area header-sticky">
    <div class="container">
                <nav class="main-nav">
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        <li class="dropdown-service">
                            <a href="#" class="dropdown-toggle-service">Services</a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Sub-Menu Item 1</a></li>
                                <li><a href="#">Sub-Menu Item 2</a></li>
                            </ul>
                        </li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li class="dropdown-norms">
                            <a href="#" class="dropdown-toggle-norms">Racing Norms</a>
                            <ul class="dropdown-menu">
                                <li><a href="racingnorms.php">Racing Norms</a></li>
                            </ul>
                        </li>
                        <li><a href="login.php"><i class="fa fa-user"></i> Login/Register</a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
        </div>
</header>
  <div class="sub-header-2">
    <div class="columns">
      <div class="connect" id="connectionStatus">
        <!-- Site is under maintenance -->
      </div>
    </div>
  </div>
  <div class="forgot-container">
    <h3>Recover your email password</h3>
    <div id="email-form">
      <form action="reset_password.php" method="POST">
        <table>
          <tr>
            <td><label for="UserEmailID">Email:</label></td>
            <td><input type="email" id="UserEmailID" name="UserEmailID" placeholder="Enter your email address" required></td>
          </tr>
        </table>
        <button type="submit">Password Send to Your Email</button>
      </form>
    </div>
  </div>
  
  <!-- *********footer area********* -->
  <footer>
    <div class="footer-line-1">
      <p>Agree all terms and condition for this platform</p>
    </div>
    <div class="footer-container">
      <div class="footer-col-1">
        <div class="footer-column">
          <h4>SITEMAP</h4>
          <ul>
            <li><a href="#">Races</a></li>
            <li><a href="#">Promotions</a></li>
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
          <h4>INFORMATION</h4>
          <ul>
            <li><a href="#">Rules</a></li>
            <li><a href="#">FAQ</a></li>
           <li><a href="racingnorms.php?section=privacy-policy">Privacy Policy</a></li>
           <li><a href="racingnorms.php?section=terms-condition">Terms and Conditions</a></li>
           <li><a href="racingnorms.php?section=responsible-Gaming">Responsible Gaming</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-col-2">
        <div class="footer-column">
          <h4>CONTACT</h4>
          <ul>
            <li>
              <div class="footer-logo">
                <h4><span id="go">Go</span><span id="race">Racings</span></h4>
              </div>
            </li>
            <li>GPC 1, MIDC Road,</br> Satara, Maharashtra,<br> India - 415001</li>
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
            <li>E-Mail - goracings@swyomsoft.com</li>
            <li>Help No. - 02040008444</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-line-2">
      <p><span>&copy; 2024. Swyom, Swyomsoft And Swyom Enterprises.</span> All Rights Reserved.</p>
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
