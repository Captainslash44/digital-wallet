<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
include("../../models/user.php");



if(isset($_POST["password"])){
    $password = $_POST["password"];
    if(isset($_POST["email"])){
        $email = $_POST["email"];
        echo (User::emailLogin($email, $password));
    }else if(isset($_POST["phone"])){
        $phone = $_POST["phone"];
        echo(User::phoneLogin($phone, $password));
    }
}

    
?>