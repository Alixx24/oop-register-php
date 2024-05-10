<!DOCTYPE html>
<html lang="en">

<head>
    <?php

    use Controller\Auth\Login;
    use Models\Database;

    require_once '../Models/Database.php';

    include_once '../services/template.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php


    // if ($_POST['submit'] != null && isset($_POST['email']) && $_POST['email'] != null) {
    //     $email = ($_POST['email']);
    //     $sql = "SELECT email FROM users WHERE email = ?";
    //     $statement = $pdo->prepare($sql);
    //     $statement->execute([$email]);
    //     $user = $statement->fetchAll();

    //     if ($user == false) {

    //         var_dump('dont find user');
    //         die;
    //     } else {
    //         var_dump('find user');
    //         die;

    //     }
    // } else {
    //     echo 'requrred email';
    // }


    ?>
    <form action="redirect.php" method="POST">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <input type="submit" name="login" value="submit">
    </form>

</body>

</html>