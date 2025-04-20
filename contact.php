<?php
require 'db_connect.php';

// Validate input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Basic validation
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        echo "<script>
            alert('Please fill in all fields.');
            window.history.back();
        </script>";
        exit;
    }

    // Insert into contact table
    $stmt = $conn->prepare("INSERT INTO contact (name, email, phone, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $message);

    if ($stmt->execute()) {
        echo "<script>
            alert('Thank you for contacting us. We will get back to you soon.');
            window.location.href = 'Home_page.php';
        </script>";
    } else {
        echo "<script>
            alert('Something went wrong. Please try again later.');
            window.history.back();
        </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>
        alert('Invalid request.');
        window.location.href = 'Home_page.php';
    </script>";
}
?>
