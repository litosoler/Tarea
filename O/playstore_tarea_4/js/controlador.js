function actualizarAplicacion(codigoAplicacion){
	alert("Aplicacion a actualizar:" + codigoAplicacion);
	
	$.ajax({
			url:"ajax/acciones.php?accion=3",
			method: "POST",
			data: parametros,
			success:function(resultado){
				$("#resultado").html(resultado);
				cargarTarjetas();
			},
			error:function(){

			}
	});
} 	
$(document).ready(function(){
	$("#btn-guardar").click(function(){
		var categoriasSeleccionadas="";
		
		$("input[name='chkcategorias[]']:checked").each(function(){
			categoriasSeleccionadas+="categorias[]="+$(this).val()+"&";
		});


		//Otra forma de enviar la inforamcion es con FormData
		var parametros=
			"txt-aplicacion="+$("#txt-aplicacion").val()+
			"&txt-descripcion="+$("#txt-descripcion").val()+
			"&dte-fecha-publicacion="+$("#dte-fecha-publicacion").val()+
			"&dte-fecha-actualizacion="+$("#dte-fecha-actualizacion").val()+
			"&txt-calificacion="+$("#txt-calificacion").val()+
			"&txt-url="+$("#txt-url").val()+
			"&txt-tamanio="+$("#txt-tamanio").val()+
			"&"+categoriasSeleccionadas+
			"txt-version="+$("#txt-version").val()+
			"&slc-desarrollador="+$("#slc-desarrollador").val()+
			"&slc-icono="+$("#slc-icono").val();

		//$.post $.get
		$.ajax({
			url:"ajax/acciones.php?accion=1",
			method: "POST",
			data: parametros,
			success:function(resultado){
				$("#resultado").html(resultado);
				cargarTarjetas();
			},
			error:function(){

			}
		});
	});
	
	cargarTarjetas = function(){
		$.ajax({
			url:"ajax/acciones.php?accion=2",
			method: "POST",
			success:function(resultado){
				$("#div-lista-aplicaciones").html(resultado);
			},
			error:function(){

			}
		});
	}
	cargarTarjetas();

	$("#btn-guardarComentario").click(function(){

		var comentario =
		"txt-comentarios="+$("#txt-comentarios").val()+
		"&lbl-fecha="+$("#lbl-fecha").val()+
		"&slc-usuarios="+$("#slc-usuarios").val()+
		"&lbl-codigo-aplicacion="+$("#lbl-codigo-aplicacion").val();

		$.ajax({
			url:"ajax/acciones.php?accion=3",
			method: "POST",
			data: comentario,
			success:function(resultado){
				$("#div-prueba").html(resultado);
				cargarComentarios();
			},
			error:function(){
				
			}
		});
	});

	cargarComentarios = function(){
		var comentario = "lbl-codigo-aplicacion="+$("#lbl-codigo-aplicacion").val();

		$.ajax({
			url:"ajax/acciones.php?accion=4",
			method: "POST",
			data: comentario,
			success:function(resultado){
				$("#div-comentarios").html(resultado);
			},
			error:function(){

			}
		});
	}
	cargarComentarios();

});

