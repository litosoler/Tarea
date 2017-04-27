var codigoUsuarioG;

function seleccionarUsuario(codigoUsuario, nombreUsuario){
	var valuetxt = "codigo_usuario="+codigoUsuario+
					"&nombre_usuario="+nombreUsuario;

	$.ajax({
		url: "ajax/acciones.php?accion=3",
		method: "POST",
		data: valuetxt,
		success : function(resultado){
			$("#div-txt").html(resultado);
			codigoUsuarioG = codigoUsuario;
		}
	});
	generarTargetasamigo(codigoUsuario);
	generarTargetasnoAmigo(codigoUsuario);
	}

function agregarAmigo(codigoNuevoAmigo){
	$("#img-loading").fadeIn(200);
	var Nuevo = "codigo_nuevo="+codigoNuevoAmigo+
					"&codigo_usuario="+codigoUsuarioG;

	$.ajax({
		url: "ajax/acciones.php?accion=6",
		method: "POST",
		data: Nuevo,
		success: function(resultado){
			$("#img-loading").fadeOut(200);
			alert(resultado);
			generarTargetasamigo(codigoUsuarioG);
			generarTargetasnoAmigo(codigoUsuarioG);
		}
	});
	
}


$(document).ready(function(){
	$("#btn-tengo-hambre").click(function(e){
		e.preventDefault();
		alert("Puede tomar 5 minutos e ir donde don Tito a comprar algo, me trae.");
	});	
	$("#btn-ir-banio").click(function(e){
		e.preventDefault();
		alert("Vaya, solamente deje su telefono en el escritorio.");
	});	


generarTargetasUsuario = function(){
	$.ajax({
		url: "ajax/acciones.php?accion=1",
		method: "POST",
		success : function(resultado){
		$("#div-usuarios").html(resultado);
		}
	});
}
generarTargetasUsuario();

nuevoAmigo = function(){

}

generarTargetasamigo = function(codigoUsuario){
	var value = 
	"codigo_usuario="+codigoUsuario;
	$.ajax({
		url: "ajax/acciones.php?accion=2",
		method: "POST",
		data: value,
		success : function(resultado){
		$("#div-amigos").html(resultado);
		}
	});
}

generarTargetasnoAmigo = function(codigoUsuario){
	var value = 
	"codigo_usuario="+codigoUsuario;
	$.ajax({
		url: "ajax/acciones.php?accion=5",
		method: "POST",
		data : value,
		success : function(resultado){
		$("#div-no-amigos").html(resultado);
		}
	});
}


$("#btn-guardar-usuario").click(function(){
		var parametros =
		"txt-usuario="+$("#txt-usuario").val()+
		"&txt-correo="+$("#txt-correo").val()+
		"&txt-contrasena="+$("#txt-contrasena").val()+
		"&slc-url-imagen="+$("#slc-url-imagen").val();
		alert(parametros);
		$.ajax({
			url: "ajax/acciones.php?accion=4",
			method: "POST",
			data: parametros,
			success : function(resultado){
			$("#div-usuarios").html(resultado);
			generarTargetasUsuario();
		}
		});
	});

$("#btn-ingresar").click(function(){
		var parametros =
		"txt-email="+$("#txt-email").val()+
		"&txt-pass="+$("#txt-pass").val();
		alert(parametros);

		$.ajax({
			url: "ajax/acciones.php?accion=7",
			method: "POST",
			data: parametros,
			success : function(resultado){
			$("#div-alert").html(resultado);
		}
		});

	});


});

