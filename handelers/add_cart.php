<?php
session_start();
include "../core/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $product = [
        'name'  => $_POST['name'],
        'price' => $_POST['price'],
        'quantity' => 1
    ];

    add_to_cart($product);
    set_message('success', 'Product added to cart!');
    header("Location: ../index.php");
    exit();
    
}
?>
