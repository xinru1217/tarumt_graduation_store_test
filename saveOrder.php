<?php
session_start();
require 'db_connect.php';

if (!isset($_SESSION['username'])) {
    die("User not logged in.");
}

$username = $_SESSION['username'];


$cartData = json_decode($_POST['cart_data'], true);
if (!$cartData) {
    die("Invalid or missing cart data.");
}


$stmt = $conn->prepare("SELECT user_id FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $userId = $row['user_id'];
} else {
    die("User not found.");
}
$stmt->close();


$receiptNo = $_POST['receipt_number'];
$status = $_POST['status'];
$date = $_POST['date'];
$subtotal = $_POST['subtotal'];
$deliveryFee = 5.00; // fixed value
$paymentMethod = $_POST['payment_method'];
$totalPaid = $_POST['total_paid'];

$orderStmt = $conn->prepare("INSERT INTO orders 
    (user_id, receipt_number, status, date, subtotal, delivery_fee, payment_method, total_paid)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$orderStmt->bind_param("isssddsd", $userId, $receiptNo, $status, $date, $subtotal, $deliveryFee, $paymentMethod, $totalPaid);
$orderStmt->execute();

$orderId = $orderStmt->insert_id; 
$orderStmt->close();


$itemStmt = $conn->prepare("INSERT INTO order_item (order_id, product_name, quantity) VALUES (?, ?, ?)");
foreach ($cartData as $item) {
    $productName = $item['name'];
    $quantity = $item['quantity'];
    $itemStmt->bind_param("isi", $orderId, $productName, $quantity);
    $itemStmt->execute();
}
$itemStmt->close();

$conn->close();


echo "<script>
    alert('Thankyou for your purchase.');
    localStorage.removeItem('cart');
    window.location.href = 'Home_page.php';
</script>";
?>
