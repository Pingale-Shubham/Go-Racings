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
<html lang="en">

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.4/purify.min.js"></script>

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
  <link rel="stylesheet" href="assets/css/profile.css">
  <link rel="stylesheet" href="assets/css/participantform.css">
  <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" /> -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
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
                            <a href="services.php?section=Race-Participant-Cancel">Race Participation Cancellation</a>
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
  <div class="container-fluid sub-header-2">
    <div class="menu-bar" onclick="toggleMenubar()"><i class="fa fa-bars"></i></div>
    <div class="columns">
      <div class="header-column-1">
        <h6><a href="audience.php">Audience</a></h6>
      </div>
      <div class="header-column-2">
        <h6><a href="participants.php">Participants</a></h6>
      </div>
      <div class="header-column-3">
        <h6><a href="organizer.php">Organizer</a></h6>
      </div>
      <div class="header-column-4">
        <h6><a href="profile.php" class="sub-header-2active">User Profile</a></h6>
      </div>
    </div>
    <script>
      // JavaScript function to toggle the display of the menu items
      function toggleMenubar() {
        var menubar = document.querySelector('.columns');
        if (menubar.style.display === 'flex') {
          menubar.style.display = 'none';
        } else {
          menubar.style.display = 'flex';
        }
      }
    </script>
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
  <!-- ***** second sub Headerr Area End ***** -->

  <script src="./assets/js/profile.js"></script>
  <!-- profile area start -->
  <div class="profile-area">
    <div class="profile-navbar">
      <ul>
        <!-- <li><a href="#Organizer-Prize" class="tab-link">Organizer Prize Management</a></li>
        <li><a href="#Participant-Prize" class="tab-link">Participant Prize Management</a></li> -->
        <li><a href="#profile-info" class="tab-link">Profile</a></li>
        <li><a href="#organizer-info" class="tab-link">Organizer Management</a></li>
        <li><a href="#participants-info" class="tab-link">Participants Management</a></li>
        <li><a href="#audience-info" class="tab-link">Audience Management</a></li>
      </ul>
    </div>

    <div class="profile-area-details">
      <div class="O-Prize-content">
        <div id="Organizer-Prize" class="tab-content">
          <h5>Organizer Prize Information:</h5><br>
          <?php
          include 'gRconn.php';

          // $serverName = "110.227.185.209";
          // $connectionInfo = array("Database" => "Race", "UID" => "sa", "PWD" => "Heshavi@123");
          // $conn = sqlsrv_connect($serverName, $connectionInfo);
          
          // Check if the connection is successful
          if ($conn === false) {
            echo "Failed to connect to the database.";
            die(print_r(sqlsrv_errors(), true));
          }

          // Query to execute the SQL function
          $query = "SELECT * FROM GetParticipantsDetails()";

          // Execute the query
          $result = sqlsrv_query($conn, $query);

          // Check if the query execution is successful
          if ($result === false) {
            echo "Error executing query.";
            die(print_r(sqlsrv_errors(), true));
          }

          // Start table HTML
          echo "<table class='o-prize-table'>";
          // Table header
          echo "<tr><th>Sr. No.</th><th>Race Name</th><th>Race Location Latitude</th><th>Race Location Longitude</th><th>Race Date and Time</th><th>Race Token Number</th><th>Action</th></tr>";

          $serialNumber = 1;
          // Fetch the data and populate table rows
          while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {

            // Change date format
            $raceDate = new DateTime($row['RaceDateandTime']);
            // Format dates
            $formattedRaceDate = $raceDate->format('F j, Y \a\t g:i A');
            
            // Start a new table row
            echo "<tr>";
            // Populate table cells with data
            echo "<td style='text-align:center'>" . $serialNumber . "</td>";
            echo "<td>" . htmlspecialchars($row['RaceName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['RaceLocationLatitude']) . "</td>";
            echo "<td>" . htmlspecialchars($row['RaceLocationLongitude']) . "</td>";
            echo "<td>" . htmlspecialchars($formattedRaceDate) . "</td>";
            echo "<td>" . htmlspecialchars($row['BookRaceOrganizersAllotedTokenNumber']) . "</td>";
            echo "<td><button class='edit-btn' data-serial='$serialNumber'>Edit</button></td>";
            // End the table row
            echo "</tr>";

            $serialNumber++;
          }

          // End table HTML
          echo "</table>";

          // Close the connection
          sqlsrv_close($conn);
          ?>
        </div>

        <!-- Details Structure -->
        <div id="editDetails" class="Details">
          <div class="Details-content">
            <div class="Details-header">
              <span class="close">&times;</span>
              <h2>Edit Race Details</h2>
            </div>
            <div class="Details-body">
              <form id="editForm">
                <label for="raceName">Race Name:</label>
                <input type="text" id="raceName" name="raceName" readonly><br><br>
                <label for="raceLatitude">Race Location Latitude:</label>
                <input type="text" id="raceLatitude" name="raceLatitude" readonly><br><br>
                <label for="raceLongitude">Race Location Longitude:</label>
                <input type="text" id="raceLongitude" name="raceLongitude" readonly><br><br>
                <label for="raceDateTime">Race Date and Time:</label>
                <input type="datetime-local" id="raceDateTime" name="raceDateTime" readonly><br><br>
                <label for="raceToken">Book Race Organizers Allotted Token Number:</label>
                <input type="text" id="raceToken" name="raceToken" readonly><br><br>
              </form>
            </div>
            <div class="Details-footer">
              <button type="button" id="saveChanges">Save changes</button>
            </div>
          </div>
        </div>

      </div>

      <div class="P-Prize-content">
        <div id="Participant-Prize" class="tab-content">
          <h5>Participant Prize Information:</h5><br>
          <?php
          include 'gRconn.php';

          // $serverName = "110.227.185.209";
          // $connectionInfo = array("Database" => "Race", "UID" => "sa", "PWD" => "Heshavi@123");
          // $conn = sqlsrv_connect($serverName, $connectionInfo);
          
          // Check if the connection is successful
          if ($conn === false) {
            echo "Failed to connect to the database.";
            die(print_r(sqlsrv_errors(), true));
          }

          // Query to execute the SQL function
          $query = "SELECT * FROM GetParticipantsDetails()";

          // Execute the query
          $result = sqlsrv_query($conn, $query);

          // Check if the query execution is successful
          if ($result === false) {
            echo "Error executing query.";
            die(print_r(sqlsrv_errors(), true));
          }

          // Start table HTML
          echo "<table class='o-prize-table'>";
          // Table header
          echo "<tr><th>Sr. No.</th><th>Race Name</th><th>Race Location Latitude</th><th>Race Location Longitude</th><th>Race Date and Time</th><th>Race Token Number</th><th>Action</th></tr>";

          $serialNumber = 1;
          // Fetch the data and populate table rows
          while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            
            // Change date format
            $raceDate = new DateTime($row['RaceDateandTime']);
            // Format dates
            $formattedRaceDate = $raceDate->format('F j, Y \a\t g:i A');

            // Start a new table row
            echo "<tr>";
            // Populate table cells with data
            echo "<td style='text-align:center'>" . $serialNumber . "</td>";
            echo "<td>" . htmlspecialchars($row['RaceName']) . "</td>";
            echo "<td>" . htmlspecialchars($row['RaceLocationLatitude']) . "</td>";
            echo "<td>" . htmlspecialchars($row['RaceLocationLongitude']) . "</td>";
            echo "<td>" . htmlspecialchars($formattedRaceDate) . "</td>";
            echo "<td>" . htmlspecialchars($row['BookRaceOrganizersAllotedTokenNumber']) . "</td>";
            echo "<td><button class='edit-btn' data-serial='$serialNumber'>Edit</button></td>";
            // End the table row
            echo "</tr>";

            $serialNumber++;
          }

          // End table HTML
          echo "</table>";

          // Close the connection
          sqlsrv_close($conn);
          ?>
        </div>

        <!-- Details Structure -->
        <div id="editDetails" class="Details" style="display:none;">
          <div class="Details-content">
            <div class="Details-header">
              <span class="close">&times;</span>
              <h2>Edit Race Details</h2>
            </div>
            <div class="Details-body">
              <form id="editForm">
                <label for="raceName">Race Name:</label>
                <input type="text" id="raceName" name="raceName" readonly><br><br>
                <label for="raceLatitude">Race Location Latitude:</label>
                <input type="text" id="raceLatitude" name="raceLatitude" readonly><br><br>
                <label for="raceLongitude">Race Location Longitude:</label>
                <input type="text" id="raceLongitude" name="raceLongitude" readonly><br><br>
                <label for="raceDateTime">Race Date and Time:</label>
                <input type="datetime-local" id="raceDateTime" name="raceDateTime" readonly><br><br>
                <label for="raceToken">Book Race Organizers Allotted Token Number:</label>
                <input type="text" id="raceToken" name="raceToken" readonly><br><br>
              </form>
            </div>
            <div class="Details-footer">
              <button type="button" id="saveChanges">Save changes</button>
            </div>
          </div>
        </div>

      </div>

      <div class="profile-content">
        <div id="profile-info" class="tab-content">
          <h5>Profile Information:</h5><br>
          <?php

          include 'gRconn.php';
          // $serverName = "110.227.185.209";//"SWYOM\GORACINGS""your_server_name";
          // $serverName = "SWYOM\GORACINGS";//"your_server_name";
          // $connectionOptions = array(
          //   "Database" => "Race",
          //   "Uid" => "sa",
          //   "PWD" => "Heshavi@123"
          // );
          // // Establishes the connection
          // $conn = sqlsrv_connect($serverName, $connectionOptions);
          
          // Checks if the connection is successful
          if ($conn === false) {
            echo "Failed to connect to the database.";
            die(print_r(sqlsrv_errors(), true));
          }

          // Query to execute the SQL function
          $query = "SELECT * FROM GetParticipantsDetails()";

          // Executes the query
          $result = sqlsrv_query($conn, $query);

          // Fetch and display user profile information
          if ($conn) {
            // Check if user email and mobile number are set in session
            if (!empty($_SESSION["UserEmailID"])) {
              $userEmail = $_SESSION["UserEmailID"];
            } else {
              $userEmail = "";
            }

            if (!empty($_SESSION["UserMobileNumber"])) {
              $userMobileNumber = $_SESSION["UserMobileNumber"];
            } else {
              $userMobileNumber = "";
            }

            $sql = "SELECT * FROM GetUserRegistrationDetails(?, ?)";
            $params = array($userEmail, $userMobileNumber);
            $stmt = sqlsrv_query($conn, $sql, $params);

            if ($stmt) {
              echo "<table>";
              while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td class=\"table-head\">Name:</td><td>" . $row['UserName'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"table-head\">Mobile Number:</td><td>" . $row['UserMobileNumber'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"table-head\">Email:</td><td>" . $row['UserEmailID'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"table-head\">Address:</td><td>" . $row['UserAddress'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"table-head\">Unique Code:</td><td>" . $row['UserAllotedTokenNumber'] . "</td>";
                echo "</tr>";
              }
              echo "</table>";
              sqlsrv_free_stmt($stmt);
            } else {
              echo "Error executing SQL statement: " . print_r(sqlsrv_errors(), true);
            }
            sqlsrv_close($conn);
          } else {
            echo "Database connection error.";
          }
          ?>
        </div>
      </div>

      <div class="organizer-content">
        <div id="organizer-info" class="tab-content">
          <h5>Organizer Race Information:</h5><br>
          <?php
        include 'gRconn.php';
        if ($conn === false) {
            echo "Failed to connect to the database.";
            die(print_r(sqlsrv_errors(), true));
        }

        if (!empty($_SESSION["UserEmailID"])){
            $UserEmailID = $_SESSION["UserEmailID"];
        } else {
            $UserEmailID = "@";
        }

        if (!empty($_SESSION["UserMobileNumber"])){
            $UserMobileNumber = $_SESSION["UserMobileNumber"];
        } else {
            $UserMobileNumber = "@";
        }

        if ($UserEmailID === "@") {
            $input = $UserMobileNumber;
        } else {
            $input = $UserEmailID;
        }

        $sql = "{CALL GetUserDetails(?)}";
        $params = array(array(&$input, SQLSRV_PARAM_IN));
        $stmt = sqlsrv_prepare($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        if (sqlsrv_execute($stmt)) {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                $UserMobileNumber = $row['UserMobileNumber'];
                $UserEmailID = $row['UserEmailID'];
            }
        } else {
            die(print_r(sqlsrv_errors(), true));
        }

        $sql = "SELECT * FROM GetOrganizerManagement(?, ?)";
        $params = array($UserEmailID, $UserMobileNumber);
        $result = sqlsrv_query($conn, $sql, $params);

        if ($result === false) {
            echo "Error executing query.";
            die(print_r(sqlsrv_errors(), true));
        }

        // Fetch payment details
$sql = "{CALL GetOrganizerPaymentDetails}";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch payment details
$sql = "{CALL GetOrganizerPaymentDetails}";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Fetch and store payment details in an array
$paymentDetails = array();
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $paymentDetails[$row['RacingAllotedTokenNumber']] = $row['paymentId'];
}

echo "<table border='1'>";
echo "<tr><th>Sr. No.</th><th>Race Name</th><th>Race Address</th><th>Race Date&Time</th><th>Race Last Admission Date&Time</th><th>Race Payment</th><th>Audience Ticket Fee</th><th>Participant Fee</th><th>Prize Amount One</th><th>Prize Amount Two</th><th>Prize Amount Three</th><th>Prize Amount Four</th><th>Prize Amount Five</th><th>Prize Amount Six</th><th>Prize Amount Seven</th><th>Race Token Number</th><th>Payment Slip</th></tr>";
$serialNumber = 1;

while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    $raceDate = new DateTime($row['RaceDateandTime']);
    $raceLastAdmissionDate = new DateTime($row['RaceLastAdmissionDateandTime']);
    $formattedRaceDate = $raceDate->format('F j, Y \a\t g:i A');
    $formattedRaceLastAdmissionDate = $raceLastAdmissionDate->format('F j, Y \a\t g:i A');

    $tokenNumber = $row['BookRaceOrganizersAllotedTokenNumber'];
    $paymentId = isset($paymentDetails[$tokenNumber]) ? $paymentDetails[$tokenNumber] : 'N/A';

            echo "<tr>";
            echo "<td style='text-align:center'>" . $serialNumber . "</td>";
            echo "<td>" . $row['RaceName'] . "</td>";
            echo "<td>" . $row['RaceAddress'] . "</td>";
            echo "<td>" . $formattedRaceDate . "</td>";
            echo "<td>" . $formattedRaceLastAdmissionDate . "</td>";
            echo "<td>" . $row['RacePayment'] . "</td>";
            echo "<td>" . $row['AudienceTicket'] . "</td>";
            echo "<td>" . $row['ParticipantFee'] . "</td>";
            echo "<td>" . $row['PrizeAmountOne'] . "</td>";
            echo "<td>" . $row['PrizeAmountTwo'] . "</td>";
            echo "<td>" . $row['PrizeAmountThree'] . "</td>";
            echo "<td>" . $row['PrizeAmountFour'] . "</td>";
            echo "<td>" . $row['PrizeAmountFive'] . "</td>";
            echo "<td>" . $row['PrizeAmountSix'] . "</td>";
            echo "<td>" . $row['PrizeAmountSeven'] . "</td>";
            echo "<td>" . $tokenNumber . "</td>";
            echo "<td><button class='btn-primary download-btn' data-serial='" . $serialNumber . "' data-name='" . $row['RaceName'] . "' data-address='" . $row['RaceAddress'] . "' data-racedate='" . $formattedRaceDate . "' data-lastadmission='" . $formattedRaceLastAdmissionDate . "' data-payment='" . $row['RacePayment'] . "' data-audience='" . $row['AudienceTicket'] . "' data-participant='" . $row['ParticipantFee'] . "' data-prizeone='" . $row['PrizeAmountOne'] . "' data-prizetwo='" . $row['PrizeAmountTwo'] . "' data-prizethree='" . $row['PrizeAmountThree'] . "' data-prizefour='" . $row['PrizeAmountFour'] . "' data-prizefive='" . $row['PrizeAmountFive'] . "' data-prizesix='" . $row['PrizeAmountSix'] . "' data-prizeseven='" . $row['PrizeAmountSeven'] . "' data-token='" . $tokenNumber . "' data-useremail='" . $UserEmailID . "' data-usermobile='" . $UserMobileNumber . "' data-paymentid='" . $paymentId . "'>Download</button></td>";
        
            echo "</tr>";
            $serialNumber++;
        }
        
        echo "</table>";
        sqlsrv_close($conn);
        ?>
        </div>
        <script src="assets/js/payslip.js"></script>
      </div>

      <div class="participant-content">
        <div id="participants-info" class="tab-content">
          <h5>Participants Race Information:</h5><br>
          <!-- Participants content content here -->
          <?php
          include 'gRconn.php';
          // $serverName = "110.227.185.209";
          // // $serverName = "SWYOM\GORACINGS";
          // $connectionOptions = array(
          //   "Database" => "Race",
          //   "Uid" => "sa",
          //   "PWD" => "Heshavi@123"
          // );
          // // Establishes the connection
          // $conn = sqlsrv_connect($serverName, $connectionOptions);
          
          // Checks if the connection is successful
          if ($conn === false) {
            echo "Failed to connect to the database.";
            die(print_r(sqlsrv_errors(), true));
          }


			if (!empty($_SESSION["UserEmailID"])){
				$UserEmailID = $_SESSION["UserEmailID"];
			}else
			{
				$UserEmailID = "@";
			}

			if (!empty($_SESSION["UserMobileNumber"])){
				$UserMobileNumber = $_SESSION["UserMobileNumber"];
			}else
			{
				$UserMobileNumber = "@";
			}

/////////////////////				

if(	$UserEmailID === "@"){
	
	$input = $UserMobileNumber; // You can change this to the user's email or mobile number
		
}else
{
	$input = $UserEmailID;
}

$sql = "{CALL GetUserDetails(?)}";

// Prepare the statement
$params = array(
    array(&$input, SQLSRV_PARAM_IN)
);
$stmt = sqlsrv_prepare($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Execute the statement
if (sqlsrv_execute($stmt)) {
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Fetch the results
        $UserMobileNumber = $row['UserMobileNumber'];
        $UserEmailID = $row['UserEmailID'];
    }
} else {
    die(print_r(sqlsrv_errors(), true));
}
			
//////////////////

		    $sql = "SELECT * FROM GetParticipantsManagement(?, ?)";
			$params = array($UserEmailID, $UserMobileNumber);
			$result = sqlsrv_query($conn, $sql, $params);


          // Query to execute the SQL function
          //$query = "SELECT * FROM GetParticipantsManagement()";

          // Executes the query
          //$result = sqlsrv_query($conn, $query);

          // Checks if the query execution is successful
          if ($result === false) {
            echo "Error executing query.";
            die(print_r(sqlsrv_errors(), true));
          }
          // Fetch payment details
          $sql = "{CALL GetParticipentsPaymentDetails}";
          $stmt = sqlsrv_query($conn, $sql);
          
          if ($stmt === false) {
              die(print_r(sqlsrv_errors(), true));
          }
          
          // Fetch and store payment details in an array
          $paymentDetails = array();
          while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
              $paymentDetails[$row['RacingAllotedTokenNumber']] = $row['paymentId'];
          }
          
                    // Start table HTML
                    echo "<table border='1'>";
                    // Table header
                    echo "<tr><th>Sr. No.</th><th>Selected Race</th><th>Race Date and Time</th><th>Race Last Admission Date and Time</th><th>Race Partcipant Fee</th><th>Race Token Number</th><th>Payment Slip</th></tr>";
                    $serialNumber = 1;
                    // Fetches the data and populate table rows
                    while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
                      // Change date format
                      $raceDate = new DateTime($row['RaceDateTime']);
                      $raceLastAdmissionDate = new DateTime($row['RaceLastAdmissionDateandTime']);
                      // Format dates
                      $formattedRaceDate = $raceDate->format('F j, Y \a\t g:i A');
                      $formattedRaceLastAdmissionDate = $raceLastAdmissionDate->format('F j, Y \a\t g:i A');
          
                      $tokenNumber = $row['ParticipentsAllotedTokenNumber'];
                      $paymentId = isset($paymentDetails[$tokenNumber]) ? $paymentDetails[$tokenNumber] : 'N/A';
          
                      // Start a new table row
                      echo "<tr>";
                      // Populate table cells with data
                      echo "<td style='text-align:center'>" . $serialNumber . "</td>";
                      echo "<td>" . $row['SelectedRace'] . "</td>";
                      echo "<td>" . $formattedRaceDate . "</td>";
                      echo "<td>" . $formattedRaceLastAdmissionDate . "</td>";
                      echo "<td>" . $row['RaceParticipentsFee'] . "</td>";
                      // echo "<td>" . $row['ParticipentsAllotedTokenNumber'] . "</td>";
                      echo "<td>" . $tokenNumber . "</td>";
                      echo "<td><button class='btn-primary P_download-btn' data-serial='" . $serialNumber . "' data-name='" . $row['SelectedRace'] . "' data-racedate='" . $formattedRaceDate . "' data-lastadmission='" . $formattedRaceLastAdmissionDate . "' data-participant='" . $row['RaceParticipentsFee'] . "' data-token='" . $tokenNumber . "' data-useremail='" . $UserEmailID . "' data-usermobile='" . $UserMobileNumber . "' data-paymentid='" . $paymentId . "'>Download</button></td>";
                      // echo "<td><button class='btn-primary P_download-btn' data-serial='" . $serialNumber . "' data-name='" . htmlspecialchars($row['RaceName'], ENT_QUOTES) . "' data-address='" . htmlspecialchars($row['RaceAddress'], ENT_QUOTES) . "' data-racedate='" . $formattedRaceDate . "' data-lastadmission='" . $formattedRaceLastAdmissionDate . "' data-payment='" . $row['RacePayment'] . "' data-audience='" . $row['AudienceTicket'] . "' data-participant='" . $row['ParticipantFee'] . "' data-prizeone='" . $row['PrizeAmountOne'] . "' data-prizetwo='" . $row['PrizeAmountTwo'] . "' data-prizethree='" . $row['PrizeAmountThree'] . "' data-prizefour='" . $row['PrizeAmountFour'] . "' data-prizefive='" . $row['PrizeAmountFive'] . "' data-prizesix='" . $row['PrizeAmountSix'] . "' data-prizeseven='" . $row['PrizeAmountSeven'] . "' data-token='" . $row['BookRaceOrganizersAllotedTokenNumber'] . "' data-useremail='" . $UserEmailID . "' data-usermobile='" . $UserMobileNumber . "' data-paymentid='" . $row['paymentId'] . "'>Download</button></td>";
                      // End the table row
                      echo "</tr>";
          
                      $serialNumber++;
                    }

          // End table HTML
          echo "</table>";
          // Closes the connection
          sqlsrv_close($conn);
          ?>

        </div>
        <script src="assets/js/participantPayslip.js"></script>
      </div>

      <div class="audience-content">
        <div id="audience-info" class="tab-content">
          <h5>Audience Booking Information:</h5><br>
          <!-- Audience content content here -->
          <?php

          include 'gRconn.php';
          // $serverName = "110.227.185.209";//"SWYOM\GORACINGS""your_server_name";
          // // $serverName = "SWYOM\GORACINGS";//"your_server_name";
          // $connectionOptions = array(
          //   "Database" => "Race",
          //   "Uid" => "sa",
          //   "PWD" => "Heshavi@123"
          // );
          // // Establishes the connection
          // $conn = sqlsrv_connect($serverName, $connectionOptions);
          
          // Checks if the connection is successful
          if ($conn === false) {
            echo "Failed to connect to the database.";
            die(print_r(sqlsrv_errors(), true));
          }



			if (!empty($_SESSION["UserEmailID"])){
				$UserEmailID = $_SESSION["UserEmailID"];
			}else
			{
				$UserEmailID = "@";	
			}

			if (!empty($_SESSION["UserMobileNumber"])){
				$UserMobileNumber = $_SESSION["UserMobileNumber"];
			}else
			{
				$UserMobileNumber = "@";
			}

