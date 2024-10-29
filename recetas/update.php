<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../database.php';

$database = new Database();
$db = $database->getConnection();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'PUT') {
		$data = json_decode(file_get_contents('php://input'), true);
		$sql = "UPDATE recetas SET Plato = :Plato, Ingredientes = :Ingredientes, Pasos = :Pasos WHERE Plato = :id";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':Plato', $data['Plato']);
		$stmt->bindParam(':Ingredientes', $data['Ingredientes']);
		$stmt->bindParam(':Pasos', $data['Pasos']);
		$stmt->bindParam(':id', $data['Original']);
		if($stmt->execute()) {
				echo json_encode(['mensaje' => 'Receta actualizada']);
		} else {
				echo json_encode(['mensaje' => 'Error al actualizar la receta']);
		}
} else {
		echo json_encode(['mensaje' => 'Método no soportado']);
}