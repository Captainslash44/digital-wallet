<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");


$host= "localhost";
$user = "root";
$password = "";
$db_name = "digital-wallet";




$conn = new mysqli($host, $user, $password, $db_name);

if ($conn->connect_error) {
    return "connection failure";
// }else{
//     return $conn;
};
?>