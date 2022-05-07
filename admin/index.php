<?php include __DIR__ . '/inc/header.php'; ?>

<?php

if (!isset($_SESSION['login']) && ($_SESSION['login'] !== true)) {
    header("Location: login.php");
    exit;
}
?>

<!-- navbar -->
<?php include __DIR__ . '/inc/nav.php'; ?>

<!-- main -->
<main class="p-3">

    <?php
    $products = get_products();
    ?>

    <div class="alert alert-success d-flex justify-content-between align-items-center border-0 mb-5">
        <h1 class="display-6"><?php echo $products->rowCount(); ?> Product(s)</h1>
        <a href="./new-product.php" class="btn btn-success">New Products</a>
    </div>

    <!-- status -->
    <?php if (isset($_GET['status'])) : ?>
        <div class="alert alert-danger"><?php echo $_GET['status']; ?></div>
    <?php endif; ?>


    <?php if ($products->rowCount() > 0) : ?>

        <div class="container">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-striped align-middle">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action(s)</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php
                        $products_record = $products->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                        <?php foreach ($products_record as $product) : ?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['name']; ?></td>
                                <td><?php echo substr($product['description'], 0, 100) . '...'; ?></td>
                                <td><?php echo $product['price']; ?></td>
                                <td>
                                    <img src="../photos/uploaded/<?php echo $product['photo']; ?>" alt="img" class="table-img">
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="./destination/delete.php?product_id=<?php echo $product['id']; ?>" class="btn btn-outline-danger me-1"><i class="fa-solid fa-trash-can"></i></a>
                                        <a href="./new-product.php?product_id=<?php echo $product['id']; ?>" class="btn btn-outline-secondary ms-1 "><i class="fa-solid fa-pen"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="alert alert-warning">No product added</div>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

</main>


<?php include __DIR__ . '/inc/footer.php'; ?>