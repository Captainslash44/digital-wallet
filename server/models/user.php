<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
include("../../connection/connection.php");


class User{

    public static function getUserNameAndLastName($id){
        global $conn;

        $query = $conn->prepare("SELECT name, last_name from users where id=?");
        $query->bind_param("i", $id);
        $query->execute();

        $response = $query->get_result();
        $data = $response->fetch_assoc();
        $answer = array("name" => $data["name"], "lastname" => $data["last_name"]);
        return $answer;
    }

    public static function getUserByEmail($email){
        global $conn;

        $query = $conn->prepare("SELECT id from users where email =?");
        $query->bind_param("s", $email);
        $query->execute();
        $response = $query->get_result();
        $answer = $response->fetch_assoc();
        if($answer != NULL){
            return $answer["id"];
        }else{
            return false;
        }
    }

    public static function getUserByPhone($phone){
        global $conn;

        $query = $conn->prepare("SELECT id from users where phone_number =?");
        $query->bind_param("i", $phone);
        $query->execute();
        $response = $query->get_result();
        $answer = $response->fetch_assoc();
        if($answer != NULL){
            return $answer["id"];
        }else{
            return false;
        }
        
    }
    
    //check if the user exists in the database using email and phone:

      public static function isNew($email, $phone){
        global $conn;
        $query = $conn->prepare("SELECT * FROM users WHERE email = ? and phone_number = ?");

        $query->bind_param("si", $email, $phone);
        $query->execute();
        $response = $query->get_result();
        $array = [];
        while ($i = $response->fetch_assoc()){
            $array[]= $i;
        }
        if(empty($array)){
            return true;
        }else{
            return false;
        }

    }

    // add new or update current user(based on id sent):

    public static function addOrUpdateUser($name, $lastname, $email, $phone, $password){
        global $conn;
        if (self::isNew($email,$phone)){
            self::addUser($name, $lastname, $email, $phone, $password);

            $response = [];
            $response["Message"] = "User created";
        }else{
            self::updateUser($id, $name, $lastname, $email, $phone, $password);

            $response = [];
            $response["Message"] = "User Updated";
        }

        return json_encode($response);
    }


        public static function isVerified($id){
            global $conn;

            $query = $conn->prepare("SELECT is_verified from users where id = ?");
            $query->bind_param("i", $id);
            $query->execute();

            $response = $query->get_result();
            $array = [];
            while($i = $response->fetch_assoc()){
                $array[] = $i;
            }
            if($array[0]["is_verified"] == 1){
                return true;
            }else{
                return false;
            }
        }

        public static function addUser($name, $lastname, $email, $phone, $password){
            global $conn;
            $date_time = date("Y-m-d H:i:s");
            $query = $conn->prepare("INSERT INTO users (name, last_name, email, phone_number, password, time_created) 
            VALUES (?,?,?,?,?,?)");

            $query->bind_param("sssiss", $name, $lastname, $email, $phone, $password, $date_time);
            $query->execute();
            
            return;
        }


        public static function updateUser($id, $name, $lastname, $email, $phone, $password){
            global $conn;
            $query = $conn->prepare("UPDATE users SET name=?, last_name=?, email=?,
            phone_number=?, password=? WHERE id=?");

            $query->bind_param("sssisi", $name, $lastname, $email, $phone, $password, $id);
            $query->execute();
            return;
        }


        //After spending most of the evening writing this function adn debugging it
        // I stumbled upon password_verify() :'). 

        public static function verifyPassword($user_id, $password){
            global $conn;
            

            $query = $conn->prepare("SELECT password FROM users WHERE id=?");
            $query->bind_param("i", $user_id);
            $query->execute();

            $response = $query->get_result();
            $answer = $response->fetch_assoc();
            if ($answer != NULL){
                if(password_verify($password, $answer["password"])){
                    return true;
                }else{
                    return false;
                };
            }else{
                return false;
            }
            
        }

        };

        
     


 ?>