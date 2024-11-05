<?php
header("Content-Type: application/json; charset=UTF-8");

include_once 'database.php';

$database = new Database();
$db = $database->getConnection();

$method = $_SERVER['REQUEST_METHOD'];

	if ( $method == 'DELETE' ) {
		$data = json_decode( file_get_contents( 'php://input' ), TRUE );
		$sql  = "DELETE FROM recetas WHERE Plato = :plato";
		$stmt = $db->prepare( $sql );
		$stmt->bindParam( ':plato', $data['Plato'] );
		if ( $stmt->execute() ) {
			echo json_encode( [ 'mensaje' => $stmt ] );
		}
	}