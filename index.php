<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD PHP AJAX BOOTSTRAP</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
	<style type="text/css">
	.seleccinada{
	    color: white;
	    background: #117A65;
	}

	tr{
		cursor: pointer;
	}
	</style>
</head>
<body>
	<div class="container mt-3">
		<h2 class="text-center">CRUD PHP AJAX BOOTSTRAP</h2>
		<button class="btn btn-outline-success mt-3 mb-3" id="btnAgregar">Agregar</button> 
		<button class="btn btn-outline-primary mt-3 mb-3" id="btnEditar">Editar</button>
		<button class="btn btn-outline-danger mt-3 mb-3" id="btnEliminar">Eliminar</button> 
		<table class="table">
			    <thead class="table table-dark">
					<th>Código</th>
					<th>Nombre</th>
					<th>Unidad</th>
					<th>Fecha caducidad</th>
					<th>Lote</th>
				</thead>
				<tbody id="contenido"></tbody>
			</table>
	</div>

<?php include("modales.html");?>


<!--bootstrap javascript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script src="acciones.js"></script>
</body>
</html>