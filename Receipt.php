<?php
include('includes/header.php');
session_start();

$receiptNo = rand(100000000000, 999999999999);
$status = 'Paid';
date_default_timezone_set('Asia/Kuala_Lumpur');
$date = date('Y-m-d H:i:s');

$paymentMethod = 'Not Provided';
if (isset($_POST['payment_method'])) {
    $method = $_POST['payment_method'];
    if ($method === 'online' && isset($_POST['bank'])) {
        $paymentMethod = "Online Banking - " . htmlspecialchars($_POST['bank']);
    } elseif ($method === 'ewallet' && isset($_POST['ewallet_type'])) {
        $paymentMethod = "E-Wallet - " . htmlspecialchars($_POST['ewallet_type']);
    } else {
        $paymentMethod = ucfirst($method);
    }
}
?>

<body>
<?php include('includes/navbar.php'); ?>

<div class="container">
    <div class="receipt">
        <h2>Payment Receipt</h2>

        <div class="info">
            <p><strong>Receipt No:</strong> <?= $receiptNo ?></p>
            <p><strong>Status:</strong> <?= $status ?></p>
            <p><strong>Date:</strong> <?= $date ?></p>
            <p><strong>Payment Method:</strong> <?= $paymentMethod ?></p>
        </div>

        <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price (RM)</th>
                <th>Total (RM)</th>
            </tr>
            <tbody id="cart-table-body"></tbody>
        </table>

        <div class="total">
            <p>Subtotal: RM <span id="subtotal">0.00</span></p>
            <p>Delivery Fee: RM5.00</p>
            <strong>Total Paid: RM <span id="totalPaid">0.00</span></strong>
        </div>

        <form action="saveOrder.php" method="POST">
            <input type="hidden" name="receipt_number" value="<?= $receiptNo ?>">
            <input type="hidden" name="status" value="<?= $status ?>">
            <input type="hidden" name="date" value="<?= $date ?>">
            <input type="hidden" name="payment_method" value="<?= $paymentMethod ?>">
            <input type="hidden" name="subtotal" id="inputSubtotal">
            <input type="hidden" name="total_paid" id="inputTotalPaid">
            <input type="hidden" name="cart_data" id="cartDataJSON">
            <div class="back">
                <button type="submit" class="btn btn-secondary mt-2" onclick="window.location.href='Home_page.php'">Place Order</button>
            </div>
        </form>

    </div>
</div>

<?php include('includes/footer.php'); ?>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const tableBody = document.getElementById("cart-table-body");

    let subtotal = 0;
    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        subtotal += itemTotal;

        tableBody.innerHTML += `
            <tr>
                <td><strong>${item.name}</strong></td>
                <td>${item.quantity}</td>
                <td>${item.price.toFixed(2)}</td>
                <td>${itemTotal.toFixed(2)}</td>
            </tr>
        `;
    });

    const deliveryFee = 5.00;
    const total = subtotal + deliveryFee;

    document.getElementById("subtotal").innerText = subtotal.toFixed(2);
    document.getElementById("totalPaid").innerText = total.toFixed(2);
    document.getElementById("inputSubtotal").value = subtotal.toFixed(2);
    document.getElementById("inputTotalPaid").value = total.toFixed(2);
    document.getElementById("cartDataJSON").value = JSON.stringify(cart);
});
</script>
</body>
</html>
