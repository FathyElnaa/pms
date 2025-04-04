<?php
session_start();
include "../core/functions.php";
if (isset($_GET['index'])) {
    remove_from_cart($_GET['index']);
    set_message('success', "Product Deleted sucessfully");
    header("Location: ../cart.php");
    exit();
}
