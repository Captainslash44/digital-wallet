<?php

include("../../connection/connection.php");

function phoneLogin($phone, $password){

    global $conn;

    $query = $conn->prepare("SELECT name, last_name FROM users where phone_number = ? and password = ?");
    $query->bind_param("ss",$phone,$password);
    $query->execute();
    $response = $query->get_result();
    $answer = $response->fetch_assoc();
    
    return json_encode($answer);
    

    };


?>