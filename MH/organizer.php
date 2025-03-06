
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
<html lang="mr">

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
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="assets/css/organizerform.css">
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

  <!-- ***** second sub Header Area start ***** --><div class="sub-header-2">
  <div class="menu-bar" onclick="toggleMenubar()"><i class="fa fa-bars"></i></div>
  <div class="columns">
    <div class="header-column-1">
      <h6><a href="audience.php">ऑडियन्स</a></h6>
    </div>
    <div class="header-column-2">
      <h6><a href="participants.php">सहभागी</a></h6>
    </div>
    <div class="header-column-3">
      <h6><a href="organizer.php" class="sub-header-2active">आयोजक</a></h6>
    </div>
    <div class="header-column-4">
      <h6><a href="profile.php">वापरकर्ता प्रोफाइल</a></h6>
    </div>
  </div>
  <div class="header-column-end">
    <?php if ($LogInshowButton): ?>
      <div class="dropdownIO">
          <button style="padding: 5px;"><img src="./images/user-login.png" alt="login" style="height:35px; width: 35px; padding:5px; border-radius:50%; background-color:#90e1f8;">आपले स्वागत आहे,</button>
          <div class="dropdownIO-options">
          <a href="lUser.php"><img src="./images/user-login.png" alt="login" style="height:35px; width: 35px; padding:5px; border-radius:50%; background-color:#90e1f8;"> लॉगिन <span><?php echo $LogInWith; ?></span></a>
            <a href="logout.php"><img src="./images/user-logout.png" alt="logout" style="height:35px; width: 35px; padding:5px;">लॉगऑउट</a>
          </div>
      </div>
    <?php endif; ?>
  </div>
</div>
<script>
  // JavaScript function to toggle the display of the menu items
  function toggleMenubar() {
    var menubar = document.querySelector('.columns');
    if (menubar.style.display === 'flex' || menubar.style.display === '') {
      menubar.style.display = 'none';
    } else {
      menubar.style.display = 'flex';
    }
  }
