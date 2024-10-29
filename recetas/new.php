<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../database.php';

$database = new Database();
$db = $database->getConnection();

$method = $_SERVER['REQUEST_METHOD'];

try {
	if ( $method == 'POST' ) {
		$data = json_decode( file_get_contents( 'php://input' ), TRUE );
		$sql
		      = "INSERT INTO recetas (Plato, Ingredientes, Pasos) VALUES (:Plato, :Ingredientes, :Pasos)";
		$stmt = $db->prepare( $sql );
		$stmt->bindParam( ':Plato', $data['Plato'] );
		$stmt->bindParam( ':Ingredientes', $data['Ingredientes'] );
		$stmt->bindParam( ':Pasos', $data['Pasos'] );
		if ( $stmt->execute() ) {
			echo json_encode( [ 'mensaje' => 'Receta añadida' ] );
		}
		else {
			echo json_encode( [ 'mensaje' => 'Error al añadir la receta' ] );
		}
	}
	else {
		echo json_encode( [ 'mensaje' => 'Método no soportado' ] );
	}
} catch ( Exception $e ) {
	echo json_encode( [ 'mensaje' => 'Algo no ha salido bien...' ] );
}