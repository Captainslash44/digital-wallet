<?php


include("../../models/wallet.php");
include("../../connection/connection.php");


if(isset($_GET["user_id"]) && isset($_GET["card_number"])){
    $user_id = $_GET["user_id"];
    $card_number = $_GET["card_number"];
    echo json_encode(Wallet::addWallet($user_id, $card_number));
}



?>