<?php
require_once "../connection/connection.php";


class User{
    
    //check if the user exists in the database using email and phone:

      static function isNew($email, $phone){
        global $conn;
        $query = $conn->prepare("SELECT * FROM users WHERE email = ? AND phone_number = ?");

        $query->bind_param("si", $email, $phone);
        $query->execute();
        $response = $query->get_result();
        $array = [];
        while ($i = $response->fetch_assoc()){
            $array= $i;
        }
        if(empty($array)){
            return true;
        }else{
            return false;
        }

    }

    // add new or update current user(based on id sent):

    static function addOrUpdateUser($name, $lastname, $email, $phone, $password){
        global $conn;
        if (self::isNew($email,$phone)){
            $date_time = date("Y-m-d H:i:s");

            $query = $conn->prepare("INSERT INTO users 
            (name,last_name,email,phone_number,password,time_created) VALUES (?,?,?,?,?,?)");

            $query->bind_param("sssiss", $name, $lastname, $email, $phone, $password, $date_time);
            $query->execute();

            $response = [];
            return $response["Message"] = "User created";
        }else{
            $user_id = $_GET["id"];

            $query = $conn->prepare("UPDATE users SET name=?, last_name=?, email=?,
            phone_number=?, password=? WHERE id=?");

            $query->bind_param("sssisi", $name, $lastname, $email, $phone, $password, $user_id);
            $query->execute();
            $response = [];
            return $response["Message"] = "User Updated";
        }
    }
};

     


echo (User::isNew("666@gmail.com",666));











// $id = 1;
// $query = $conn->prepare("SELECT * FROM users where id=?");
// $query->bind_param("i",$id );
// $query->execute();
// $response = $query->get_result();
// $answer = [];
// while($i = $response->fetch_assoc() ){
//     $answer = $i;
// }
// echo json_encode($answer);


// ?>