<?php
$servername = "192.168.3.11";
$username = "admin";
$password = "secure_db_pw";

try {
  $conn = new PDO("mysql:host=$servername;dbname=josidrive", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>