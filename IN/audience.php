
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
  
  header("Location: index.php");
exit();
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
  <link rel="stylesheet" href="Login/login.css">
  <link rel="stylesheet" href="assets/css/calender.css">
  <link rel="stylesheet" href="assets/css/audienceform.css">
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" /> -->
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
   
   <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Razorpay SDK -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

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
                <li><a href="index.php" class="active">होम</a></li>
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

<!-- ***** दूसरा सब हेडर एरिया शुरू ***** -->
<div class="sub-header-2">
  <div class="menu-bar" onclick="toggleMenubar()"><i class="fa fa-bars"></i></div>
  <div class="columns">
    <div class="header-column-1">
      <h6><a href="audience.php" class="sub-header-2active">दर्शक</a></h6>
    </div>
    <div class="header-column-2">
      <h6><a href="participants.php">प्रतिभागी</a></h6>
    </div>
    <div class="header-column-3">
      <h6><a href="organizer.php">आयोजक</a></h6>
    </div>
    <div class="header-column-4">
      <h6><a href="profile.php">उपयोगकर्ता प्रोफ़ाइल</a></h6>
    </div>
  </div>
  <div class="header-column-end">
    <?php if ($LogInshowButton): ?>
      <div class="dropdownIO">
        <button style="padding: 5px;">
          <img src="./images/user-login.png" alt="login" style="height:35px; width: 35px; padding:5px; border-radius:50%; background-color: #90e1f8;"> स्वागत है,
        </button>
        <div class="dropdownIO-options">
          <a href="lUser.php"><i class="fa fa-user"></i> लॉगिन <span><?php echo $LogInWith; ?></span></a>
          <a href="logout.php"><img src="./images/user-logout.png" alt="logout" style="height:35px; width: 35px; padding:5px;">लॉगआउट</a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>
<script>
  // मेनू आइटम्स की डिस्प्ले को टॉगल करने का जावास्क्रिप्ट फ़ंक्शन
  function toggleMenubar() {
    var menubar = document.querySelector('.columns');
    if (menubar.style.display === 'flex' || menubar.style.display === '') {
      menubar.style.display = 'none';
    } else {
      menubar.style.display = 'flex';
    }
  }
</script>
<!-- ***** दूसरा सब हेडर एरिया समाप्त ***** -->
  
    <!-- audience form start -->
    <div class="audience-container">
        <h5>रेस ऑडियंस टिकट बुकिंग फॉर्म</h5>
        <form id="raceAudienceForm" action="bookaudience.php" method="post" enctype="multipart/form-data">
            <label for="race_name" id="race_name">उपलब्ध रेस चुनें:</label>
            <select id="raceName" name="raceName" placeholder="उपलब्ध रेस चुनें">
        <?php

        include 'gRconn.php';
// 		$serverName = "110.227.185.209";//"your_server_name";
// 		// $serverName = "SWYOM\GORACINGS";//"your_server_name";
// 		$connectionOptions = array(
// 		"Database" => "Race",
// 		"Uid" => "sa",
// 		"PWD" => "Heshavi@123"
// 		);

// // Establishes the connection
// 		$conn = sqlsrv_connect($serverName, $connectionOptions);
        // Assuming $conn is your SQL Server connection
        // echo "<option value="">Choose available race</option>";
        echo "<option value='' disabled selected>उपलब्ध रेस चुनें</option>";
        $query = "SELECT RaceName, BookRaceOrganizersAllotedTokenNumber FROM GetAudienceDetails()";
        $result = sqlsrv_query($conn, $query);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            // echo "<option value='Choose Available Race'>Choose Available Race</option>";
            
            //echo "<option value='" . $row['RaceName'] . "'>" . $row['RaceName'] . "</option>";
			echo "<option value='" . $row['RaceName'] . "' data-token='" . $row['BookRaceOrganizersAllotedTokenNumber'] . "'>" . $row['RaceName'] . "</option>";
        }
        ?>
    </select>

    <div id="raceDetails">
        <!-- Display fetched details here -->
    </div>

            <label for="a_birthdt">दर्शक जन्म तिथि:</label>
            <input type="date" id="a_birthdt" name="a_birthdt">

            <label for="documents">दस्तावेज़:</label>

            <label for="a_photo_id">1. फोटो पहचान प्रमाण - "आधार कार्ड, ड्राइविंग लाइसेंस, पैन कार्ड"</label>
            <input type="button" class="purple-button" value="फ़ाइल चुनें" onclick="triggerFileInput('a_photo_id')">
            <span id="a_photo_id_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="a_photo_id" name="a_photo_id">

            <label for="a_race_approval">साइट से दर्शक की पुष्टि:</label>
            <div>
                <input type="range" min="0" max="1" value="0" step="1" class="slider" id="myRange" name="a_race_approval">
                <div id="result">चयनित विकल्प: स्वीकृति के लिए नहीं भेजा जा रहा</div>
            </div>

            <label for="a_FC_info">दर्शक से प्रतिक्रिया और संपर्क जानकारी:</label>
            <textarea id="a_FC_info" name="a_FC_info"></textarea>


            <button id="payButton" type="submit">दर्शक द्वारा टिकट बुक करें</button>
        </form>

