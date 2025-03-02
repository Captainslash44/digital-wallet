<?php


include("../../models/user.php");
include("../../connection/connection.php");

if (isset($_POST["name"])){
    $name = $_POST["name"];
}
if (isset($_POST["last_name"])){
    $lastname = $_POST["last_name"];
}

if (isset($_POST["email"])){
    $email = $_POST["email"];
}

if (isset($_POST["phone"])){
    $phone = $_POST["phone"];
}
if (isset($_POST["password"])){
    $password = $_POST["password"];
}

if(User::isNew($email,$password)){
    $date_time = date("Y-m-d H:i:s");

    $query = $conn->prepare("INSERT INTO users 
    (name,last_name,email,phone_number,password,time_created) VALUES (?,?,?,?,?,?)");

    $query->bind_param("sssiss", $name, $lastname, $email, $phone, $password, $date_time);
    $query->execute();
    $response = [];
    $response["message"] = "User created!";
} else{
    $response = [];
    $response["message"] = "already exists";
}

echo json_encode($response);

?>