<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
include("../../models/user.php");


$response = [];
if(isset($_POST["password"])){
    $password = $_POST["password"];

    if(isset($_POST["email"])){
        $email = $_POST["email"];
        if(User::verifyPassword(User::getUserByEmail($email), $password)){
            $response["entry"] = true;
        }else{
            $response["entry"] = false;
        }
    }
    else if(isset($_POST["phone"])){
        $phone = $_POST["phone"];
        if(User::verifyPassword(User::getUserByPhone($phone), $password)){
            $response["entry"] = true;
        }else{
            $response["entry"] = false;
        }
    }
}else{
    return $response["entry"] = false;
}

echo json_encode($response);

    
?>