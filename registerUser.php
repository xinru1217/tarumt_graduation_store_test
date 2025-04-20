<?php
require 'db_connect.php';
header('Content-Type: application/json');

$response = [
    'usernameTaken' => false,
    'emailTaken' => false,
    'passwordMismatch' => false,
    'registrationSuccess' => false
];

// Get all input values
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$confirmPassword = $_POST['confirmPassword'] ?? '';
$full_name = $_POST['full_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone_number = $_POST['phone_number'] ?? '';
$delivery_address = $_POST['delivery_address'] ?? '';

// Optional backend password match validation
if ($password !== $confirmPassword) {
    $response['passwordMismatch'] = true;
    echo json_encode($response);
    exit;
}

// Check if username exists
$stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $response['usernameTaken'] = true;
    echo json_encode($response);
    exit;
}
$stmt->close();

// Check if email exists
$stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $response['emailTaken'] = true;
    echo json_encode($response);
    exit;
}
$stmt->close();

// Insert the new user
$stmt = $conn->prepare("INSERT INTO user (username, password, full_name, email, phone_number, delivery_address) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $username, $password, $full_name, $email, $phone_number, $delivery_address);

if ($stmt->execute()) {
    $response['registrationSuccess'] = true;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
