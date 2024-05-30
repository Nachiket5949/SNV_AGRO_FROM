<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    $product = [
        'name' => $product_name,
        'price' => $product_price
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $product;
}

header('Location: cart.php');
exit;
?>
