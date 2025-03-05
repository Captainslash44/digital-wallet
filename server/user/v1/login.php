<?php

include("../../models/user.php");


$response = [];
if(isset($_POST["password"])){
    $password = $_POST["password"];

    if(isset($_POST["email"])){
        $email = $_POST["email"];
        if(User::verifyPassword(User::getUserByEmail($email), $password)){
            $response["id"] = User::getUserByEmail($email);
        }else{
            $response["id"] = false;
        }
    }
    else if(isset($_POST["phone"])){
        $phone = $_POST["phone"];
        if(User::verifyPassword(User::getUserByPhone($phone), $password)){
            $response["id"] = User::getUserByPhone($phone);
        }else{
            $response["id"] = false;
        }
    }
}else{
    return $response["id"] = false;
}

echo json_encode($response);

    
?>