<?php

require("../../models/user.php");


if(!isset($_POST["email"]) || !isset($_POST["phone"]) ||
!isset($_POST["name"]) || !isset($_POST["lastname"]) || !isset($_POST["password"])){
    http_response_code(400);
    echo json_encode(["message" => "enter all credentials"]);
}else{

    $email = $_POST["email"];
    $phone = $_POST["phone"];

    echo json_encode(["message" => User::isNew($email, $phone)]);
};








?>