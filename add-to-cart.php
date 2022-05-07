<?php

if (!isset($_SESSION['cart']) && empty($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$product_id = isset($_GET['product_id']) ? $_GET['product_id'] : null;

if (!is_null($product_id)) {
    $_SESSION['cart'][] = $product_id;
}


// .. get cart count
$cartItemCount = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;

$cartItems = [];

//  .. cart items
if (isset($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
    $cartItems = show_cartItems($_SESSION['cart']);
}


//  ..cart total price
$cartPrice = 0;
