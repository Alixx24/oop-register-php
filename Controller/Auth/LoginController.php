<?php

namespace Controller\Auth;

require_once '../Models/Database.php';

class LoginController
{

    public function checkEmail($email)
    {
        global $pdo;


        if (isset($_POST['login']) && isset($_POST['email']) && $_POST['email'] != null) {
            $email = ($_POST['email']);
            var_dump($_POST['email']);
            $sql = "SELECT email FROM users WHERE email = ?";
            $statement = $pdo->prepare($sql);
            $statement->execute([$email]);
            $user = $statement->fetchAll();

            if ($user == false) {

                var_dump('dont find user');
                die;
            } else {

                $sql = "SELECT password FROM users WHERE email = ?";
                $statement = $pdo->prepare($sql);
                $statement->execute([$email]);
                $user = $statement->fetchAll();

                $passInput = $_POST['password'];
                var_dump($passInput);
                var_dump($user);
                if ($user == $passInput) {

                    echo 'password valided';
                } else {
                    echo 'password invalid';
                }
            }
        } else {
            echo 'requrred email';
        }
    }
}
