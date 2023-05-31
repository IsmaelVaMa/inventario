<?php
	include_once('conexion.php');

	$database = new Conexion();
	$db = $database->abrirConexion();

	try{	
	    $sql = 'SELECT * FROM productos';
	    foreach ($db->query($sql) as $row) {
	    	?>
	    	<tr class="datos">
	    		<td><?php echo $row['codigo']; ?></td>
	    		<td><?php echo $row['nombre']; ?></td>
	    		<td><?php echo $row['unidad']; ?></td>
	    		<td><?php echo $row['fechaCaducidad']; ?></td>
	    		<td><?php echo $row['lote']; ?></td>
	    	</tr>
	    	<?php 
	    }
	}
	catch(PDOException $e){
		echo "Error al consultar los registros: " . $e->getMessage();
	}
	$database->cerrarConexion();	
?>