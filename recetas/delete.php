<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../database.php';

$database = new Database();
$db = $database->getConnection();

$method = $_SERVER['REQUEST_METHOD'];

try {
	if ( $method == 'DELETE' ) {
		$id = $_GET['id'];
		$data = json_decode( file_get_contents( 'php://input' ), TRUE );
		$sql  = "DELETE FROM recetas WHERE Plato = :plato";
		$stmt = $db->prepare( $sql );
		$stmt->bindParam( ':plato', $data['Plato'] );
		if ( $stmt->execute() ) {
			echo json_encode( [ 'mensaje' => 'Receta eliminada' ] );
		}
		else {
			echo json_encode( [ 'mensaje' => 'Error al eliminar la receta' ] );
		}
	}
	else {
		echo json_encode( [ 'mensaje' => 'Método no soportado' ] );
	}
} catch ( Exception $e ) {
	echo json_encode( [ 'mensaje' => 'Algo no ha salido bien...' ] );
}