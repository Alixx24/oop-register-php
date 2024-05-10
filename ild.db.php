private $serverName = 'localhost';
   private $userName = 'admint';
   private $password = '12345678';
private $dbName = 'ooplogin_dbs';
try {
      $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
      $connection = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password, $options);
   
      $sql = "SELECT * FROM `users`";
      $statement = $connection->query($sql);
   
      $users = $statement->fetchAll();
   
      var_dump($users);
   } catch (PDOException $e) {
      echo 'error ' . $e->getMessage();
   }