<nav class="navbar navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="./index.php">OKSI FASHION</a>
        <form class="d-flex">
            <a href="./cartItems.php" class="btn btn-outline-success" type="submit">
                <i class="bi-cart-fill me-1"></i>
                Cart
                <span class="badge bg-success text-white ms-1 rounded-pill"><?php echo $cartItemCount; ?></span>
            </a>
        </form>
    </div>

</nav>