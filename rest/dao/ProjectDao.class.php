<?php

class ProjectDao{

  private $conn;

  public function __construct(){
  $servername = "sql.freedb.tech";
  $username = "freedb_mirza";
  $password = "?BA2xCExbsPfFrx";

  try {
    $this->conn = new PDO("mysql:host=$servername;dbname=freedb_bazatest", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  }

  public function get_all(){
    $stmt = $$this->conn->prepare("SELECT * FROM Users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }


}

?>
