<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="assets/js/calender.js"></script>

  <script>
    $(document).ready(function () {
      checkConnection(); // Call the function when the page loads
    });

    function checkConnection() {
      $.ajax({
        url: "gRconnection.php",
        type: "GET",
        success: function (response) {
          $("#connectionStatus").html(response);
        },
        error: function (xhr, status, error) {
          console.error(error);
        }
      });
    }
  </script>
  <title>GoRacings - Speed to win</title>

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

</head>

<body>


  <!-- ***** Preloader Start ***** -->
  <!-- <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div> -->
  <!-- ***** Preloader End ***** -->

  <div class="sub-header-1">
    <div class="logo">
      <a href="index.html">
        <img src="../goracings/images/goracingslogo.png" alt="Go Race">
      </a>
    </div>
    <div class="help-num">
      <p>Help Number. : +91 02040008444</p>
    </div>
  </div>
  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <nav class="main-nav">
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li><a href="index.html" class="active">Home</a></li>
            <li><a href="properties.html">Services</a></li>
            <li><a href="property-details.html">Galary</a></li>
            <li><a href="contact.html">Racing Norms</a></li>
          </ul>
          <a class='menu-trigger'>
            <span>Menu</span>
          </a>
          <!-- ***** Menu End ***** -->
        </nav>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** second sub Headerr Area start ***** -->
  <div class="sub-header-2">
    <div class="container">
      <div class="connect" id="connectionStatus">
        <!-- Site is under maintenance -->
      </div>
      <!-- <div class="king">
        <img src="../goracings/images/The Great Maratha.jpg" alt="The Great Maratha">
      </div> -->
    </div>
  </div>
  <!-- ***** second sub Headerr Area End ***** -->

  <div class="cal_banner_container">
    <!-- ***** Calender Area Start ***** -->
    <main class="calendar-contain">
      <section class="title-bar">
        <button class="title-bar__burger">
          <span class="burger__lines">Toggle Menu</span>
        </button>
        <span class="title-bar__year">
          Calendar > May 2017
        </span>
        <span class="title-bar__month">
          Month
        </span>
        <div class="title-bar__controls">
          <div class="title-bar__minimize"></div>
          <div class="title-bar__maximize"></div>
          <div class="title-bar__close"></div>
        </div>
      </section>
      <aside class="calendar__sidebar">
        <div class="sidebar__nav">
          <!-- Icons by Icons8 -->
          <span class="sidebar__nav-item"><img class="icon icons8-Plus-Math" width="22px" height="22px"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAWUlEQVRYR+2WMQoAIAgA9f+PrsWmEMQSEa7Z8rzEUmle2pxfABhvYFkPpQtJb7TEAGAAAxgoM3AO/v1YXoPPm4TtANHKy64AAAxgAANjDERB3bjXXzEA8w1s3k4WIU0YaEoAAAAASUVORK5CYII="></span>
          <span class="sidebar__nav-item"><img class="icon icons8-Share" width="22px" height="22px"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAB+klEQVRYR+2W0VEdMQxFDxUQKoBUkFABUAFQAaGDUEFCBQkVABUAFRAqgFRAUgFQQTJnxprx2/V67f3h5+nnzfNK8vXVteQN3tk23nl/1gCWMrAD/AD2UwlvgTPgtbekSwB8AJ4Bf3Nz84+9IJYAuAJOgAfgKGNgD7gGvvSwsATAH2Ab2MpOKxsvgN9kodl6AHha6279tRyAa5ZFE4R6UBez1gogaM8T/gKO08JNJsjw+ZmAVEG0AMg3Pwf8/wRsDjK/AZ+TBr6lbxfA1xqCOQDS7um0A8BTa1L+fSBC/0u/lsfJ0mQ55gCE4KyplPaYJ1czVWHWAHidLoG/mfB6AIQgvTGnqXSj+BoAaTusBTegCRbusnKthNUABP157Rv2XHGxVd/XylAD8C+lmtNJDVQ0KH2KeaaSDxuL104hhsrnmIhh5bWMxmWHHMWXABjwODFsdhtAdMWXANSGzaSYMkpCvE3DqgQgar902DiW7ZKl+JEWSgBKCUITttvhO2Coh1r8qKeUAASFpWHTMu+jhKX4UQmnRFgaNp7Ufu9Aqpk+MYxyP9mTyZVnW+0a2vu9RrZSBeWLJ9qr31wTqKaf3+18ce0iRtr1s7WP3ow9TcauJr0CqpkbullMzqpzD4BIZHLBeOpPafF3OqWbCrLZlgBoTt7iuAawZuA/xAh3Ifk/Dm0AAAAASUVORK5CYII="></span>
          <span class="sidebar__nav-item"><img class="icon icons8-Up" width="22px" height="22px"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAxklEQVRYR+3VwQ2DMAyF4Z8NOkI36AodpZ2sjMAoHaWdoJWlIEXI4RHnwMWROAH2ZxuSiZPXdHJ+EjDagUcZ4Rwd5QjAkr9K4icQQkQBdfK1+BAiAvCShxG9gG3b6xGExtED8Gb+K6VbnNA3cRTQCl4DzNKNOALYC7oFdCMUQFXkAboQCvAGbkDrF2sBasQXuAIfb7NSgAtwB5bGTrcHWBFWhF3uUgC1wyqAen/4NExAdiA7kB3IDmQH5GGjHhg9DVV8eT8Bf2HqNiEP+isaAAAAAElFTkSuQmCC"></span>
          <span class="sidebar__nav-item"><img class="icon icons8-Down" width="22px" height="22px"
              src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAA4UlEQVRYR+2WgQnCMBBFXzdwBSdwBUfRyXQER3EUN1AOEgnxLrkkhYCkUFpI7/+Xf1fajcnHNtmfBTCawDu0sFunuzAYL4CVwEpgJbAS+P8EDsAZeBj/DbUELsAznKpE7WMkxSfgCtwVhRKAmN+AF3AM1x+JGkAUkUINwgKo1X1BagDyYElMA3Cbi7gHoASRAzSZtwBYEClAs3krgAYhQxbnI73XBrbrLdCK0p3m69bbYv79e2cgF9Agms17WpCCdPU830lvAlFHIORw93xvALO33oXRBLw+uw/hsHEUmJ7ABzErNiGyzfJcAAAAAElFTkSuQmCC"></span>
        </div>
        <h2 class="sidebar__heading">Wednesday<br>April 6</h2>
        <ul class="sidebar__list">
          <li class="sidebar__list-item sidebar__list-item--complete"><span class="list-item__time">8.30</span> Team
            Meeting</li>
          <li class="sidebar__list-item sidebar__list-item--complete"><span class="list-item__time">10.00</span> Lunch
            with Sasha</li>
          <li class="sidebar__list-item"><span class="list-item__time">2.30</span> Design Review</li>
          <li class="sidebar__list-item"><span class="list-item__time">4.00</span> Get Groceries</li>
        </ul>
      </aside>
      <section class="calendar__days">
        <section class="calendar__top-bar">
          <span class="top-bar__days">Mon</span>
          <span class="top-bar__days">Tue</span>
          <span class="top-bar__days">Wed</span>
          <span class="top-bar__days">Thu</span>
          <span class="top-bar__days">Fri</span>
          <span class="top-bar__days">Sat</span>
          <span class="top-bar__days">Sun</span>
        </section>
        <section class="calendar__week">
          <div class="calendar__day inactive">
            <span class="calendar__date">30</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day inactive">
            <span class="calendar__date">31</span>
            <span class="calendar__task">4</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">1</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">2</span>
            <span class="calendar__task">3</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">3</span>
            <span class="calendar__task">1</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">4</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">5</span>
            <span class="calendar__task">4</span>
          </div>
        </section>
        <section class="calendar__week">
          <div class="calendar__day">
            <span class="calendar__date">6</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">7</span>
            <span class="calendar__task">3</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">8</span>
            <span class="calendar__task">3</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">9</span>
            <span class="calendar__task">1</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">10</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">11</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">12</span>
            <span class="calendar__task">1</span>
          </div>
        </section>
        <section class="calendar__week">
          <div class="calendar__day">
            <span class="calendar__date">13</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">14</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day today">
            <span class="calendar__date">15</span>
            <span class="calendar__task calendar__task--today">4 items</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">16</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">17</span>
            <span class="calendar__task">1</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">18</span>
            <span class="calendar__task">4</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">19</span>
            <span class="calendar__task">2</span>
          </div>
        </section>
        <section class="calendar__week">
          <div class="calendar__day">
            <span class="calendar__date">20</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">21</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">22</span>
            <span class="calendar__task">1</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">23</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">24</span>
            <span class="calendar__task">5</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">25</span>
            <span class="calendar__task">3</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">26</span>
            <span class="calendar__task">1</span>
          </div>
        </section>
        <section class="calendar__week">
          <div class="calendar__day">
            <span class="calendar__date">27</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day">
            <span class="calendar__date">28</span>
            <span class="calendar__task">1</span>
          </div>
          <div class="calendar__day inactive">
            <span class="calendar__date">1</span>
            <span class="calendar__task">2</span>
          </div>
          <div class="calendar__day inactive">
            <span class="calendar__date">2</span>
            <span class="calendar__task">1</span>
          </div>
          <div class="calendar__day inactive">
            <span class="calendar__date">3</span>
            <span class="calendar__task">5</span>
          </div>
          <div class="calendar__day inactive">
            <span class="calendar__date">4</span>
            <span class="calendar__task">3</span>
          </div>
          <div class="calendar__day inactive">
            <span class="calendar__date">5</span>
            <span class="calendar__task">1</span>
          </div>
        </section>
      </section>
    </main>
    <!-- ***** Calender Area End ***** -->

    <!--  ***** Baner Area Start ****  -->

    <div class="banner">
      <!-- <div class="main-banner"> -->
        <!-- <div class="owl-carousel owl-banner"> -->
          <div class="item item-1">
            <div class="header-text">
              <video width="auto" height="auto" autoplay muted loop playsinline>
                <source src="../goracings/images/one.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
              <!-- <span class="category">Toronto, <em>Canada</em></span>
              <h2>Hurry!<br>Get the Best Villa for you</h2> -->
            </div>
          </div>
          <div class="item item-2">
            <div class="header-text">
              <video width="auto" height="auto" autoplay muted loop playsinline>
                <source src="../goracings/images/two.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
              <!-- <span class="category">Melbourne, <em>Australia</em></span>
              <h2>Be Quick!<br>Get the best villa in town</h2> -->
            </div>
          </div>
          <div class="item item-3">
            <div class="header-text">
              <video width="auto" height="auto" autoplay muted loop playsinline>
                <source src="../goracings/images/three.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
              <!-- <span class="category">Melbourne, <em>Australia</em></span>
              <h2>Be Quick!<br>Get the best villa in town</h2> -->
            </div>
          </div>
          <div class="item item-4">
            <div class="header-text">
              <video width="auto" height="auto" autoplay muted loop playsinline>
                <source src="../goracings/images/four.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
              <!-- <span class="category">Melbourne, <em>Australia</em></span>
              <h2>Be Quick!<br>Get the best villa in town</h2> -->
            </div>
          </div>
          <div class="item item-5">
            <div class="header-text">
              <video width="auto" height="auto" autoplay muted loop playsinline>
                <source src="../goracings/images/five.mp4" type="video/mp4">
                Your browser does not support the video tag.
              </video>
              <!-- <span class="category">Melbourne, <em>Australia</em></span>
              <h2>Be Quick!<br>Get the best villa in town</h2> -->
            </div>
          </div>
          <!-- More video items here -->
        </div>
      <!-- </div> -->
    </div>
    <!-- *********Baner area End********* -->

    <!-- *********footer area********* -->
    <footer>
        <div class="footer-container">
          <div class="footer-column">
            <h4>SITEMAP</h4>
            <ul>
              <li><a href="#">Races</a></li>
              <li><a href="#">Promotions</a></li>
              <li>
                <div class="footer-logo">
                  <a href="index.php">
                  <img src="../goracings/images/goracingslogo.png" alt="Go Race" ></a>
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
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="">Terms and Conditions</a></li>
              <li><a href="#">Responsible Gaming</a></li>
            </ul>
          </div>
          <div class="footer-column">
            <h4>CONTACT</h4>
            <ul>
              <li>
                <div class="footer-logo">
                  <h4><span id="go">Go</span><span id="race">Racings</span></h4>
                </div>
              </li>
              <li><a href="#"></a></li>
              <li><a href="#">GPC 1, MIDC Road, Satara,</br> Maharashtra - 415001, India.</a></li>
            </ul>
          </div>
          <div class="footer-column">
            <h4>SOCIAL</h4>
            <ul>
              <li>
                <div class="footer-icon">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-youtube"></i></a>
                  <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
              </li>
              <li>email- help@goracings.com</a></li>
              <li>help no- 02040008444</li>
            </ul>
          </div>
        </div>
      </footer>


    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/counter.js"></script>
    <!-- <script src="assets/js/calender.js"></script> -->
    <script src="assets/js/custom.js"></script>

</body>

</html>