</script>
  <!-- ***** second sub Headerr Area End ***** -->
  
    <!-- organizer form start -->

    <div class="organizer-container">
        <h5>आयोजक रेस बूकिंग फॉर्म</h5>

        <form id="organizerRaceBookingForm" action="bookOrganizer.php" method="post" enctype="multipart/form-data" onsubmit="captureSignature()">
        <label for="race_name" id="race_name">शर्यतीचे नाव:</label>
            <select id="race_name" onchange="showOtherRaceInput(this)" name="race_name" >
                <option value="">शर्यतीचे नाव निवडा</option>
                <optgroup  label="Human Races"  >
                    <option value="Human Races- Caucasian/White">Human Races- Caucasian/White</option>
                    <option value="Human Races- Black/African American">Human Races- Black/African American</option>
                    <option value="Human Races-Asian">Human Races-Asian</option>
                    <option value="Human Races-Hispanic/Latino">Human Races- Hispanic/Latino</option>
                    <option value="Human Races-Native American/Indigenous">Human Races- Native American/Indigenous </option>
                    <option value="Human Races-Pacific Islander">Human Races- Pacific Islander</option>
                    <option value="Human Races-Mixed race">Human Races- Mixed race</option>
                </optgroup>

                <optgroup  label="Athletic Races"  >
                    <option value="Athletic Races- Sprint race (100m, 200m, etc.)">Athletic Races- Sprint race (100m, 200m, etc.)</option>
                    <option value="Athletic Races- Middle-distance race (400m, 800m)">Athletic Races- Middle-distance race (400m, 800m)</option>
                    <option value="Athletic Races- Long-distance race (1500m, 5000m, 10000m)">Athletic Races- Long-distance race (1500m, 5000m, 10000m)</option>
                    <option value="Athletic Races-Hurdles race">Athletic Races- Hurdles race</option>
                    <option value="Athletic Races-Relay race">Athletic Races- Relay race</option>
                    <option value="Athletic Races-Marathon">Athletic Races- Marathon</option>
                    <option value="Athletic Races- Triathlon (swimming, cycling, running)">Athletic Races- Triathlon (swimming, cycling, running)
                    </option>
                </optgroup>

                <optgroup  label="Animal Races" >
                    <option value="Animal Races- Horse race (e.g., Thoroughbred, Arabian, Quarter Horse)">Animal Races- Horse race (e.g., Thoroughbred, Arabian, Quarter Horse)</option>
                    <option value="Animal Races-Greyhound race">Animal Races- Greyhound race</option>
                    <option value="Animal Races-Camel race">Animal Races- Camel race</option>
                    <option value="Animal Races- Dog sled race (e.g., Iditarod)">Animal Races- Dog sled race (e.g., Iditarod)</option>
                    <option value="Animal Races- Pigeon race (e.g., homing pigeons)">Animal Races- Pigeon race (e.g., homing pigeons)</option>
                </optgroup>

                <optgroup  label="Bull Cart Race" >
                    <option value="Bull Cart Race First (800 M 1000 M)">Bull Cart Race First (800 M 1000 M)</option>
                    <option value="Bull Cart Race Second (1500 M 2000 M)">Bull Cart Race Second (1500 M 2000 M)</option>
                </optgroup>

                <optgroup  label="Motorsport Races" >
                    <option value="Motorsport Races-Formula 1 race">Motorsport Races- Formula 1 race</option>
                    <option value="Motorsport Races-NASCAR race">Motorsport Races- NASCAR race</option>
                    <option value="Motorsport Races-Rally race">Motorsport Races- Rally race</option>
                    <option value="Motorsport Races-Drag race">Motorsport Races- Drag race</option>
                    <option value="Motorsport Races- Motorcycle race (e.g., MotoGP)">Motorsport Races- Motorcycle race (e.g., MotoGP) </option>
                    <option value="Motorsport Races- Boat race (e.g., powerboat racing)">Motorsport Races- Boat race (e.g., powerboat racing) </option>
                </optgroup>

                <optgroup  label="Cycling Races" >
                    <option value="Cycling Races-Road race">Cycling Races- Road race</option>
                    <option value="Cycling Races-Time trial race">Cycling Races- Time trial race</option>
                    <option value="Cycling Races- Track race (e.g., pursuit, sprint)">Cycling Races- Track race (e.g., pursuit, sprint)</option>
                    <option value="Cycling Races-Mountain bike race">Cycling Races- Mountain bike race</option>
                    <option value="Cycling Races-BMX race">Cycling Races- BMX race</option>
                </optgroup>

                <optgroup  label="Water Races" >
                    <option value="Water Races- Swimming race (e.g., freestyle, breaststroke, butterfly)">Water Races- Swimming race (e.g., freestyle, breaststroke, butterfly)</option>
                    <option value="Water Races-Rowing race">Water Races- Rowing race</option>
                    <option value="Water Races-Canoe/kayak race">Water Races- Canoe/kayak race</option>
                    <option value="Water Races-Sailing race">Water Races- Sailing race</option>
                    <option value="Water Races-Surfing competition">Water Races- Surfing competition</option>
                </optgroup>

                <optgroup  label="Aerial Races" >
                    <option value="Aerial Races- Airplane race (e.g., Red Bull Air Race)">Aerial Races- Airplane race (e.g., Red Bull Air Race) </option>
                    <option value="Aerial Races-Drone race">Aerial Races- Drone race</option>
                    <option value="Aerial Races-Hot air balloon race">Aerial Races- Hot air balloon race</option>
                </optgroup>

                <optgroup  label="Virtual Races" >
                    <option value="Virtual Races- Esports racing (e.g., sim racing, iRacing">Virtual Races- Esports racing (e.g., sim racing, iRacing)</option>
                    <option value="Virtual Races-Virtual marathons">Virtual Races- Virtual marathons</option>
                    <option value="Virtual Races-Online cycling races">Virtual Races- Online cycling races</option>
                </optgroup>

                <optgroup  label="Space Races" >
                    <option value="Space Races- Spacecraft races (hypothetical or fictional, not currently a reality)">Space Races- Spacecraft races (hypothetical or fictional, not currently a reality)</option>
                </optgroup>

                <optgroup  label="Educational/Entertainment Races" >
                    <option value="Educational/Entertainment Races-Science races (e.g., robotics competitions)">Educational/Entertainment Races- Science races (e.g., robotics competitions)</option>
                    <option value="Educational/Entertainment Races-Game show races (e.g., The Amazing Race)">Educational/Entertainment Races- Game show races (e.g., The Amazing Race)</option>
                    <option value="Educational/Entertainment Races-Puzzle-solving races">Educational/Entertainment Races- Puzzle-solving races</option>
                </optgroup>

                <option value="newone" style="font-weight:bold;">इतर</option>
            </select>
            <input type="text" id="other_race" name="other_race" placeholder="Enter other race name" style="display:none">
            
            <label for="race_address">शर्यतीचा पत्ता:</label>
            <textarea id="race_address" name="race_address"></textarea>

            <label for="UserCountry">देश:</label>
            <select id="UserCountry" name="UserCountry" onchange="updateStates()">
                <option value="">देश निवडा</option>
                <option value="India">India</option>
                <option value="USA">USA</option>
                <!-- Add more country options here -->
            </select>

            <label for="UserState">राज्य:</label>
            <select id="UserState" name="UserState">
                <option value="">राज्य निवडा</option>
                <!-- State options will be dynamically populated here -->
            </select>

            <label for="UserDistirct">जिल्हा:</label>
            <select id="UserDistirct" name="UserDistirct">
                <option value="">जिल्हा निवडा</option>
                <!-- District options will be dynamically populated here -->
            </select>

            <label for="UserTaluka">तालुका:</label>
            <select id="UserTaluka" name="UserTaluka">
                <option value="">तालुका निवडा</option>
                <!-- Taluka options will be dynamically populated here -->
            </select>
            
            <label for='race_location'>रेसचे ठिकाण:</label>
            <label for='Latitude'>अक्षांश:</label>
            <input type='text' name='latitude' id='latitude' >
            <label for='Longitude'>रेखांश:</label>
            <input type='text' name='longitude' id='longitude' >
            
            <div id="map"></div>

            <label for="race_dt_time">रेसची तारीख आणि वेळ:</label>
            <input type="datetime-local" id="race_dt_time" name="race_dt_time">
            <input type="text" name="formatted_race_dt_time_1" id="formatted_race_dt_time_1" style="background-color: lightgray;" readonly>
 
            <label for="last_race_dt_time">रेस अंतिम प्रवेश तारीख आणि वेळ:</label>
            <input type="datetime-local" id="last_race_dt_time" name="last_race_dt_time">
            <input type="text" id="formatted_race_dt_time_2" name="formatted_race_dt_time_2" style="background-color: lightgray;" readonly>

            <label for="documents">कागदपत्रे:</label>

            <label for="o_photo_id">1. फोटो आयडी प्रूफ - "आधार कार्ड, ड्रायव्हिंग लायसन्स, पॅन कार्ड""</label>
            <input type="button" class="purple-button" value="फाइल निवडा" onclick="triggerFileInput('o_photo_id')">
            <span id="o_photo_id_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="o_photo_id" name="o_photo_id">

            <label for="gram_panchayat_agreement">2. ग्रामपंचायत करार</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('gram_panchayat_agreement')">
            <span id="gram_panchayat_agreement_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="gram_panchayat_agreement"
                name="gram_panchayat_agreement">

            <label for="race_permission_letter">3. रेस परवानगी पत्र</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('race_permission_letter')">
            <span id="race_permission_letter_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="race_permission_letter"
                name="race_permission_letter">

            <label for="race_permit_application">4. रेस परवानगी अर्ज</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('race_permit_application')">
            <span id="race_permit_application_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="race_permit_application"
                name="race_permit_application">

            <label for="route_map_course_certification">5. मार्ग नकाशा आणि अभ्यासक्रम प्रमाणन</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('route_map_course_certification')">
            <span id="route_map_course_certification_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="route_map_course_certification"
                name="route_map_course_certification">

            <label for="safety_emergency_plan">6. सुरक्षा आणि आपत्कालीन योजना</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('safety_emergency_plan')">
            <span id="safety_emergency_plan_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="safety_emergency_plan"
                name="safety_emergency_plan">

            <label for="insurance_documents">7. विमा कागदपत्रे</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('insurance_documents')">
            <span id="insurance_documents_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="insurance_documents"
                name="insurance_documents">

            <label for="PE_Agreements">8. कलाकार/मनोरंजन करार</label>
            <input type="button" class="purple-button" value="फाइल निवडा" onclick="triggerFileInput('PE_Agreements')">
            <span id="PE_Agreements_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="PE_Agreements" name="PE_Agreements">

            <label for="Participant_Registration_Forms">9. सहभागी नोंदणी फॉर्म</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('Participant_Registration_Forms')">
            <span id="Participant_Registration_Forms_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="Participant_Registration_Forms"
                name="Participant_Registration_Forms">

            <label for="Sponsorship_Agreement">10. प्रायोजकत्व करार</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('Sponsorship_Agreement')">
            <span id="Sponsorship_Agreement_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="Sponsorship_Agreement"
                name="Sponsorship_Agreement">

            <label for="Vendor_contracts">11. विक्रेता करार</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('Vendor_contracts')">
            <span id="Vendor_contracts_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="Vendor_contracts" name="Vendor_contracts">

            <label for="Volunteer_Agreements">12. स्वयंसेवक करार</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('Volunteer_Agreements')">
            <span id="Volunteer_Agreements_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="Volunteer_Agreements"
                name="Volunteer_Agreements">

            <label for="M_P_Materials">13. विपणन आणि प्रचारात्मक साहित्य</label>
            <input type="button" class="purple-button" value="फाइल निवडा" onclick="triggerFileInput('M_P_Materials')">
            <span id="M_P_Materials_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="M_P_Materials" name="M_P_Materials">

            <label for="Event_Schedule_Timelines">14. कार्यक्रमाचे वेळापत्रक आणि टाइमलाइन</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('Event_Schedule_Timelines')">
            <span id="Event_Schedule_Timelines_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="Event_Schedule_Timelines"
                name="Event_Schedule_Timelines">

            <label for="Budget_Financial_Reports">15. अर्थसंकल्प आणि आर्थिक अहवाल</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('Budget_Financial_Reports')">
            <span id="Budget_Financial_Reports_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="Budget_Financial_Reports"
                name="Budget_Financial_Reports">


            <label for="Environmental_Impact_Assessment">16. पर्यावरणीय प्रभाव मूल्यांकन (लागू असल्यास)</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('Environmental_Impact_Assessment')">
            <span id="Environmental_Impact_Assessment_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="Environmental_Impact_Assessment"
                name="Environmental_Impact_Assessment">

            <label for="PE_Evalution_Report">17. पोस्ट-इव्हेंट मूल्यांकन अहवाल</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('PE_Evalution_Report')">
            <span id="PE_Evalution_Report_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="PE_Evalution_Report"
                name="PE_Evalution_Report">

            <label for="Legal_Permits_Licenses">18. कायदेशीर परवाने आणि परवाने</label>
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('Legal_Permits_Licenses')">
            <span id="Legal_Permits_Licenses_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="Legal_Permits_Licenses"
                name="Legal_Permits_Licenses">

            <label for="Other_Documents">19. इतर कागदपत्रे</label>
            <!-- <input type="text" name="" id="Other_Documents" name="Other_Documents"> -->
            <input type="button" class="purple-button" value="फाइल निवडा"
                onclick="triggerFileInput('Other_Documents')">
            <span id="Other_Documents_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="Other_Documents" name="Other_Documents">
            <!-- <input type="button" class="purple-button"  value="Upload File" onclick="uploadFile('Other_Documents')"> -->

            <label for="prize_nomination">पारितोषिक नामांकन:</label>
            <div class="prize">
                <label for="prize_nomination_1">1</label>
                <input type="checkbox" id="prize_nomination_1" name="prize_nomination_1" onchange="toggleTextBox(this)">
                <label for="prize_nomination_2">2</label>
                <input type="checkbox" id="prize_nomination_2" name="prize_nomination_2" onchange="toggleTextBox(this)">
                <label for="prize_nomination_3">3</label>
                <input type="checkbox" id="prize_nomination_3" name="prize_nomination_3" onchange="toggleTextBox(this)">
                <label for="prize_nomination_4">4</label>
                <input type="checkbox" id="prize_nomination_4" name="prize_nomination_4" onchange="toggleTextBox(this)">
                <label for="prize_nomination_5">5</label>
                <input type="checkbox" id="prize_nomination_5" name="prize_nomination_5" onchange="toggleTextBox(this)">
                <label for="prize_nomination_6">6</label>
                <input type="checkbox" id="prize_nomination_6" name="prize_nomination_6" onchange="toggleTextBox(this)">
                <label for="prize_nomination_7">7</label>
                <input type="checkbox" id="prize_nomination_7" name="prize_nomination_7" onchange="toggleTextBox(this)">
            </div>

            <label for="prize_amount">पारितोषिक रक्कम किंवा पारितोषिक नाव:</label>
            <input type="text" id="prize_amount-1" name="prize_amount-1" style="display:none" placeholder="पहिल्या पारितोषिकाची रक्कम किंवा पहिल्या पारितोषिकाचे नाव">
            <input type="text" id="prize_amount-2" name="prize_amount-2" style="display:none" placeholder="दुसऱ्या पारितोषिकाची रक्कम किंवा दुसऱ्या पारितोषिकाचे नाव">
            <input type="text" id="prize_amount-3" name="prize_amount-3" style="display:none" placeholder="तिसऱ्या पारितोषिकाची रक्कम किंवा तिसऱ्या पारितोषिकाचे नाव">
            <input type="text" id="prize_amount-4" name="prize_amount-4" style="display:none" placeholder="चौथ्या पारितोषिकाची रक्कम किंवा चौथ्या पारितोषिकाचे नाव">
            <input type="text" id="prize_amount-5" name="prize_amount-5" style="display:none" placeholder="पाचव्या पारितोषिकाची रक्कम किंवा पाचव्या पारितोषिकाचे नाव">
            <input type="text" id="prize_amount-6" name="prize_amount-6" style="display:none" placeholder="सहाव्या पारितोषिकाची रक्कम किंवा सहाव्या पारितोषिकाचे नाव">
            <input type="text" id="prize_amount-7" name="prize_amount-7" style="display:none" placeholder="सातव्या पारितोषिकाची रक्कम किंवा सातव्या पारितोषिकाचे नाव">

    <label for="AudienceTicket">ऑडियन्स तिकिटाची रक्कम: (कर आणि सेवा शुल्क)</label>
    <div style="display: flex; justify-content: space-evenly; gap: 10px; width: 95%;">
        
        <input type="text" id="AudienceTicket" name="AudienceTicket" placeholder="INR रक्कम">
        <input type="text" value="00" id="AudienceTicketGST" style="background-color: lightgray;" name="AudienceTicketGST" readonly>
    </div>

    <label for="ParticipantFee">सहभागी तिकिटाची रक्कम: (कर आणि सेवा शुल्क)</label>
    <div style="display: flex; justify-content: space-between; gap: 10px; width: 95%;">
        
        <input type="text" id="ParticipantFee" name="ParticipantFee" placeholder="INR रक्कम">
        <input type="text" value="00" id="ParticipantFeeGST" style="background-color: lightgray;" name="ParticipantFeeGST" readonly>
    </div>

            <script>
                // Function to calculate GST
                function calculateGST(amount) {
                    const GST_RATE = 28; // GST rate is 28%
                    return (amount * GST_RATE) / 100;
                }

                // Function to calculate Service
                function calculateService(amount, gst) {
                    const SERVICE_RATE = 12; // Service rate is 12%
                    return ((amount + gst) * SERVICE_RATE) / 100;
                }

                // Function to calculate Total Ticket
                function calculateTotalTicket(amount, gst, service) {
                    return amount + gst + service;
                }

                // Function to update GST and Service fields
                function updateGSTAndService(inputId, gstInputId) {
                    const amount = parseFloat(document.getElementById(inputId).value);
                    const gst = calculateGST(amount);
                    const service = calculateService(amount, gst);
                    const totalTicket = calculateTotalTicket(amount, gst, service);
                    document.getElementById(gstInputId).value = totalTicket.toFixed(2); // Displaying Total Ticket amount
                }

                // Event listener to calculate and display Total Ticket when audience ticket input changes
                document.getElementById("AudienceTicket").addEventListener("input", function () {
                    updateGSTAndService("AudienceTicket", "AudienceTicketGST");
                });

                // Event listener to calculate and display Total Ticket when participant fee input changes
                document.getElementById("ParticipantFee").addEventListener("input", function () {
                    updateGSTAndService("ParticipantFee", "ParticipantFeeGST");
                });
            </script>

            <label for="race_payment">रेस पेमेंट रक्कम: (कर आणि सेवा शुल्क)</label>
            <input type="text" value="2870" id="race_payment" style="background-color: lightgray;" name="race_payment" readonly>

            <label for="bank_details">बँक तपशील:</label>
            <input type="text" id="bank_details" name="bank_details" placeholder="तुमचे बँकेचे नाव प्रविष्ट करा">

            <label for="accountno">बँक खाते क्रमांक:</label>
            <input type="text" id="accountno" name="accountno">

            <label for="IFSC_code">बँक IFSC कोड:</label>
            <input type="text" id="IFSC_code" name="IFSC_code">

            <label for="race_approval">आयोजकासाठी शर्यतीची मान्यता:</label>

            <div>
                <input type="range" min="0" max="1" value="0" step="1" class="slider" id="myRange" name="race_approval">
                <!-- <div id="result">Selected option: Not sending for approval</div> -->
            </div>

            <div id="result" style="padding: 10px;">निवडलेला पर्याय: मंजुरीसाठी पाठवलेला नाही</div>

            <label for="UserAllotedTokenNumber">युनिक कोड:</label>
            <input type="text" id="UserAllotedTokenNumber" name="UserAllotedTokenNumber" style="background-color: lightgray;" readonly>

            <label for="signature">स्वाक्षरी:</label>
            <canvas id="signature-pad"></canvas>
                
            <label for="Signatures_name">स्वाक्षरीचे नाव:</label>
            <input type="text" id="Signatures_name" name="Signatures_name">

            <input type="hidden" id="Signatures_name" name="Signatures_name">

            <button type="submit" id="organizersubmitbtn">आयोजक द्वारे रेस बुक</button>
        </form>

