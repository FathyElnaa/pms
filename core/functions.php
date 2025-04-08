<?php

// session_start();


function set_message($type, $text_message)
{
    $_SESSION['message'] = [
        'type' => $type,
        'text' => $text_message
    ];
}

function show_message()
{
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $text_message = $_SESSION['message']['text'];
        echo "<div class='alert alert-$type'>$text_message</div>";
        unset($_SESSION['message']);
    }
}
$user_File_Json = realpath(__DIR__ . "/../data/users.json");



function Users_Register($name, $email, $password)
{
    $User_json = $GLOBALS['user_File_Json'];
    $users = file_exists($User_json) ? json_decode(file_get_contents($User_json), true) : [];
    if (!is_array($users)) {
        $users = [];
    }
    if (empty($users)) {
        $id = 1;
    } else {
        $id = max(array_column($users, 'id')) + 1;
    }

    $hash_password = password_hash($password, PASSWORD_DEFAULT);
    $users_data = [
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'password' => $hash_password,
    ];
    $users[] = $users_data;
    file_put_contents($User_json, json_encode($users, JSON_PRETTY_PRINT));
    $_SESSION['user'] = [
        'name' => $name,
        'email' => $email
    ];
    return true;
}

function login($email, $password)
{
    $User_json = $GLOBALS['user_File_Json'];
    $users = file_exists($User_json) ? json_decode(file_get_contents($User_json), true) : [];
    if (!is_array($users)) {
        $users = [];
    }

    foreach ($users as $user) {
        if ($user['email'] == $email && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'name' => $user['name'],
                'email' => $user['email']
            ];

            return true;
        }
    }
    return false;
}

$data_product_json = realpath(__DIR__ . "/../data/Add_Product.json"); //-----> file product


function add_product($name, $price, $type)
{
    $Glob_Add_Product = $GLOBALS['data_product_json'];
    $Products = file_exists($Glob_Add_Product) ? json_decode(file_get_contents($Glob_Add_Product), true) : [];
    
    $product_data = [
        'name' => $name,
        'price' => $price,
        'type' => $type
    ];
    $Products[] = $product_data;
    file_put_contents($Glob_Add_Product, json_encode($Products, JSON_PRETTY_PRINT));
    return true;
}

function Get_Product()
{
    return file_exists($GLOBALS['data_product_json']) ? json_decode(file_get_contents($GLOBALS['data_product_json']), true) : [];
}

function add_to_cart($product)
{
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    foreach ($_SESSION['cart'] as &$cart_item) {
        if ($cart_item['name'] === $product['name']) {
            $cart_item['quantity'] += 1;
            return;
        }
    }

    $_SESSION['cart'][] = $product;
}

function get_cart()
{
    return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
}

function remove_from_cart($index)
{
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }
}

function clear_cart()
{
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
    }
}



$data_orders_File = realpath(__DIR__ . "/../data/orders.json");

function process_checkout($name, $email, $address, $phone, $notes)
{

    $GLOBAL_ordersFile = $GLOBALS['data_orders_File'];
    $existingOrders = file_exists($GLOBAL_ordersFile) ? json_decode(file_get_contents($GLOBAL_ordersFile), true) : [];

    $order = [
        'name' => $name,
        'email' => $email,
        'address' => $address,
        'phone' => $phone,
        'notes' => $notes,
        'items' => $_SESSION['cart']
    ];

    $existingOrders[] = $order;
    file_put_contents($GLOBAL_ordersFile, json_encode($existingOrders, JSON_PRETTY_PRINT));
    clear_cart();

    return true;
}
