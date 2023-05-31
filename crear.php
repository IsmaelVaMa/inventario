<?php
	include_once('conexion.php');

	$respuesta = array('error' => false);

	$database = new Conexion();
	$db = $database->abrirConexion();
	try{
		$stmt = $db->prepare("INSERT INTO productos (codigo, nombre, unidad, fechaCaducidad, lote) VALUES (:codigo, :nombre, :unidad, :fechaCaducidad, :lote)");
		$stmt->bindParam(':codigo', $_POST['codigo']);
		$stmt->bindParam(':nombre', $_POST['nombre']);
		$stmt->bindParam(':unidad',$_POST['unidad']);
		$stmt->bindParam(':fechaCaducidad', $_POST['fechaCaducidad']);
		$stmt->bindParam(':lote', $_POST['lote']);
		
		if ($stmt->execute()){
			$respuesta['message'] = 'Producto creado';
		}
		else{
			$respuesta['error'] = true;
			$respuesta['messaje'] = 'Error al crear';
		} 
		   
	}
	catch(PDOException $e){
		$respuesta['error'] = true;
 		$respuesta['mensaje'] = $e->getMessage();
	}
	$database->cerrarConexion();
	echo json_encode($respuesta);

?>