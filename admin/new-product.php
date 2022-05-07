<?php include __DIR__ . '/inc/header.php'; ?>

<?php

if (!isset($_SESSION['login']) && ($_SESSION['login'] !== true)) {
    header("Location: login.php");
    exit;
}
?>


<?php


$status = '';

$name = '';
$description = '';
$price = '';
$uploaded = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get post input
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $description = isset($_POST['description']) ? $_POST['description'] : null;
    $price = isset($_POST['price']) ? $_POST['price'] : null;
    $photo = isset($_FILES['photo']) && !empty($_FILES['photo']) ? $_FILES['photo'] : null;

    // if no errors
    if ($name && $description && $price && is_uploaded_file($photo['tmp_name']) && $photo['error'] === 0) {

        $uploaded = upload_file($photo, '../photos/uploaded');
        if ($uploaded) {

            if (isset($_POST['post_id'])) {

                $post_id = $_POST['post_id'];

                update_product_info([
                    ':id' => $post_id,
                    ':name' => $name,
                    ':description' => $description,
                    ':price' => $price,
                    ':photo' => $uploaded,
                ]);

                $status = 'Successfully updated the product.';
                go_to_location("./index.php?status=$status");
            } else {

                add_new_product([
                    ':name' => $name,
                    ':description' => $description,
                    ':price' => $price,
                    ':photo' => $uploaded,
                ]);
                $status = 'New product successfully added.';
                go_to_location($_SERVER['PHP_SELF'] . "?status=$status");
            }
        }
    } else {
        $status = 'All field is required.';
        go_to_location($_SERVER['PHP_SELF'] . "?status=$status");
    }
}


// retrieve records
$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;
if ($product_id) {
    $product = get_product_by_id([':id' => $product_id]);

    // retrieve individual product
    $name = $product['name'];
    $description = $product['description'];
    $price = $product['price'];
    $uploaded = $product['photo'];
}

?>

<main class="p-3">

    <div class="alert alert-success d-flex justify-content-between align-items-center container border-0">
        <h1 class="display-6"><?php echo isset($product_id) ? 'Update product info' : 'Add new product'; ?></h1>
    </div>

    <div class="container">


        <?php if (isset($_GET['status'])) : ?>
            <div class="alert alert-info"><?php echo $_GET['status']; ?></div>
        <?php endif; ?>


        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">

            <?php if (isset($product_id)) : ?>
                <input type="hidden" name="post_id" value="<?php echo $product_id; ?>">
            <?php endif; ?>
            <!-- name -->
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Your product name" name="name" value="<?php echo $name; ?>">
            </div>
            <!-- description -->
            <div class="mb-3">
                <label for="description" class="form-label">Describe your product</label>
                <textarea class="form-control" id="description" rows="4" name="description"><?php echo $description; ?></textarea>
            </div>

            <!-- price -->
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Price" name="price" value="<?php echo $price; ?>">
            </div>

            <?php if (isset($product_id)) : ?>
                <div class="alert">
                    <img src="../photos/uploaded/<?php echo $uploaded; ?>" alt="" class="img">
                </div>
            <?php endif; ?>

            <!-- price -->
            <div class="mb-3">
                <label for="img" class="form-label">Upload photo</label>
                <input type="file" class="form-control" id="img" name="photo">
            </div>

            <!-- img -->
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <a href="./index.php" class="btn btn-danger">Back</a>
                <button type="submit" class="btn btn-primary">Add product</button>
            </div>
        </form>

    </div>

</main>

<?php include __DIR__ . '/inc/footer.php'; ?>