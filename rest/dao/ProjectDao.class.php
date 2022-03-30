<?php

class ProjectDao{

  private $conn;

  public function __construct(){
  $servername = "sql.freedb.tech";
  $username = "freedb_mirza";
  $password = "?BA2xCExbsPfFrx";
  $schema = "users";

//damir
  try {
    $this->conn = new PDO("mysql:host=$servername;dbname=freedb_bazatest", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  }

  public function addUser($users){
    $stmt = $this->conn->prepare("INSERT INTO Users (name, surname, city, age, e-mail) VALUES (:name, :surname, :age, :city, :e-mail)");
    $stmt->execute($users);
    $users['id'] = $this->conn->lastInsertId();
    return $users;
  }

  public function getAll(){
    $stmt = $this->conn->prepare("SELECT * FROM Users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getOne($id){
    $stmt = $this->conn->prepare('SELECT * FROM Users WHERE id=:id');
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return reset($result);
  }

  public function updateById($users){
    $stmt = $this->conn->prepare("UPDATE Users SET (name =: name, surname =: surname, city =: city, age =: age, e-mail =: e-mail ) WHERE id := id");
    $stmt -> execute($users);
    return $users;
  }

  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM Users WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
}

?>
