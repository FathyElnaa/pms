<?php
session_start();
include "../core/functions.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST['index'];
    $quantity = max(1, (int)$_POST['quantity']);

    if (isset($_SESSION['cart'][$index])) {
        $_SESSION['cart'][$index]['quantity'] = $quantity;
    }
}
set_message('success', 'Product Updated cart!');
header("Location: ../cart.php");
exit();
