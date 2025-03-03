<?php


include("../../models/user.php");
include("../../connection/connection.php");

if (isset($_POST["name"])){
    $name = $_POST["name"];
}
if (isset($_POST["lastname"])){
    $lastname = $_POST["lastname"];
}

if (isset($_POST["email"])){
    $email = $_POST["email"];
}

if (isset($_POST["phone"])){
    $phone = $_POST["phone"];
}
if (isset($_POST["password"])){
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
}

if(User::isNew($email,$phone)){
    User::addUser($name, $lastname, $email, $phone, $password);
    $response = [];
    $response["message"] = "User created!";
} else{
    $response = [];
    $response["message"] = "already exists";
}

echo json_encode($response);

?>