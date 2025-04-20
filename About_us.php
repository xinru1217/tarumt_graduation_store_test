<?php
include('includes/header.php');
?>

<?php
$subtitle = "Welcome to <span class='unique-text'>TARUMT graduation store</span>";
$description = "TARUMT graduation store is the perfect place to find beautiful graduation flower gifts. We are making fresh and lovely flower arrangements to celebrate your big day. Whether you're saying 'well done' to a friend or giving a gift to someone special, our flowers help you share your feelings in a special way.";
$shopLink = "home.php";
$imageSrc = "images/Graduation flowers.jpg";


session_start(); // Start the session


?>



<body data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0">
<?php include('includes/navbar.php'); ?>

  <div id="preloader" style="display: none;">
    <svg id="mainSVG" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600" style="visibility: visible;">
      <defs>
        <radialGradient id="mainGrad" cx="446.573067" cy="300" fx="446.573067" fy="300" r="100"
          gradientUnits="userSpaceOnUse">
          <stop offset=".68" stop-color="#21df51"></stop>
          <stop offset=".72" stop-color="#3add63"></stop>
          <stop offset=".77" stop-color="#4fdd73"></stop>
          <stop offset=".82" stop-color="#66db83"></stop>
          <stop offset=".88" stop-color="#7cd893"></stop>
          <stop offset=".93" stop-color="#95d8a6"></stop>
          <stop offset=".99" stop-color="#bde6c7"></stop>
          <stop offset="1" stop-color="#e3f1e7"></stop>
        </radialGradient>
      </defs>
      <circle id="fillDot" cx="400" cy="300" fill="#21df51" r="100" data-svg-origin="300 200"
        transform="matrix(1,0,0,1,24.6563,0)" style="translate: none; rotate: none; scale: none;"></circle>
      <circle id="gradDot" cx="400" cy="300" fill="url(#mainGrad)" r="100" data-svg-origin="300 200"
        transform="matrix(1,0,0,1,-24.6563,0)" style="translate: none; rotate: none; scale: none;"></circle>
    </svg>
  </div>
  
  <!-- About Section -->
  <section class="about py-5 mt-5" id="about" data-aos="fade-up" data-aos-delay="300">
    <div class="container">
      <div class="row mt-5 justify-content-center align-items-center">
        <div class="col-12 col-lg-6">
          <h1 class="title aos-init" data-aos="fade-up" data-aos-delay="250">
            <?php echo $subtitle; ?>
          </h1>
          <div>
            <p>
              <?php echo $description; ?>
            </p>
            <p>
              🌸 Make your graduation even more meaningful with Flowers. Because every success deserves to bloom beautifully. 🌸<br>
            </p>
            <p>
              📍 Please visit us!<br>
              Explore our exclusive graduation collections and premium floral gifts on our website, or visit our store for a personalized floral experience.<br>
            </p>
          </div>
          <div class="col-12 aos-init" data-aos="fade-up" data-aos-delay="350">
          <a class="nav-link" href="Home_page.php"><button type="Shop" value="Shop" class="btn">shop now</button></a>
          </div>
        </div>
        <div class="col-12 col-lg-6 d-flex align-items-center aos-init" data-aos="fade-left" data-aos-delay="100">
          <img src="<?php echo $imageSrc; ?>" alt="TARUMT graduation store" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <?php include('includes/footer.php'); ?>

  <script src="js/jquery.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/SmoothScroll.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="js/script.min.js"></script>
  <script src="js/jquery-3.6.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.0/vanilla-tilt.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <script src="js/isotope.min.js"></script>
  <script src="js/main.js"></script>
  <?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
    <script>
      sessionStorage.setItem('isLoggedIn', 'true');
    </script>
  <?php } ?>
  <script>
      document.getElementById('logoutBtn').addEventListener('click', function (e) {
      e.preventDefault();

      const isLoggedIn = sessionStorage.getItem('isLoggedIn');

      if (!isLoggedIn) {
        alert('You are not logged in. Please log in first.');
        window.location.href = 'Login.php';
      } else {
        localStorage.removeItem('cart');
        sessionStorage.removeItem('isLoggedIn');
        alert('You have been logged out.');
        window.location.href = 'Logout.php';
      }
    });
  </script>

</body>

</html>