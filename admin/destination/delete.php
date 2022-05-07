<?php


if (isset($_GET['product_id'])) {
    // include functions
    include __DIR__ . '/../../functions.php';
    remove_product(['id' => $_GET['product_id']]);
    go_to_location('../index.php?status=Record succesfully deleted.');
}

die('ERROR');
