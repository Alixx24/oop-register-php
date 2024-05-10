<?php

namespace Controller\Auth;

require_once '../Models/Database.php';

class RegisterController
{

    public function register($email)
    {
        global $pdo;
      var_dump('regi');die;
        if (isset($_POST['register']) && isset($_POST['email']) && $_POST['email'] != null && isset($_POST['password']) && $_POST['password'] != null) {
           
            $email = $_POST['email'];
            $sql = "SELECT email FROM users WHERE email = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$email]);
            $user = $statement->fetch();
         
            if($user == false)
            {
               
                $password = $_POST['password'];
                $hashedPass =  password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users(name, email, password) VALUES (?, ?, ?)";
                $statement = $pdo->prepare($sql);
               $result = $statement->execute([$_POST['nickName'],$_POST['email'],$hashedPass]);
                var_dump($result);

            } else {
                var_dump('email already exist');

            }
            $password = $_POST['password'];
            $hashedPass =  password_hash($password, PASSWORD_DEFAULT);
            // var_dump($hashedPass);
            
            echo 'ok i gonna db';
        } else {
            echo 'requrred all Filled!';
        }
    }
}
