<?php
$servername = "sql.freedb.tech";
$username = "freedb_mirza";
$password = "?BA2xCExbsPfFrx";

try {
  $conn = new PDO("mysql:host=$servername;dbname=freedb_bazatest", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
