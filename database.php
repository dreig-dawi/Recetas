<?php
class Database {
  private $host = "localhost";
  private $db_name = "api_server";
  private $username = "Dario";
  private $password = "1234";
  public $conn;

  public function getConnection() {
    $this->conn = null;
    try {
      $this->conn = new PDO(
        "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
        $this->username,
        $this->password
      );
    } catch(PDOException $exception) {
      echo "Error de conexión: " . $exception->getMessage();
    }
    return $this->conn;
  }
}
?>