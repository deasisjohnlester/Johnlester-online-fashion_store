<?php session_start(); ?>


<?php include __DIR__ . '/inc/header.php'; ?>


<!-- add to cart login -->
<?php include __DIR__ . '/add-to-cart.php'; ?>


<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = get_product_by_id([':id' => $id]);
}

?>

<div class="container p-3">
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md">
                    <div class="mb-3 mb-md-0">
                        <img src="./photos/uploaded/<?php echo $product['photo']; ?>" alt="" class="d-block mx-auto">
                    </div>
                </div>
                <div class="col-md">
                    <h1 class="display-1"><?php echo $product['name']; ?></h1>
                    <p>
                        <?php echo $product['description']; ?>
                    </p>
                    <div class="fs-3">
                        Price: <code><?php echo $product['price']; ?></code>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <a href="./index.php" class="btn btn-danger">Back</a>



                        <?php if (isset($_SESSION['cart'])) : ?>
                            <?php if (on_cart($product['id'], $_SESSION['cart'])) : ?>

                                <!-- Product actions-->
                                <h6 class="display-6 mb-0">On cart <i class="fa-solid fa-circle-check text-primary ms-2"></i></h6>
                            <?php else : ?>

                                <!-- Product actions-->
                                <a class="btn btn-warning mt-auto" href="?id=<?php echo $id; ?>&product_id=<?php echo $product['id']; ?>">Add to cart</a>
                            <?php endif; ?>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/inc/footer.php'; ?>