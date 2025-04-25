<?php
session_start();
require 'db_connect.php'; // connect to Amazon RDS

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the user
    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Plaintext password check (not recommended for production)
        if ($password === $user['password']) {
            $_SESSION['isLoggedIn'] = true;
            $_SESSION['username'] = $username;
            header("Location: Home_page.php");
            exit();
        } else {
            $error_message = "Invalid password.";
        }
    } else {
        $error_message = "Username not found.";
    }

    $stmt->close();
    $conn->close();
}
?>

<?php include('includes/header.php'); ?>

<body class="login">

<?php include('includes/navbar.php'); ?>

<section class="py-5" style="background-color: #f9f9f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4 border-0">
                    <div class="card-body p-5">
                        <h2 class="mb-4 text-center">Login</h2>
                        <?php if (isset($error_message)) { ?>
                            <div class="alert alert-danger">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                        <form action="Login.php" method="post">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control rounded-pill text-dark" id="username" name="username" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control rounded-pill text-dark" id="password" name="password" required>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-dark rounded-pill">Login</button>
                            </div>

                            <div class="text-center">
                                <small>Don't have an account? <a href="Register.php">Register here</a></small>
                            </div>

                        </form>
                    </div>
                </div>
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
