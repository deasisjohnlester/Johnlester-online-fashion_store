<?php session_start(); ?>

<!-- header-->
<?php include __DIR__ . '/inc/header.php'; ?>

<!-- add to cart login -->
<?php include __DIR__ . '/add-to-cart.php'; ?>


<!-- Navigation-->
<?php include __DIR__ . '/inc/nav.php'; ?>


<div class="container">
    <h1 class="display-4 fw-bold text-primary alert text-center text-md-start">Shopping Cart <i class="fa-solid fa-cart-shopping"></i></h1>

    <div class="row">

        <?php if ($cartItems) : ?>
            <div class="col-md-8 order-md-0 order-1">
                <?php foreach ($cartItems as $product) : ?>
                    <?php
                    // calculate total price
                    $cartPrice += $product['price'];
                    ?>

                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center justify-content-center">
                                <div class="col-md">
                                    <div class="product-img-cart mx-auto">
                                        <img src="./photos/uploaded/<?php echo $product['photo']; ?>" alt="">
                                    </div>
                                </div>
                                <div class="col-md text-center text-md-start">
                                    <h4 class="text-primary"><?php echo $product['name']; ?></h4>
                                    Price: <code><?php echo $product['price']; ?></code>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif ?>
        <div class="col-md-4">
            <div class="card shadow-lg border-0 mb-5 mb-md-0">
                <div class="card-body">
                    <h4 class="mb-3 d-flex justify-content-between">Item(s) <code><?php echo $cartItemCount; ?></code></h4>
                    <h4 class="d-flex justify-content-between">Total <code><?php echo $cartPrice; ?></code></h4>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- footer-->
<?php include __DIR__ . '/inc/footer.php'; ?>