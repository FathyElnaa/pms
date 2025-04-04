<?php

function valid_Fields_Required($value,$input_field){
    if(empty($value)){
        return "$input_field is required";
    }
    else{
        return null;
    }
}

function  Validate_email($email){
    return filter_var($email,FILTER_VALIDATE_EMAIL) ? null : "Invaild email";
}

function validate_password($password){
    if(strlen($password)<8){
        return "Password must contain more than 8 characters";
    }

    if(!preg_match("/[A-Z]/",$password)){
        return "Password must contain capital letters";
    }
    if(!preg_match("/[a-z]/",$password)){
        return "Password must contain lowercase letters";
    }
    if(!preg_match("/[0-9]/",$password)){
        return "The password must contain numbers";
    }
    return null;
}

function password_match($password,$confirm_password){
    if($password===$confirm_password){
        return null;
    }
    else{
        return "Password does not match";
    }
}

function validate_register($name,$email,$password,$confirm_password)  {
    $register_data=[
        'name'=>$name,
        'email'=>$email,
        'password'=>$password,
        'confirm_password'=>$confirm_password
    ];

    foreach($register_data as $data =>$value){
        if($error=valid_Fields_Required($value,$data)){
            return $error;
        }
    }
    if($error=Validate_email($email)){
        return $error;
    }
    if($error=validate_password($password)){
        return $error;
    }
    if($error=password_match($password,$confirm_password)){
        return $error;
    }
}
function validatelogin($email,$password){
    $fields=[
        'email'=>$email,
        'password'=>$password,

    ];
    
    foreach($fields as $fieldname => $value){
        if($error= valid_Fields_Required($value,$fieldname)){
            return $error;
        }
    }
    
    if($error=Validate_email($email)){
        return $error;
    }
    
}

function validate_name($name){
    if(!preg_match("/[!@#$%^&*()]/",$name)){
        return null;
    }else{
        return 'invalid name';
    }

}

function  Validate_price($price){
    return (is_numeric($price) && $price>0)? null :"invalid Salary";
}

function validate_product($name,$price,$type){

    $product_data=[
        'name'=>$name,
        'price'=>$price,
        'type'=>$type
    ];

    foreach($product_data as $data =>$value){
        if($error=valid_Fields_Required($value,$data)){
            return $error;
        }
     }
    if($error=Validate_price($price)){
        return $error;
    }
    if($error=validate_name($name)){
        return $error;
    }
}


function validate_phone($phone) {
    return (filter_var($phone,FILTER_SANITIZE_NUMBER_INT) && strlen($phone)>=10) ? null : "Phone number is invalid";
}

function validate_checkout($name,$email,$address,$phone,$Notes){
    $checkout_user=[
        'name'=>$name,
        'email'=>$email,
        'address'=>$address,
        'phone'=>$phone,
        'Notes'=>$Notes,
    ];
    foreach($checkout_user as $data =>$value){
        if($error=valid_Fields_Required($value,$data)){
            return $error;
        }
     }

    if($error=Validate_email($email)){
        return $error;
    }
    if($error=validate_phone($phone)){
        return $error;
    }
    if($error=validate_name($name)){
        return $error;
    }
}