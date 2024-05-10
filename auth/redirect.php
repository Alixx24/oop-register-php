<?php


use Controller\Auth\LoginController;
use Controller\Auth\RegisterController;

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die;
}
if ($_POST['login']) {
    
    $email = $_POST["email"];
    include '../Controller/Auth/LoginController.php';
    $loginController = new LoginController();
    $loginController->checkEmail($email);
}


if ($_POST['register']) {

    $email = $_POST["email"];
    include '../Controller/Auth/RegisterController.php';
    $registerController = new RegisterController();
    $registerController->register($email);
}
