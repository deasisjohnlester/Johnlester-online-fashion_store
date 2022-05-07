<?php session_start(); ?>

<!-- header-->
<?php include __DIR__ . '/inc/header.php'; ?>

<!-- add to cart login -->
<?php include __DIR__ . '/add-to-cart.php'; ?>


<!-- Navigation-->
<?php include __DIR__ . '/inc/nav.php'; ?>

<!-- Header-->
<header class="bg-success py-5 header">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-1 fw-bolder">OKSI FASHION</h1>
            <p class="lead fw-normal text-white mb-0">All new Occidental Mindoro Fashion store, enjoy shopping with great deals and a lot of new weekly items for mens and womens.</p>
        </div>
    </div>
</header>


<!-- products-->
<section class="py-5 products">
    <div class="container mt-5">

        <?php $products = get_products();

        if ($products->rowCount() > 0) :

            $products_record = $products->fetchAll(PDO::FETCH_ASSOC);
        ?>
            <div class="row justify-content-center">
                <?php foreach ($products_record as $product) : ?>
                    <div class="col-md-4 col-lg-3 mb-5">
                        <a href="product_info.php?id=<?php echo $product['id']; ?>" class="text-decoration-none link-dark">
                            <div class="card h-100 shadow-lg product-item">
                                <!-- Product image-->
                                <img class="card-img-top img product-img" src="./photos/uploaded/<?php echo $product['photo']; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $product['name']; ?></h5>
                                        <!-- Product price-->
                                        <?php echo $product['price']; ?> pesos
                                    </div>
                                    <hr>
                                    <div class="description">
                                        <?php echo substr($product['description'], 0, 130) . '...'; ?>
                                    </div>
                                </div>

                                <?php if (isset($_SESSION['cart'])) : ?>
                                    <?php if (on_cart($product['id'], $_SESSION['cart'])) : ?>

                                        <!-- Product actions-->
                                        <div class="card-footer p-4 border-top-0 text-success">
                                            <h6>On cart <i class="fa-solid fa-circle-check text-primary ms-2"></i></h6>
                                        </div>
                                    <?php else : ?>

                                        <!-- Product actions-->
                                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                            <div class="text-center"><a class="btn btn-outline-warning mt-auto" href="?product_id=<?php echo $product['id']; ?>">Add to cart</a></div>
                                        </div>
                                    <?php endif; ?>

                                <?php endif; ?>

                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        <?php else : ?>
            <div class="alert">No product available today.</div>
        <?php endif; ?>
    </div>
</section>

<!-- copyright-->
<?php include __DIR__ . '/inc/copyright.php'; ?>

<!-- footer-->
<?php include __DIR__ . '/inc/footer.php'; ?>