<script>
$(document).ready(function() {
    $('#payButton').click(function(e) {
        e.preventDefault();

        var apiKey = 'rzp_test_L1hpOI6glBy9Yg'; // Replace with your Razorpay API Key
        var amount = parseFloat(($('#AudienceTicketGST').val())) * 100; // Convert to paise
            // Format the amount to keep the decimal point representation
        var amountFormatted = (amount / 100).toFixed(2);

        var options = {
            key: apiKey,
            amount: amount,
            currency: 'INR',
            name: 'GoRacings.com',
            description: 'GoRacings Payment',
            handler: function(response) {
                // Send payment details to the server for verification
                var racePayment = $('#AudienceTicketGST').val();
                var uniqueToken = $('#UserAllotedTokenNumber').val();

                $.post('verify_payAudience.php', {
                    razorpay_payment_id: response.razorpay_payment_id,
                    race_payment: racePayment,
                    UserAllotedTokenNumber: uniqueToken
                }, function(result) {					
                    // On successful verification, submit the form
                    if (result === 'success') {
                        $('#raceAudienceForm').submit();
                    } else {
                        alert('Payment verification failed');
                    }
                });
            },
            modal: {
                ondismiss: function() {
                    alert('Payment cancelled');
                }
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    });
});

</script>

<!--<script>
    $(document).ready(function() {
        $('#payButton').click(function(e) {
            e.preventDefault();

            // Replace with your Razorpay API Key
            var apiKey = 'rzp_test_L1hpOI6glBy9Yg';

            // Replace with the amount to be charged
            // var amount = 100 * 100; // Example: ₹10
            // var amount = parseInt(Math.round(($('#AudienceTicketGST').val()))) * 100; // Convert to paise
            // var amount = parseInt(($('#AudienceTicketGST').val())) * 100;
            var amount = parseFloat(($('#AudienceTicketGST').val())) * 100; // Convert to paise
            // Format the amount to keep the decimal point representation
            var amountFormatted = (amount / 100).toFixed(2);

            var options = {
                key: apiKey,
                amount: amount,
                currency: 'INR',
                name: 'GoRacings.com',
                description: 'GoRacings Payment',
                handler: function(response) {
                  // Send the payment ID to the server for verification
                  $.post('verify_payAudience.php', {
                        razorpay_payment_id: response.razorpay_payment_id
                    }, function(result) {
                        alert(result);
                    });
                },
                prefill: {
                    name: 'Customer Name',
                    email: 'customer@example.com',
                    contact: '+919876543210'
                },
                theme: {
                    color: '#528FF0'
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        });
    });
</script>-->
    </div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const slider = document.getElementById('myRange');
        const result = document.getElementById('result');
        slider.addEventListener('input', function () {
            const value = parseInt(this.value);
            const text = value === 1 ? 'स्वीकृति के लिए भेजा जा रहा' : 'स्वीकृति के लिए नहीं भेजा जा रहा';
            result.textContent = `चयनित विकल्प: ${text}`;
        });

        $(document).ready(function(){
            $('#raceName').change(function(){
                var raceName = $(this).val();
				var tokenNumber = $('#raceName option:selected').data('token');
                $.ajax({
                    url: 'fetch_audience_race_details.php',
                    method: 'POST',
                    data: { raceName: raceName, tokenNumber: tokenNumber },
                    success: function(response){
                        $('#raceDetails').html(response);
                    }
                });
            });
        });

        var map = L.map('map').setView([17.6608, 74.0214], 2); // Default view at (0, 0) with zoom level 2
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var marker = L.marker([17.6608, 74.0214]).addTo(map);

        map.on('click', function (e) {
            marker.setLatLng(e.latlng);
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
        });
    </script>
    <!-- audience form end -->

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/audienceform.js"></script>
</body>
</html>
