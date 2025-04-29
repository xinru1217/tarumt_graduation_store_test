<?php include('includes/header.php'); ?>

<body class="register">
<?php include('includes/navbar.php'); ?>

<section class="py-5" style="background-color: #f9f9f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-body p-5">
                        <h2 class="mb-4 text-center">Register</h2>
                        <form id="registrationForm" onsubmit="return validateForm(event);">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control rounded-pill text-dark" id="username" name="username" required>
                                <div id="usernameError" class="text-danger mb-2"></div>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control rounded-pill text-dark" id="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control rounded-pill text-dark" id="confirmPassword" name="confirmPassword" required>
                                <div id="confirmPasswordError" class="text-danger mb-2"></div>
                            </div>

                            <div class="mb-3">
                                <label for="full_name" class="form-label">Full Name</label>
                                <input type="text" class="form-control rounded-pill text-dark" id="full_name" name="full_name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control rounded-pill text-dark" id="email" name="email" required>
                                <div id="emailError" class="text-danger mb-2"></div>
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="text" class="form-control rounded-pill text-dark" id="phone_number" name="phone_number" required pattern="^\d{3}-\d{8}$" title="Format: XXX-XXXXXXXX">
                            </div>

                            <div class="mb-4">
                                <label for="delivery_address" class="form-label">Delivery Address</label>
                                <textarea class="form-control rounded-pill text-dark" id="delivery_address" name="delivery_address" required></textarea>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-dark rounded-pill">Register</button>
                            </div>

                            <div class="text-center">
                                <small>Already have an account? <a href="Login.php">Login here</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php'); ?>

<!-- Scripts -->
<script src="js/jquery.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/SmoothScroll.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="js/script.min.js"></script>

<script>
    function validateForm(event) {
        event.preventDefault();

        // Clear old errors
        document.getElementById("usernameError").innerText = "";
        document.getElementById("emailError").innerText = "";
        document.getElementById("confirmPasswordError").innerText = "";

        // Get input values
        const username = document.getElementById("username").value;
        const password = document.getElementById("password").value;
        const confirmPassword = document.getElementById("confirmPassword").value;
        const full_name = document.getElementById("full_name").value;
        const email = document.getElementById("email").value;
        const phone_number = document.getElementById("phone_number").value;
        const delivery_address = document.getElementById("delivery_address").value;

        // Check password match
        if (password !== confirmPassword) {
            document.getElementById("confirmPasswordError").innerText = "Passwords do not match!";
            return false;
        }

        // AJAX to backend
        $.ajax({
            url: "registerUser.php",
            type: "POST",
            data: {
                username: username,
                password: password,
                confirmPassword: confirmPassword,
                full_name: full_name,
                email: email,
                phone_number: phone_number,
                delivery_address: delivery_address
            },
            success: function(response) {
                if (response.usernameTaken) {
                    document.getElementById("usernameError").innerText = "Username already taken!";
                } else if (response.emailTaken) {
                    document.getElementById("emailError").innerText = "Email already in use!";
                } else if (response.passwordMismatch) {
                    document.getElementById("confirmPasswordError").innerText = "Passwords do not match!";
                } else if (response.registrationSuccess) {
                    alert("Registration successful! Redirecting to login...");
                    window.location.href = "Login.php";
                } else {
                    alert("An unknown error occurred.");
                }
            },
            error: function(xhr, status, error) {
                alert("AJAX error: " + error);
            }
        });

        return false;
    }

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