/////////////////////				

if(	$UserEmailID === "@"){
	
	$input = $UserMobileNumber; // You can change this to the user's email or mobile number
		
}else
{
	$input = $UserEmailID;
}

$sql = "{CALL GetUserDetails(?)}";

// Prepare the statement
$params = array(
    array(&$input, SQLSRV_PARAM_IN)
);
$stmt = sqlsrv_prepare($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Execute the statement
if (sqlsrv_execute($stmt)) {
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        // Fetch the results
        $UserMobileNumber = $row['UserMobileNumber'];
        $UserEmailID = $row['UserEmailID'];
    }
} else {
    die(print_r(sqlsrv_errors(), true));
}
			
//////////////////


		    $sql = "SELECT * FROM GetAudienceManagement(?, ?)";
			$params = array($UserEmailID, $UserMobileNumber);
			$result = sqlsrv_query($conn, $sql, $params);

          // Query to execute the SQL function
          //$query = "SELECT * FROM  GetAudienceManagement()";

          // Executes the query
          //$result = sqlsrv_query($conn, $query);

          // Checks if the query execution is successful
          if ($result === false) {
            echo "Error executing query.";
            die(print_r(sqlsrv_errors(), true));
          }
          // Start table HTML
          echo "<table border='1'>";
          // Table header
          echo "<tr><th>Sr. No.</th><th>Selected Race</th><th>Race Date and Time</th><th>Audience Ticket</th><th>Race Token Number</th><th>Payment Slip</th></tr>";

          $serialNumber = 1;

          // Fetches the data and populate table rows
          while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            
            // Change date format
            $raceDate = new DateTime($row['RaceDateTime']);
            // Format dates
            $formattedRaceDate = $raceDate->format('F j, Y \a\t g:i A');
            // Start a new table row
            echo "<tr>";
            // Populate table cells with data
            echo "<td style='text-align:center'>" . $serialNumber . "</td>";
            echo "<td>" . $row['SelectedRace'] . "</td>";
            echo "<td>" . $formattedRaceDate . "</td>";
            echo "<td>" . $row['AudienceTicket'] . "</td>";
            echo "<td>" . $row['AudienceAllotedTokenNumber'] . "</td>";
            echo "<td><button class='btn-primary A_download-btn' data-serial='" . $serialNumber . "' data-name='" . $row['SelectedRace'] . "' data-racedate='" . $formattedRaceDate . "' data-participant='" . $row['AudienceTicket'] . "' data-token='" . $row['AudienceAllotedTokenNumber'] . "' data-useremail='" . $UserEmailID . "' data-usermobile='" . $UserMobileNumber . "' data-paymentid='" . $paymentId . "'>Download</button></td>";
            // End the table row
            echo "</tr>";

            $serialNumber++;
          }

          // End table HTML
          echo "</table>";
          // Closes the connection
          sqlsrv_close($conn);
          ?>
        </div>
        <script src="assets/js/audiencePayslip.js"></script>
      </div>
    </div>
  </div>
  <!-- profile area end -->

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
            <li>GPC 1, MIDC Road, Satara,</br> Maharashtra - 415001, India.</li>
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

</body>

</html>