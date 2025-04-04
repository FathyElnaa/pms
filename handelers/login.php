<?php
session_start();

include "../core/validations.php";
include "../core/functions.php";


if($_SERVER['REQUEST_METHOD']=="POST"){
    $email=$_POST['email'];
    $password=trim($_POST['password']);

    

    $error= validatelogin($email,$password);
    if(!empty($error)){
        set_message('danger',$error);
        header("Location: ../Form_login.php");
        exit;
    }

    if(login($email,$password)){
        set_message('success', "Login sucessfully");
        header("Location: ../index.php");
        exit;
    }
    else{
        set_message('success', "Fail Login");
        header("Location: ../Form_login.php");
        exit;
    }


}