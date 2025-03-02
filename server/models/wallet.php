<?php

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
include("../../connection/connection.php");
include("user.php");


class Wallet{

    public static function isNew($id){
        global $conn;
        $query = $conn->prepare("SELECT * FROM wallets WHERE id=?");
        $query->bind_param("i", $id);
        $query->execute();

        $response = $query->get_result();
        $array = [];
        while ($i = $response->fetch_assoc()){
            $array[] = $i;
        }
        if (empty($array)){
            return false;
        }else{
            return true;
        }
    }



    public static function getAllUserWallets($user_id){
        global $conn;
        $query = $conn->prepare("SELECT * FROM wallets where user_id = ?");
        $query->bind_param("i", $user_id);
        $query->execute();

        $response = $query->get_result();
        $array = [];
        while ($i = $response->fetch_assoc()){
            $array[] = $i;
        }

        return ($array);

    }

    public static function addWallet($user_id, $card_number){
        global $conn;
        if(User::isVerified($user_id)){
            $date_time = date("Y-m-d H:i:s");
            $query = $conn->prepare("INSERT INTO wallets (user_id, balance, card_number, date_created)
            VALUES (?,?,?,?)");
            $balance = 0;
            $query->bind_param("idis", $user_id, $balance, $card_number, $date_time);
            $query->execute();
            $response = [];
            $response["message"] = "created successfully";
        }else{
                $response = [];
                $response["message"] = "Verify before creating another wallet.";
            }
            return $response;
        }
        
    }


?>