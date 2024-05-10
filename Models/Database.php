<?php
global $pdo;
$serverName = 'localhost';
$userName = 'admint';
$password = '12345678';
$dbName = 'ooplogin_dbs';
try {
   $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
   $pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password, $options);

   return $pdo;
} catch (PDOException $e) {
   echo 'error ' . $e->getMessage();
}
