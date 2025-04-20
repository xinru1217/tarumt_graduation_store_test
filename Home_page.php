<?php
include('includes/header.php');

session_start();
?>




<body class="homepage">
  <?php include('includes/navbar.php'); ?>

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill cart-count">(0)</span>
        </h4>
        <ul class="list-group mb-3" id="cart-items">
          <!-- Cart items will be dynamically added here -->
        </ul>
        <button class="w-100 btn btn-primary btn-lg" type="button" onclick="checkout()">Continue to Checkout</button>
      </div>
    </div>
  </div>

  <section id="billboard" class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <h1 class="section-title text-center mt-4" data-aos="fade-up">TARUMT GRADUATION STORE</h1>
        <div class="col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
          <p>"Celebrate your big day with stunning bouquets and floral gifts made just for grads."</p>
        </div>
      </div>
      <div class="row">
        <div class="py-4" data-aos="fade-up" data-aos-delay="600">
          <div class="banner-item image-zoom-effect">
            <div class="image-holder">
              <a href="#">
                <img src="images/homepage_banner.jpg" alt="product" class="img-fluid w-100">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="product" class="product product-carousel py-5 position-relative overflow-hidden">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
        <h4 class="text-uppercase">Bouquets</h4>
      </div>
      <div class="swiper product-swiper open-up" data-aos="zoom-out">
        <div class="swiper-wrapper d-flex">
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                <img src="images/bouquet_flowers_1.jpg" alt="categories" class="product-image img-fluid">
                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">Bloom & Grace</h5>
                  <a href="#" class="text-decoration-none add-to-cart" data-name="Bloom & Grace" data-price="59.90" data-after="Add to cart"><span>RM 59.90</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                <img src="images/bouquet_flowers_2.jpg" alt="product" class="product-image img-fluid">
                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">Flora & Fern</h5>
                  <a href="#" class="text-decoration-none add-to-cart" data-name="Flora & Fern" data-price="65.00" data-after="Add to cart"><span>RM 65.00</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                <img src="images/bouquet_flowers_3.jpg" alt="product" class="product-image img-fluid">
                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">Luxe Petals</h5>
                  <a href="#" class="text-decoration-none add-to-cart" data-name="Luxe Petals" data-price="74.90" data-after="Add to cart"><span>RM 74.90</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                <img src="images/bouquet_flowers_4.jpg" alt="product" class="product-image img-fluid">
                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">Botanical Bliss</h5>
                  <a href="#" class="text-decoration-none add-to-cart" data-name="Botanical Bliss" data-price="68.50" data-after="Add to cart"><span>RM 68.50</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                <img src="images/bouquet_flowers_5.jpg" alt="product" class="product-image img-fluid">
                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">Meadow Muse</h5>
                  <a href="#" class="text-decoration-none add-to-cart" data-name="Meadow Muse" data-price="72.90" data-after="Add to cart"><span>RM 72.90</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                <img src="images/bouquet_flowers_6.jpg" alt="product" class="product-image img-fluid">
                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">Wildflower Wishes</h5>
                  <a href="#" class="text-decoration-none add-to-cart" data-name="Wildflower Wishes" data-price="55.00" data-after="Add to cart"><span>RM55.00</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-left"></use>
        </svg></div>
      <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-right"></use>
        </svg></div>
    </div>
  </section>

  <section class="testimonials py-5 bg-light">
    <div class="section-header text-center mt-5">
      <h3 class="section-title">WHAT OUR GRADS LOVE</h3>
    </div>
    <div class="swiper testimonial-swiper overflow-hidden my-5">
      <div class="swiper-wrapper d-flex">
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <blockquote>
              <p>“The bouquet was stunning—fresh, vibrant, and perfect for graduation photos.”</p>
              <div class="review-title text-uppercase">Anna, Class of 2025</div>
            </blockquote>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <blockquote>
              <p>“Absolutely loved the flower crown! It made me feel so special on my big day.”</p>
              <div class="review-title text-uppercase">Maya, Nursing Graduate</div>
            </blockquote>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <blockquote>
              <p>“Beautifully arranged and arrived right on time. Everyone complimented them!”</p>
              <div class="review-title text-uppercase">Liam, Proud Brother</div>
            </blockquote>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <blockquote>
              <p>“Ordered flowers for my sister's graduation—she cried happy tears!”</p>
              <div class="review-title text-uppercase">Josh, Happy Customer</div>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
    <div class="testimonial-swiper-pagination d-flex justify-content-center mb-5"></div>
  </section>

  <?php include('includes/footer.php'); ?>

  <script src="js/jquery.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/SmoothScroll.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="js/script.min.js"></script>

  <?php if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']) { ?>
      <script>
      sessionStorage.setItem('isLoggedIn', 'true');
      </script>
  <?php } ?>



  <script>
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    function updateCartCount() {
      document.querySelectorAll('.cart-count').forEach(el => {
        el.textContent = (`(${cart.length})`);
      });
    }

    function saveCart() {
      localStorage.setItem('cart', JSON.stringify(cart));
      updateCartCount();
      renderCartSidebar();
    }

    function renderCartSidebar() {
      const cartList = document.querySelector("#offcanvasCart .list-group");
      cartList.innerHTML = ''; // Clear existing items

      let total = 0;

      cart.forEach((item, index) => {
        total += item.price * item.quantity;

        const li = document.createElement('li');
        li.className = "list-group-item d-flex justify-content-between lh-sm align-items-center";
        li.innerHTML = `
          <div>
            <h6 class="my-0">${item.name}</h6>
            <div class="d-flex align-items-center gap-2">
              <button class="btn btn-sm btn-outline-secondary decrease-qty" data-index="${index}">-</button>
              <span>${item.quantity}</span>
              <button class="btn btn-sm btn-outline-secondary increase-qty" data-index="${index}">+</button>
              <button class="btn btn-sm btn-danger remove-item" data-index="${index}">🗑</button>
            </div>
          </div>
          <span class="text-body-secondary">RM ${(item.price * item.quantity).toFixed(2)}</span>
        `;

        cartList.appendChild(li);
      });

      const totalLi = document.createElement('li');
      totalLi.className = "list-group-item d-flex justify-content-between";
      totalLi.innerHTML = `
        <span>Total (RM)</span>
        <strong>RM ${total.toFixed(2)}</strong>
      `;
      cartList.appendChild(totalLi);

      attachCartItemEvents(); // re-attach buttons
    }

    function attachCartItemEvents() {
      document.querySelectorAll('.increase-qty').forEach(btn => {
        btn.addEventListener('click', () => {
          const index = parseInt(btn.getAttribute('data-index'));
          cart[index].quantity++;
          saveCart();
        });
      });

      document.querySelectorAll('.decrease-qty').forEach(btn => {
        btn.addEventListener('click', () => {
          const index = parseInt(btn.getAttribute('data-index'));
          if (cart[index].quantity > 1) {
            cart[index].quantity--;
          } else {
            if (confirm("Remove this item from cart?")) {
              cart.splice(index, 1);
            }
          }
          saveCart();
        });
      });

      document.querySelectorAll('.remove-item').forEach(btn => {
        btn.addEventListener('click', () => {
          const index = parseInt(btn.getAttribute('data-index'));
          if (confirm("Are you sure you want to remove this item?")) {
            cart.splice(index, 1);
            saveCart();
          }
        });
      });
    }

    function showQuantityPopup(product) {
      const wrapper = document.createElement('div');
      wrapper.innerHTML = `
        <div class="quantity-popup" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%);
            background: white; border-radius: 12px; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.2); z-index: 9999; min-width: 250px;">

          <div style="display: flex; justify-content: space-between; align-items: center;">
            <h5 style="margin: 0;">Add "${product.name}"</h5>
            <button id="closePopup" style="border: none; background: transparent; font-size: 20px; line-height: 1; cursor: pointer;">&times;</button>
          </div>

          <div style="display: flex; align-items: center; justify-content: center; gap: 10px; margin: 15px 0;">
            <button id="decreaseQty" class="btn btn-outline-secondary">-</button>
            <span id="qtyValue">1</span>
            <button id="increaseQty" class="btn btn-outline-secondary">+</button>
          </div>

          <button class="btn btn-success w-100" id="confirmAdd">Add to Cart</button>
        </div>
      `;

      document.body.appendChild(wrapper);

      let qty = 1;
      wrapper.querySelector("#increaseQty").onclick = () => {
        qty++;
        wrapper.querySelector("#qtyValue").textContent = qty;
      };

      wrapper.querySelector("#decreaseQty").onclick = () => {
        if (qty > 1) qty--;
        wrapper.querySelector("#qtyValue").textContent = qty;
      };

      wrapper.querySelector("#confirmAdd").onclick = () => {
        const existing = cart.find(i => i.name === product.name);
        if (existing) {
          existing.quantity += qty;
        } else {
          cart.push({ ...product, quantity: qty });
        }
        saveCart();
        document.body.removeChild(wrapper);
        alert(`${product.name} added to cart!`);
      };

      wrapper.querySelector("#closePopup").onclick = () => {
        document.body.removeChild(wrapper);
      };
    }



    function checkout() {
      // Check if cart is empty or not initialized
      if (!cart || cart.length === 0) {
        alert('Your cart is empty. Please add items before checking out.');
        return; // Block checkout
      }

      // Check if user is logged in
      const isLoggedIn = sessionStorage.getItem('isLoggedIn');

      if (!isLoggedIn) {
        alert('Please log in to continue with the checkout.');
        window.location.href = 'Login.php'; // Redirect to login page
      } else {
        window.location.href = 'Checkout.php'; // Proceed to checkout page
      }
    }

    // Load cart on page load
    updateCartCount();
    renderCartSidebar();

    // Add event listener for "Add to Cart"
    document.querySelectorAll('.add-to-cart').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const product = {
          name: btn.getAttribute('data-name'),
          price: parseFloat(btn.getAttribute('data-price'))
        };
        showQuantityPopup(product);
      });
    });

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