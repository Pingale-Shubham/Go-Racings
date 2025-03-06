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
    $error_message = "User must be login.";
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
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
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

  <title>GoRacings - Speed to win</title>
  <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="assets/css/services.css">
  
  <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('send-Req').addEventListener('click', function(event) {
                alert('Please contact on help number.');
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

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <nav class="main-nav">
        <!-- ***** Menu Start ***** -->
        <ul class="nav">
          <li><a href="index.php">Home</a></li>
          <li class="dropdown-service">
            <button>Services</button>
            <div class="dropdown-menu">
              <a href="services.php?section=Race-Audience-Ticket-Cancel">Race Audience Ticket Cancellation</a>
              <a href="services.php?section=Race-Participant-Ticket-Cancel">Race Participation Cancellation</a>
              <a href="services.php?section=Organizer-Race-Cancel">Race Organizer Cancel Race</a>
              <a href="services.php?section=Race-Advertise">Race Advertising</a>
            </div>
          </li>
          <li><a href="gallery.php">Gallery</a></li>
          <li class="dropdown-norms">
            <button>Racing Norms</button>
            <div class="dropdown-menu">
              <a href="racingnorms.php?section=terms-condition" class="dropdown-item">Terms & Conditions</a>
              <a href="racingnorms.php?section=privacy-policy" class="dropdown-item">Privacy Policy</a>
              <a href="racingnorms.php?section=refund-cancelation" class="dropdown-item">Refund & Cancellation</a>
            </div>
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
  <!-- ***** Header Area End ***** -->

  <!-- ***** second sub Header Area start ***** -->
  <div class="sub-header-2">
    <div></div>
    <div class="header-column-end">
      <?php if ($LogInshowButton): ?>
        <div class="dropdownIO">
        <button style="padding: 5px;"><img src="./images/user-login.png" alt="login" style="height:35px; width: 35px; padding:5px; border-radius:50%; background-color: #90e1f8;"> Welcome,</button>
          <div class="dropdownIO-options">
            <a href="lUser.php"><i class="fa fa-user"></i> Login With <span><?php echo $LogInWith; ?></span></a>
            <a href="logout.php"><img src="./images/user-logout.png" alt="logout" style="height:35px; width: 35px; padding:5px;">Logout</a>
          </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <!-- ***** second sub Header Area End ***** -->

  <!-- Racing Services Start -->
  <div class="race-services">
    <div id="content-container" class="services-content-section">
      <?php
      if (isset($_GET['section'])) {
        $section = $_GET['section'];
        if ($section == 'Race-Audience-Ticket-Cancel') {
          echo '<h2>Race Audience Ticket Cancellation</h2>';
          echo '<form class="ticket-cancel-form" action="#" method="post">';
          echo '<div class="RaceServiceForm"><label for="Audience-Unique">Unique Code :</label><input type="text" id="Audience-Unique" name="Audience-Unique" placeholder="Enter Your Unique Code"></div>';
          echo '<button id="send-Req" type="submit">Send Cancellation Request</button>';
          echo '</form>';
        } elseif ($section == 'Race-Participant-Ticket-Cancel') {
          echo '<h2>Race Participation Cancellation</h2>';
          echo '<form class="ticket-cancel-form" action="#" method="post">';
          echo '<div class="RaceServiceForm"><label for="Participant-Uniquecode">Unique Code :</label><input type="text" id="Participant-Uniquecode" name="Participant-Uniquecode" placeholder="Enter Your Unique Code"></div>';
          echo '<button id="send-Req" type="submit">Send Cancellation Request</button>';
        } elseif ($section == 'Organizer-Race-Cancel') {
          echo '<h2>Race Organizer Cancel Race</h2>';
          echo '<form class="ticket-cancel-form" action="#" method="post">';
          echo '<div class="RaceServiceForm"><label for="Organizer-Uniquecode">Unique Code :</label><input type="text" id="Organizer-Uniquecode" name="Organizer-Uniquecode" placeholder="Enter Your Unique Code"></div>';
          echo '<button id="send-Req" type="submit">Send Cancellation Request</button>';
          echo '</form>';
        } elseif ($section == 'Race-Advertise') {
          echo '<h2>Race Advertising</h2>';
          echo '<form class="ticket-cancel-form" action="#" method="post">';
          echo '<div class="RaceServiceForm"><label for="Advertising-Uniquecode">Unique Code :</label><input type="text" id="Advertising-Uniquecode" name="Advertising-Uniquecode" placeholder="Enter Your Unique Code"></div>';
          echo '<button id="send-Req" type="submit">Send Advertising Request</button>';
          echo '</form>';
        } else {
          echo '<h2>Welcome to GoRacings</h2>';
          echo '<p>General description.</p>';
        }
      } else {
        echo '<h2>Welcome to GoRacings</h2>';
        echo '<p>General description.</p>';
      }
	  
	  
	  
      ?>
    </div>
  </div>
  <!-- Racing Services End -->

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
            <li class="footer-logo">
              <h4><span id="go">Go</span><span id="race">Racings</span></h4>
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

  <!-- Scripts -->
  <script>
    function showLoginForm() {
      var loginForm = document.getElementById("loginForm");
      loginForm.style.display = "block";

      var loginBtn = document.getElementById("loginBtn");
      var logoutBtn = document.getElementById("logoutBtn");
      loginBtn.style.display = "none";
      logoutBtn.style.display = "block";
    }

    function logout() {
      // Here you can implement logout functionality, like clearing session data, etc.
      var loginForm = document.getElementById("loginForm");
      loginForm.style.display = "none";

      var loginBtn = document.getElementById("loginBtn");
      var logoutBtn = document.getElementById("logoutBtn");
      loginBtn.style.display = "block";
      logoutBtn.style.display = "none";
    }

    // Function to open the specified category popup
    function openPopup(category) {
      document.getElementById("popup-" + category).style.display = "block";
    }

    // Function to close the specified category popup
    function closePopup(category) {
      document.getElementById("popup-" + category).style.display = "none";
    }

  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>