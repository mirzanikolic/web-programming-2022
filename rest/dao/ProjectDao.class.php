<?php

class ProjectDao{

  private $conn;

  public function __construct(){
<<<<<<< HEAD
  $servername = "sql.freedb.tech";
  $username = "freedb_mirza";
  $password = "?BA2xCExbsPfFrx";
  $schema = "users";

=======
  $servername = "sql11.freemysqlhosting.net";
  $username = "sql11481005";
  $password = "u1CdridxHm";
  $schema = "sql11481005";
>>>>>>> 838a6f14ce903ff29cd51c4d5605ee55594198d8
//damir
  try {
    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  }

  public function addUser($users){
    $stmt = $this->conn->prepare("INSERT INTO Users (name, surname) VALUES (:name, :surname)");
    $stmt->execute(['name'=>$users['name'], 'surname'=>$users['surname']]);
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
    $stmt = $this->conn->prepare('UPDATE Users SET name=:name, surname=:surname WHERE id=:id');
    $stmt->execute($users);
    return $users;
  }

  public function delete($id){
    $stmt = $this->conn->prepare("DELETE FROM Users WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
}

?>
