<?php

include("../../models/user.php");



if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    echo (User::login($email, $password));

    };
    
?>