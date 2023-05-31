$(document).ready(function(){
	obtenerRegistros();
});

//Crear
$('#btnAgregar').click(function(){
	$('#crear').modal('show');
});
$('#formularioCrear').submit(function(e){
	e.preventDefault();
	var formularioCrear = $(this).serialize();
	$.ajax({
		method: 'POST',
		url: 'crear.php',
		data: formularioCrear,
		dataType: 'json',
		success: function(response){			
			if(response.error){
				alert("Error al crear producto : " + response.mensaje);
			}
			else{
				alert("Producto creado");
				$('#crear').modal('hide');
				$("#formularioCrear")[0].reset();
				obtenerRegistros();
			}
		}
	});
});

//Editar
$(document).on('click', '#btnEditar', function(){
	var matricula = $('#codigo').val();
	if(matricula == ""){
		alert('Seleccione un registro por favor.');
	} else{
		$('#editar').modal('show');	
	}
});
$('#formularioEditar').submit(function(e){
	e.preventDefault();
	var formularioEditar = $(this).serialize();
	$.ajax({
		method:'POST',
		url:'editar.php',
		data:formularioEditar,
		dataType: 'json',
		success: function(response){
			if (response.error) {
				alert("Error al guardar los datos :" + response.mensaje);
				$('#editar').modal('hide');
			} else{
				$('#editar').modal('hide');
				alert("Producto modificado");					
				$("#formularioEditar")[0].reset();
				limpiar();
				obtenerRegistros();
			}
		}
	});
});
//Eliminar
$(document).on('click', '#btnEliminar', function(){
	var matricula = $('#codigoEliminar').val();
	if(matricula == ""){
		alert('Seleccione un registro por favor.');
	} else{
		$('#eliminar').modal('show');
	}
});
$('#formularioEliminar').submit(function(e){
	e.preventDefault();
	var codigo = $('#codigoEliminar').val();
	$.ajax({
		method:'POST',
		url:'eliminar.php',
		data:{codigo:codigo},
		dataType:'json',
		success: function(response){
			if(response.error){
				alert('Error al eliminar al producto' + response.mensaje);
			} else{
				alert('Producto eliminado ');
				$('#eliminar').modal('hide');
				limpiar();
				obtenerRegistros();
			}				
		}
	});
});


//seleccion registro tabla
$(document).on('click', '.datos', function(){
	var codigo = $(this).find("td:nth-child(1)").text();
	var nombre = $(this).find("td:nth-child(2)").text();
	var unidad = $(this).find("td:nth-child(3)").text();
	var fechaCaducidad = $(this).find("td:nth-child(4)").text();
	var lote = $(this).find("td:nth-child(5)").text();
	$('.registroEliminar').html(nombre);	
	$('#codigo').val(codigo);
	$('#codigoEliminar').val(codigo);
	$('#nombre').val(nombre);
	$('#unidad').val(unidad);
	$('#fechaCaducidad').val(fechaCaducidad);	
	$('#lote').val(lote);
	if($(this).hasClass('seleccinada') == false){
		quitarseleccion();
		$(this).addClass('seleccinada');
	}
});




$(document).on('click', '.btnCancelar', function(){
	limpiar();
	quitarseleccion();
});

function limpiar(){
	$('#codigo').val('');
	$('#codigoEliminar').val('');
	$('#nombre').val('');
	$('#unidad').val('');
	$('#fechaCaducidad').val('');
	$('#lote').val('');
}

function quitarseleccion(){
	$('.seleccinada').each(function(index, element){
		$(element).removeClass('seleccinada')
	})
}

function obtenerRegistros(){
	$.ajax({
		method: 'POST',
		url: 'consulta.php',
		success: function(response){
			$('#contenido').html(response);
		}
	});
}