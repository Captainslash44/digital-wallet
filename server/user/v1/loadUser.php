<?php
require("../../models/user.php");


if (isset($_POST["id"])){
    $id = $_POST["id"];
    echo json_encode(User::getUserNameAndLastName($id));

}else{
    http_response_code(400);
    echo json_encode("Unknown problem");
}





?>