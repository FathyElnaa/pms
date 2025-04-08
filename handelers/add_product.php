<?php
session_start();

include "../core/validations.php";
include "../core/functions.php";


if($_SERVER['REQUEST_METHOD']=="POST"){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $type=$_POST['type'];
    

    $error= validate_product($name,$price,$type);
    if(!empty($error)){
        set_message('danger',$error);
        header("Location: ../form_add_product.php");
        exit;
     }

    if(add_product($name,$price,$type)){
        set_message('success', "Product added sucessfully");
        header("Location: ../index.php");
        exit;
    }
    else{
        set_message('danger', "Fail added Product");
        header("Location: ../Form_register.php");
        exit;
    }


}