<script>	
$(document).ready(function() {
    $('#organizersubmitbtn').click(function(e) {
        e.preventDefault();

        var apiKey = 'rzp_test_L1hpOI6glBy9Yg'; // Replace with your Razorpay API Key
        var amount = parseFloat($('#race_payment').val()) * 100; // Convert to paise (assuming INR)

        var options = {
            key: apiKey,
            amount: amount,
            currency: 'INR',
            name: 'GoRacings.com',
            description: 'GoRacings Payment',
            handler: function(response) {
                // Send payment details to the server for verification
                var racePayment = $('#race_payment').val();
                var uniqueToken = $('#UserAllotedTokenNumber').val();

                $.post('verify_payment.php', {
                    razorpay_payment_id: response.razorpay_payment_id,
                    race_payment: racePayment,
                    UserAllotedTokenNumber: uniqueToken
                }, function(result) {					
                    // On successful verification, submit the form
                    if (result === 'success') {
                        $('#organizerRaceBookingForm').submit();
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
        $('#organizersubmitbtn').click(function(e) {
            e.preventDefault();

            // Replace with your Razorpay API Key
            var apiKey = 'rzp_test_L1hpOI6glBy9Yg';
            // var apiKey = 'rzp_live_BenzxXZGIlc8SZ';

            // Get the amount from the input field
            var amount = parseInt($('#race_payment').val()) * 100; // Convert to paise
            // var amount = parseFloat(($('#race_payment').val())) * 100; // Convert to paise
            // Format the amount to keep the decimal point representation
            // var amountFormatted = (amount / 100).toFixed(2);

            var options = {
                key: apiKey,
                amount: amount,
                currency: 'INR',
                name: 'GoRacings.com',
                description: 'GoRacings Payment',
                handler: function(response) {
                    // Send the payment ID to the server for verification
					// Get the race payment value
                    var racePayment = $('#race_payment').val();
					var uniqueToken = $('#UserAllotedTokenNumber').val();
                    $.post('verify_payment.php', {
                        razorpay_payment_id: response.razorpay_payment_id
						race_payment: racePayment
						UserAllotedTokenNumber: uniqueToken
                    }, function(result) {
                        alert(result);
                    });
                },
                prefill: {
                    name: 'Swtyomsoft Test',
                    email: 'marketing@swyomsoft.com',
                    contact: '+919404789920'
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
<!--<script>
    $(document).ready(function() {
        $('#organizersubmitbtn').click(function(e) {
            e.preventDefault();

            // Replace with your Razorpay API Key
            var apiKey = 'rzp_test_L1hpOI6glBy9Yg';

            // Replace with the amount to be charged
            var amount = 2870 * 100; // Example: ₹10

            var options = {
                key: apiKey,
                amount: amount,
                currency: 'INR',
                name: 'GoRacings.com',
                description: 'GoRacings Payment',
                handler: function(response) {
                    // Handle successful payment
                    alert('Payment successful. Payment ID: ' + response.razorpay_payment_id);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        
        document.addEventListener("DOMContentLoaded", function () {
            // Generate a unique code when the DOM is fully loaded
            generateUniqueId();
        });

        function generateUniqueId() {
            // Generate a unique ID
            var uniqueId = generateRandomId(); // You need to define this function

            // Display the unique ID in the input field
            document.getElementById("UserAllotedTokenNumber").value = uniqueId;
        }

        function generateRandomId() {
            // Generate a random ID
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var length = 8;
            var randomId = '';
            for (var i = 0; i < length; i++) {
                randomId += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return randomId;
        }
        $(document).ready(function () {
            // Initial call to ensure proper display on page load
            showOtherRaceInput($("#race_name"));
        });
        function showOtherRaceInput(selectElement) {
            var selectedValue = $(selectElement).val();
            var otherRaceInput = $("#other_race");
            if (selectedValue === "newone") {
                otherRaceInput.css("display", "inline-block");
            } else {
                otherRaceInput.css("display", "none");
            }
        }
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

        var canvas = document.getElementById('signature-pad');
        var ctx = canvas.getContext('2d');
        var drawing = false;
        var prevX = 0;
        var prevY = 0;

        function getPosition(event) {
            if (event.touches && event.touches.length > 0) {
                return {
                    x: event.touches[0].clientX - canvas.getBoundingClientRect().left,
                    y: event.touches[0].clientY - canvas.getBoundingClientRect().top
                };
            }
            return {
                x: event.clientX - canvas.getBoundingClientRect().left,
                y: event.clientY - canvas.getBoundingClientRect().top
            };
        }

        function startDrawing(event) {
            drawing = true;
            var pos = getPosition(event);
            prevX = pos.x;
            prevY = pos.y;
        }

        function draw(event) {
            if (!drawing) return;
            var pos = getPosition(event);
            ctx.beginPath();
            ctx.moveTo(prevX, prevY);
            ctx.lineTo(pos.x, pos.y);
            ctx.stroke();
            prevX = pos.x;
            prevY = pos.y;
        }

        function stopDrawing() {
            drawing = false;
        }

        canvas.addEventListener('mousedown', startDrawing);
        canvas.addEventListener('mousemove', draw);
        canvas.addEventListener('mouseup', stopDrawing);
        canvas.addEventListener('mouseleave', stopDrawing);

        // Touch events for mobile
        canvas.addEventListener('touchstart', function(event) {
            event.preventDefault();
            startDrawing(event);
        }, { passive: false });
        canvas.addEventListener('touchmove', function(event) {
            event.preventDefault();
            draw(event);
        }, { passive: false });
        canvas.addEventListener('touchend', function(event) {
            event.preventDefault();
            stopDrawing();
        }, { passive: false });

        function captureSignature() {
            var signatureCanvas = document.getElementById('signature-pad');
            var signatureData = signatureCanvas.toDataURL(); // Convert canvas content to data URL
            document.getElementById('signature_image_data').value = signatureData; // Store data URL in hidden input field
        }

        function toggleTextBox(checkbox) {
            var prizeAmountId = "prize_amount-" + checkbox.id.split("_")[2];
            var prizeAmountInput = document.getElementById(prizeAmountId);
            if (checkbox.checked) {
                prizeAmountInput.style.display = "inline";
            } else {
                prizeAmountInput.style.display = "none";
            }
        }
        document.addEventListener('DOMContentLoaded', function () {
            const datetimeInput1 = document.getElementById('race_dt_time');
            const datetimeInput2 = document.getElementById('last_race_dt_time');
            const formattedDisplay1 = document.getElementById('formatted_race_dt_time_1');
            const formattedDisplay2 = document.getElementById('formatted_race_dt_time_2');
            function updateFormattedDate1() {
                const datetimeValue = datetimeInput1.value;
                const date = new Date(datetimeValue);
                const options = { day: '2-digit', month: 'long', year: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
                const formattedDate = date.toLocaleDateString('en-US', options);
                formattedDisplay1.value = formattedDate;
            }
            function updateFormattedDate2() {
                const datetimeValue = datetimeInput2.value;
                const date = new Date(datetimeValue);
                const options = { day: '2-digit', month: 'long', year: 'numeric', hour: 'numeric', minute: 'numeric', second: 'numeric' };
                const formattedDate = date.toLocaleDateString('en-US', options);
                formattedDisplay2.value = formattedDate;
            }
            datetimeInput1.addEventListener('change', updateFormattedDate1);
            datetimeInput1.addEventListener('input', updateFormattedDate1);
            datetimeInput2.addEventListener('change', updateFormattedDate2);
            datetimeInput2.addEventListener('input', updateFormattedDate2);
        });
        const slider = document.getElementById('myRange');
        const result = document.getElementById('result');
        slider.addEventListener('input', function () {
            const value = parseInt(this.value);
            const text = value === 1 ? 'मंजुरीसाठी पाठवत आहे' : 'मंजुरीसाठी पाठवलेला नाही';
            result.textContent = `निवडलेला पर्याय: ${text}`;
        });
    </script>

    <!-- organizer form end -->

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
    <script src="assets/js/organizerform.js"></script>
    <script src="assets/js/state.js"></script>
  
</body>

</html>
