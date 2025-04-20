<?php
session_start(); 

include('includes/header.php');
require 'db_connect.php';

if (!isset($_SESSION['username'])) {
  echo "User not logged in.";
  exit;
}

$username = $_SESSION['username'];

$query = "SELECT full_name, phone_number, delivery_address FROM user WHERE username = ?";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die("Database error: " . $conn->error);
}

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $row = $result->fetch_assoc()) {
    $name = $row['full_name'];
    $phone = $row['phone_number'];
    $address = $row['delivery_address'];
} else {
    $name = "N/A";
    $phone = "N/A";
    $address = "N/A";
}

$stmt->close();
$conn->close();
?>

<body> 
<?php
include('includes/navbar.php');
?>
<main class="page payment-page">
  <section class="payment-form dark">
    <div class="container">
      <div class="block-heading">
        <h2>Delivery Address</h2>
        <p><strong><?php echo $name . " (" . $phone . ")"; ?></strong></p>
        <p><?php echo $address; ?></p>
      </div>

      <form id="payment-form" action="Receipt.php" method="POST" onsubmit="return validatePaymentMethod()">
        <div class="products">
          <div class="card order-summary mb-4">
            <div class="card-header bg-light">
              <h4 class="mb-0">Checkout</h4>
            </div>
            <div class="item">
              <!-- Cart items will be inserted here dynamically -->
            </div>
          </div>
        </div>

        <!-- Hidden Product IDs -->
        <div class="product-hidden-inputs"></div>

        <!-- Order Summary -->
        <div class="card order-summary mb-4">
          <div class="card-header bg-light">
            <h4 class="mb-0">Order Summary</h4>
          </div>
          <div class="card-body">
            <div class="summary-item d-flex justify-content-between">
              <span>Subtotal:</span>
              <span>RM0.00</span> <!-- This will be updated dynamically -->
            </div>
            <div class="summary-item d-flex justify-content-between mb-2">
              <span>Delivery Fee:</span>
              <span>RM5.00</span>
            </div>
            <hr>
            <div class="summary-total d-flex justify-content-between font-weight-bold h5">
              <span>Total Payment:</span>
              <span>RM0.00</span> <!-- This will be updated dynamically -->
            </div>
          </div>
        </div>

        <!-- Payment Method -->
        <div class="card payment-methods mb-4">
          <div class="card-header bg-light">
            <h4 class="mb-0">Payment Method</h4>
          </div>
          <div class="card-body">
            <input type="hidden" name="payment_method" id="payment_method" value="">
            <div class="payment-options">
              <button type="button" class="btn btn-outline-primary mr-2" onclick="selectPaymentMethod(this, 'online')">Online Banking</button>
              <button type="button" class="btn btn-outline-primary" onclick="selectPaymentMethod(this, 'ewallet')">E-Wallet</button>
            </div>

            <!-- Online Banking Dropdown -->
            <div id="online-banking-fields" style="display: none;" class="mt-3">
              <div class="form-group">
                <label>Select Bank:</label>
                <select class="form-control" name="bank">
                  <option value="">-- Select Bank --</option>
                  <option value="Maybank">Maybank</option>
                  <option value="CIMB">CIMB</option>
                  <option value="Public Bank">Public Bank</option>
                  <option value="RHB">RHB</option>
                  <option value="Hong Leong">Hong Leong</option>
                </select>
              </div>
            </div>

            <!-- E-Wallet Dropdown -->
            <div id="ewallet-fields" style="display: none;" class="mt-3">
              <div class="form-group">
                <label>Select E-Wallet:</label>
                <select class="form-control" name="ewallet_type">
                  <option value="">-- Select E-Wallet --</option>
                  <option value="Touch 'n Go">Touch 'n Go</option>
                  <option value="Google Pay">Google Pay</option>
                  <option value="Apple Pay">Apple Pay</option>
                  <option value="Shopee Pay">Shopee Pay</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <!-- Place Order Button -->
        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary">Confirm Order</button>
        </div>
      </form>
    </div>
  </section>
</main>

<?php include('includes/footer.php'); ?>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
        <script>
        sessionStorage.setItem('isLoggedIn', 'true');
        </script>
<?php } ?>
<script>
  // Function to render the cart items and update order summary
  document.addEventListener('DOMContentLoaded', () => {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const container = document.querySelector('.products .item');
    const productIdsContainer = document.querySelector('.product-hidden-inputs');
    const summaryContainer = document.querySelector('.summary-item span:nth-child(2)');
    const totalContainer = document.querySelector('.summary-total span:nth-child(2)');

    // Clear existing items before rendering
    container.innerHTML = '';
    productIdsContainer.innerHTML = '';

    let subtotal = 0;

// Create table headers
container.innerHTML = `
  <table class="table table-bordered">
    <thead class="thead-light">
      <tr>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price (RM)</th>
        <th>Total (RM)</th>
      </tr>
    </thead>
    <tbody id="cart-table-body"></tbody>
  </table>
`;

const tableBody = document.getElementById("cart-table-body");

// Loop through the cart to render products
cart.forEach(item => {
  const itemTotal = item.price * item.quantity;
  subtotal += itemTotal;

  // Add each product row
  tableBody.innerHTML += `
    <tr>
      <td><strong>${item.name}</strong></td>
      <td>${item.quantity}</td>
      <td>${item.price.toFixed(2)}</td>
      <td>${itemTotal.toFixed(2)}</td>
    </tr>
  `;

  // Add hidden product IDs, quantities, and prices for backend processing
  productIdsContainer.innerHTML += `
    <input type="hidden" name="product_ids[]" value="${item.id}">
    <input type="hidden" name="quantities[]" value="${item.quantity}">
    <input type="hidden" name="prices[]" value="${item.price}">
  `;
});


    // Calculate totals
    const deliveryFee = 5.00;
    const total = subtotal + deliveryFee;

    // Update order summary dynamically
    summaryContainer.innerText = `RM${subtotal.toFixed(2)}`;
    totalContainer.innerText = `RM${total.toFixed(2)}`;
  });

  // Function to handle payment method selection
  function selectPaymentMethod(button, method) {
    document.querySelectorAll(".payment-options .btn").forEach(btn => {
      btn.classList.remove("btn-primary");
      btn.classList.add("btn-outline-primary");
    });

    button.classList.remove("btn-outline-primary");
    button.classList.add("btn-primary");

    document.getElementById("payment_method").value = method;

    document.getElementById("ewallet-fields").style.display = "none";
    document.getElementById("online-banking-fields").style.display = "none";

    if (method === "ewallet") {
      document.getElementById("ewallet-fields").style.display = "block";
    } else if (method === "online") {
      document.getElementById("online-banking-fields").style.display = "block";
    }
  }

  // Function to validate payment method before submission
  function validatePaymentMethod() {
    const method = document.getElementById('payment_method').value;

    if (method === "") {
      alert("Please select a payment method.");
      return false;
    }

    if (method === "online") {
      const bank = document.querySelector('select[name="bank"]').value;
      if (bank === "") {
        alert("Please select a bank for Online Banking.");
        return false;
      }
    }

    if (method === "ewallet") {
      const ewallet = document.querySelector('select[name="ewallet_type"]').value;
      if (ewallet === "") {
        alert("Please select an E-Wallet.");
        return false;
      }
    }

    return true;
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
