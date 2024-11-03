<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try {
      require_once "db.inc.php" ;
      $query = "INSERT INTO users(username,pwd,email) VALUES(?,?,?);";
      $statement = $pdo->prepare($query);
      $statement->execute([$username,$password, $email]);
      $pdo = null;
      $statement = null;
      
      header("Location: ../main.php");
      die();
  } catch (PDOException $e) {
      die("Query failed".$e->getMessage());
  }

}
else{
    header("Location: ../main.html");
}
?>