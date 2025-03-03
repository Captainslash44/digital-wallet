<?php

include("../../connection/connection.php");

function emailLogin($email, $password){
    global $conn;

    $query = $conn->prepare("SELECT name, last_name FROM users where email = ? and password = ?");
    $query->bind_param("ss",$email,$password);
    $query->execute();
    
    $response = $query->get_result();
    $answer = $response->fetch_assoc();
    
    return json_encode($answer);
    
    

    };


?>