<?php
// Check if the request is not using HTTPS
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    // Redirect to the HTTPS version of the page
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}
// Start the session
session_start();
if (isset($_SESSION['LECaptcha']) && $_SESSION['LECaptcha'] === "yes") {
  $emailCaptcha = true;
} else {
  $error_message = "वापरकर्त्याने योग्य कॅप्चा भरावा.";
  $emailCaptcha = false;
}

$color = "brown";
// Check if the session variable is set
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true && $emailCaptcha === true) {

  $LogInshowButton = true;
  $LogInWith = $_SESSION["loginCredential"];

  $error_message = "GoRacingsमध्ये आपले स्वागत आहे.";

  // JavaScript code to create a popup alert with yellow color
  echo '<script>';
  echo 'setTimeout(function() {';
  echo '    var alertMessage = document.createElement("div");';
  echo '    alertMessage.innerHTML = "' . $error_message . '";';
  echo '    alertMessage.style.backgroundColor = "yellow";'; // Set background color to yellow
  echo '    alertMessage.style.color = "black";'; // Set text color to black
  echo '    alertMessage.style.fontSize = "15px";';
  echo '    alertMessage.style.padding = "5px";'; // Add padding for better visibility
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
    $error_message = "योग्य क्रेडेन्शियल्स वापरा.";
  } else {
    $error_message = "तुमच्या खात्यात लॉग इन करून विशेष रेस वैशिष्ट्यांचा आनंद घ्या.";
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

  <meta charset="utf-8">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>GoRacings - Speed to win</title>
  <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="../goracings/assets/css/fontawesome.css">
  <link rel="stylesheet" href="../goracings/assets/css/styles.css">
  <link rel="stylesheet" href="../goracings/assets/css/owl.css">
  <link rel="stylesheet" href="../goracings/assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!-- <link rel="stylesheet" href="Login/login.css"> -->
  <link rel="stylesheet" href="../goracings/assets/css/calender.css">

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
  <script>
    $(document).ready(function () {
      $('.dropdown-service, .dropdown-norms').click(function (event) {
        event.preventDefault();
        alert('पहिले लॉगिन करणे आवश्यक आहे');
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
      <p>सहाय्यता क्रमांक: +91 02040008444</p>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <nav class="main-nav">
        <!-- ***** Menu Start ***** -->
        <ul class="nav">
          <li><a href="index.php" class="active">मुख्यपृष्ठ</a></li>
          <li class="dropdown-service">
            <button>सेवाएं</button>
            <div class="dropdown-menu">
              <a href="#">रेस ऑडियन्स टिकट बुकिंग</a>
              <a href="#">रेस ऑडियन्स टिकट रद्द करणे</a>
              <a href="#">रेस प्रतिभागी सहभागी होणे</a>
              <a href="#">रेस सहभाग रद्द करणे</a>
              <a href="#">रेस आयोजक रेस आयोजित करणे</a>
              <a href="#">रेस आयोजक रेस रद्द करणे</a>
              <a href="#">रेस जाहिरात</a>
            </div>
          </li>
          <li><a href="gallery.php">गॅलरी</a></li>
          <li class="dropdown-norms">
            <button>रेसिंग नियम</button>
            <div class="dropdown-menu">
              <a href="racingnorms.php">रेसिंग नियम</a>
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
<div class="sub-header-2">
    <div ></div>
    <div class="header-column-end">
      <?php if ($LogInshowButton): ?>
        <div class="dropdownIO">
          <button style="padding: 5px;">Welcome,</button>
          <div class="dropdownIO-options">
            <a href="lUser.php"><i class="fa fa-user"></i> Login With <span><?php echo $LogInWith; ?></span></a>
            <a href="logout.php"><i class="fa fa-sign-out" style="padding: 5px;"></i>Logout</a>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <!-- ***** second sub Headerr Area End ***** -->

  <div class="cal_banner_container">
    <!-- ***** Calender Area Start ***** -->
    <div class="calendar-contain">
      <div class="calendar-titlebar">
        <div class="calendar-Heading">
        रेस कॅलेंडर
        </div>
        <div class="calendar-controls">
          <label for="select-year">वर्ष:</label>
          <select id="select-year" onchange="changeCalendar()"></select>
          <label for="select-month">महिना:</label>
          <select id="select-month" onchange="changeCalendar()">
          <option value="0">जानेवारी</option>
            <option value="1">फेब्रुवारी</option>
            <option value="2">मार्च</option>
            <option value="3">एप्रिल</option>
            <option value="4">मे</option>
            <option value="5">जून</option>
            <option value="6">जुलै</option>
            <option value="7">ऑगस्ट</option>
            <option value="8">सप्टेंबर</option>
            <option value="9">ऑक्टोबर</option>
            <option value="10">नोव्हेंबर</option>
            <option value="11">डिसेंबर</option>
          </select>
          <div class="calendar-navigation">
            <span><img class="icon icons8-Up" onclick="prevMonth()" width="16px" height="16px"
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAxklEQVRYR+3VwQ2DMAyF4Z8NOkI36AodpZ2sjMAoHaWdoJWlIEXI4RHnwMWROAH2ZxuSiZPXdHJ+EjDagUcZ4Rwd5QjAkr9K4icQQkQBdfK1+BAiAvCShxG9gG3b6xGExtED8Gb+K6VbnNA3cRTQCl4DzNKNOALYC7oFdCMUQFXkAboQCvAGbkDrF2sBasQXuAIfb7NSgAtwB5bGTrcHWBFWhF3uUgC1wyqAen/4NExAdiA7kB3IDmQH5GGjHhg9DVV8eT8Bf2HqNiEP+isaAAAAAElFTkSuQmCC"></span>
            <span><img class="icon icons8-Down" onclick="nextMonth()" width="16px" height="16px"
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAA4UlEQVRYR+2WgQnCMBBFXzdwBSdwBUfRyXQER3EUN1AOEgnxLrkkhYCkUFpI7/+Xf1fajcnHNtmfBTCawDu0sFunuzAYL4CVwEpgJbAS+P8EDsAZeBj/DbUELsAznKpE7WMkxSfgCtwVhRKAmN+AF3AM1x+JGkAUkUINwgKo1X1BagDyYElMA3Cbi7gHoASRAzSZtwBYEClAs3krgAYhQxbnI73XBrbrLdCK0p3m69bbYv79e2cgF9Agms17WpCCdPU830lvAlFHIORw93xvALO33oXRBLw+uw/hsHEUmJ7ABzErNiGyzfJcAAAAAElFTkSuQmCC"></span>
          </div>
        </div>
      </div>
      <div class="calendar-event-dates">
        <div id="sidebar">
          <div class="calendar-date">
            <span id="date-selected"></span>
          </div>
          <h6>Events</h6>
          <ul id="event-list"></ul>
        </div>
        <div id="main">
          <div id="calendar"></div>
        </div>

      </div>
    </div>
    <!-- ***** Calender Area End ***** -->

    <!--  ***** Baner Area Start ****  -->

    <div class="banner">
      <!-- <div class="main-banner"> -->
      <!-- <div class="owl-carousel owl-banner"> -->
      <div class="item item-5">
        <div class="header-text">
          <video width="auto" height="auto" autoplay muted loop playsinline>
            <source src="images/G0RACINGS.mp4" type="video/mp4">
            Your browser does not support the video tag.
            <span class="category">Melbourne, <em>Australia</em></span>
            <h2>Be Quick!<br>Get the best villa in town</h2>
          </video>
        </div>
      </div>
      <!-- More video items here -->
    </div>
    <!-- *********Baner area End********* -->

    <!-- **** King image start**** -->
    <div class="king-img">
      <img src="images/The Great Maratha.jpg" alt="The Great Ruller">
      <h4>"श्री छत्रपती शिवाजी महाराज"</h4>
    </div>
    <!-- **** King image end**** -->
  </div>

  <!-- **** Image Slider Start **** -->
  <div class="img-slider-contain">
    <div class="slider-container">
      <div class="slider-image">
        <div class="slide-img highlighted">
          <img src="images/BikeRace.jpg" alt="1">
        </div>
        <div class="slide-img">
          <img src="images/BullCartRace.jpg" alt="2">
        </div>
        <div class="slide-img">
          <img src="images/bullock-cart-race.jpg" alt="3">
        </div>
        <div class="slide-img">
          <img src="images/CarRace.jpg" alt="4">
        </div>
        <div class="slide-img">
          <img src="images/CycleRace.jpg" alt="5">
        </div>
        <div class="slide-img">
          <img src="images/DogRace.jpg" alt="6">
        </div>
        <div class="slide-img">
          <img src="images/HorceRace.jpg" alt="7">
        </div>
        <div class="slide-img">
          <img src="images/HumanRace.jpg" alt="8">
        </div>
        <div class="slide-img">
          <img src="images/kambala-race.jpg" alt="9">
        </div>
        <div class="slide-img">
          <img src="images/RacingCar.jpg" alt="10">
        </div>
        <div class="slide-img">
          <img src="images/HorceRacings.jpg" alt="11">
        </div>
        <div class="slide-img">
          <img src="images/motorboatrace.jpg" alt="12">
        </div>
        <div class="slide-img">
          <img src="images/kambala-race.jpg" alt="13">
        </div>
        <div class="slide-img">
          <img src="images/RacingCar.jpg" alt="14">
        </div>
        <div class="slide-img">
          <img src="images/HorceRacings.jpg" alt="15">
        </div>
      </div>
    </div>

    <div class="control-btns">
      <div onclick="prevSlide()" class="control-prev-btn">
        <i class="fas fa-arrow-left"></i>
      </div>
      <div class="dots"></div>
      <div onclick="nextSlide()" class="control-next-btn">
        <i class="fas fa-arrow-right"></i>
      </div>
    </div>
  </div>

  <script>
    // Get all slide images
    const slideImages = document.querySelectorAll(".slide-img img");
    const slideContainers = document.querySelectorAll(".slide-img");
    const dotsContainer = document.querySelector('.dots');
    let currentIndex = 0;

    // Add dots dynamically
    slideImages.forEach((item, index) => {
      let dot = document.createElement('div');
      dot.classList.add('dot');
      if (index === 0) dot.classList.add('active');
      dotsContainer.appendChild(dot);

      // Add event listener to dots for navigation
      dot.addEventListener('click', () => {
        goToSlide(index);
      });
    });

    function goToSlide(index) {
      // Scroll to the selected slide
      const sliderWidth = document.querySelector('.slider-container').offsetWidth;
      const imageWidth = document.querySelector('.slide-img').offsetWidth + 20; // Adjusted for margin
      const slidesToShow = Math.floor(sliderWidth / imageWidth);
      const start = Math.max(0, index - Math.floor(slidesToShow / 2));
      const end = Math.min(slideImages.length - slidesToShow, start);
      const finalIndex = end === slideImages.length - slidesToShow ? end : start;
      document.querySelector('.slider-image').style.transform = `translateX(-${finalIndex * imageWidth}px)`;
      // Update dot status
      updateDots(index);
      // Highlight active image
      highlightImage(index);
      currentIndex = index;
    }

    function updateDots(index) {
      const dots = document.querySelectorAll('.dot');
      dots.forEach(dot => dot.classList.remove('active'));
      dots[index].classList.add('active');
    }

    function highlightImage(index) {
      slideContainers.forEach((container, idx) => {
        if (idx === index) {
          container.classList.add('highlighted');
        } else {
          container.classList.remove('highlighted');
        }
      });
    }

    function prevSlide() {
      const newIndex = (currentIndex - 1 + slideImages.length) % slideImages.length;
      goToSlide(newIndex);
    }

    function nextSlide() {
      const newIndex = (currentIndex + 1) % slideImages.length;
      goToSlide(newIndex);
    }
  </script>
  <!-- **** image slider end **** -->

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
      <span>&copy; २०२४. स्वयम, स्वयमसॉफ्ट आणि स्वयम एंटरप्रायझेस.</span> सर्व हक्क राखीव.
    </p>
    </div>
    <div class="connection_line2">
      <div id="status-dot" class="connection_dot"></div>
    </div>
  </footer>
  <!-- **** फूटर क्षेत्र समाप्त **** -->
  
  <!-- Scripts -->
  <script>
    // function showLoginForm() {
    //   var loginForm = document.getElementById("loginForm");
    //   loginForm.style.display = "block";

    //   var loginBtn = document.getElementById("loginBtn");
    //   var logoutBtn = document.getElementById("logoutBtn");
    //   loginBtn.style.display = "none";
    //   logoutBtn.style.display = "block";
    // }

    function logout() {
      // Here you can implement logout functionality, like clearing session data, etc.
      var loginForm = document.getElementById("loginForm");
      loginForm.style.display = "none";

      var loginBtn = document.getElementById("loginBtn");
      var logoutBtn = document.getElementById("logoutBtn");
      loginBtn.style.display = "block";
      logoutBtn.style.display = "none";
    }
  </script>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/counter.js"></script>
  <script src="assets/js/calendar.js"></script>
  <script src="assets/js/custom.js"></script>
</body>

</html>