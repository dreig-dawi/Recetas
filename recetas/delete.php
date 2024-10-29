<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../database.php';

$database = new Database();
$db = $database->getConnection();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'DELETE') {
  $id = $_GET['Plato'];
  $sql = "DELETE FROM recetas WHERE Plato = :plato";
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':plato', $id);
  if($stmt->execute()) {
	  echo json_encode(['mensaje' => 'Usurious eliminado']);
  } else {
	  echo json_encode(['mensaje' => 'Error al eliminar usuario']);
  }
} else {
	echo json_encode(['mensaje' => 'Método no soportado']);
}