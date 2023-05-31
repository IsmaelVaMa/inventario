<?php
	include_once('conexion.php');
	$respuesta = array('error' => false);

	$database = new Conexion();
	$db = $database->abrirConexion();
	try{
		$stmt = $db->prepare("UPDATE productos SET nombre = :nombre, unidad = :unidad, fechaCaducidad = :fechaCaducidad, lote = :lote WHERE codigo = :codigo");
		$stmt->bindParam(':codigo', $_POST['codigo']);
		$stmt->bindParam(':nombre', $_POST['nombre']);
		$stmt->bindParam(':unidad', $_POST['unidad']);
		$stmt->bindParam(':fechaCaducidad', $_POST['fechaCaducidad']);
		$stmt->bindParam(':lote', $_POST['lote']);
		if($stmt->execute()){
			$respuesta['mensaje'] = 'Producto modificado con éxito';
		}
	} catch(PDOException $e){
		$respuesta['error'] = true;
		$respuesta['mensaje'] = $e->getMessage();
	}
	$database->cerrarConexion();
	echo json_encode($respuesta);
?>