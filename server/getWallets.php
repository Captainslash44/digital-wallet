<?php

include("connection.php");


if(isset($_GET["id"])){
    $id = $_GET['id'];
    $query = $conn->prepare("SELECT * from wallets where user_id = ?");
    $query->bind_param("i", $id);
    $query->execute();
    $array = $query->get_result();
    $response = [];
    while($wallet = $array->fetch_assoc()){
        $response = $wallet;
    }



}



?>