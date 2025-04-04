<?php

include "../core/validations.php";
include "../core/functions.php";


if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $phone=$_POST['number'];
    $Notes=$_POST['text'];
    

    $error= validate_checkout($name,$email,$address,$phone,$Notes);
    if(!empty($error)){
        set_message('danger',$error);
        header("Location: ../checkout.php");
        exit;
     }

    if(process_checkout($name, $email, $address, $phone, $Notes)){
        set_message('success', "Order sucessfully");
        header("Location: ../index.php");
        exit;
    }
    else{
        set_message('danger', "Fail Order");
        header("Location: ../index.php");
        exit;
    }


}