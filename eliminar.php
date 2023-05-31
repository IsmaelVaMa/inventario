<?php
	include_once('conexion.php');

	$respuesta = array('error' => false);
	$database =  new Conexion();
	$db = $database->abrirConexion();
	
	try{
		$stmt = $db->prepare('DELETE FROM productos WHERE codigo = :codigo');
		$stmt->bindParam(':codigo', $_POST['codigo']);
		if($stmt->execute()){
			$respuesta['mensaje'] = 'Producto eliminado con éxito';
		}
	} catch(PDOException $e){
		$respuesta['error'] = true;
		$respuesta['mensaje'] = 'Error al eliminar: ' + $e->getMessage();
	}
	$database->cerrarConexion();
	echo json_encode($respuesta);
?>