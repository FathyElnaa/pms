<?php
session_start();

include "../core/validations.php";
include "../core/functions.php";


if($_SERVER['REQUEST_METHOD']=="POST"){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=trim($_POST['password']);
    $confirm_password=trim($_POST['confirm_password']);
    

    $error= validate_register($name,$email,$password,$confirm_password);
    if(!empty($error)){
        set_message('danger',$error);
        header("Location: ../Form_register.php");
        exit;
    }

    if(Users_Register($name,$email,$password)){
        set_message('success', "Register added sucessfully");
        header("Location: ../index.php");
        exit;
    }
    else{
        set_message('success', "Fail added Register");
        header("Location: ../Form_register.php");
        exit;
    }


}