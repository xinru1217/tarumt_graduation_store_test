<?php
include('includes/header.php');

session_start(); 
?>




<body class="home-1" data-aos-easing="fade-up" data-aos-duration="500" data-aos-delay="0">
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

    <!-- ============== Start contact section ========== -->
    <section class="container contact py-5" id="contact">
        <div class="heading ">
            <h1 class="title col-12 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                contact us for Any Questions
            </h1>
            <p class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">
                Our helpline is available to assist with your inquiries and feedback. Simply fill out the form below, and our team will get back to you as quickly as possible.
            </p>
        </div>
        <div class="row gx-6">
            <div class="col-12 col-lg-6 gy-3">
                <h2 class="title-2 aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">
                    contact info :
                </h2>
                <div class="info d-flex my-4 aos-init aos-animate" data-aos="fade-right" data-aos-delay="250">
                    <h5><i class="bi bi-envelope-fill mx-4"></i>graduationstore@tarumt.com</h5>
                </div>
                <div class="info d-flex my-4 aos-init" data-aos="fade-up" data-aos-delay="300">
                    <h5><i class="bi bi-phone-fill mx-4"></i>+011 23456789</h5>
                </div>
                <div class="info d-flex my-4 aos-init" data-aos="fade-up" data-aos-delay="350">
                    <h5><i class="bi bi-geo-alt-fill mx-4"></i>Ground Floor, Bangunan Tan Sri Khaw Kai Boh (Block A), Jalan Genting Kelang, Setapak, 53300 Kuala Lumpur, Federal Territory of Kuala Lumpur</h5>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <form action="contact.php" method="post">
                    <div class="col-12">
                        <div class="row g-3 mb-1">
                            <div class="col-lg-6 col-12" data-aos="fade-right" data-aos-delay="200">
                                <input placeholder="name" type="text" id="name" name="name" class="text-input" required>
                            </div>
                            <div class="col-lg-6 col-12" data-aos="fade-left" data-aos-delay="200">
                                <input placeholder="email" type="email" id="email" name="email" class="text-input" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" data-aos="fade-up" data-aos-delay="250">
                        <input placeholder="phone" type="text" id="phone" name="phone" class="text-input my-2" maxlength="12" pattern="^\d{3}-\d{8}$" title="Format: XXX-XXXXXXXX" required>
                    </div>
                    <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                        <textarea placeholder="message" class="text-input my-2" rows="7" cols="30" id="message" name="message" required></textarea>
                    </div>
                    <div class="col-12" data-aos="fade-up" data-aos-delay="250">
                        <button type="submit" class="btn">send now</button>
                    </div>
                </form>
            </div>
        </div>
        <iframe class="contact-map aos-init" data-aos-delay="350"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.53781216072!2d101.7265571!3d3.2152551999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc3843bfb6a031%3A0x2dc5e067aae3ab84!2sTunku%20Abdul%20Rahman%20University%20of%20Management%20and%20Technology%20(TAR%20UMT)!5e0!3m2!1sen!2smy!4v1744601600068!5m2!1sen!2smy" width="1300" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </section>
    <!-- ============== end contact section ========== -->

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