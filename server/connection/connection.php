<?php

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