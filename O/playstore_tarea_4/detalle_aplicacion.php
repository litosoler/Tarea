<?php
include_once("class/class_conexion.php");	
include_once("class/class_producto.php");
include_once("class/class_aplicacion.php");
include_once("class/class_usuario.php");

	$accion= $_GET["codigo_aplicacion"];
	$conexion = new Conexion();
			$resultado = $conexion->ejecutarInstruccion(
				'SELECT 	a.codigo_imagen, 
							a.url_imagen, 
							a.codigo_aplicacion
				FROM tbl_imagenes a
				WHERE a.codigo_aplicacion= '.$accion.'');

			$detalles = $conexion->ejecutarInstruccion(
					'SELECT 	c.codigo_aplicacion, c.codigo_desarrollador, 
								c.nombre_aplicacion,c.descripcion, 
								c.fecha_publicacion, c.fecha_actualizacion, 
								c.version, c.url, c.url_icono, c.calificacion, b.usuario
					FROM tbl_aplicaciones c
					INNER JOIN tbl_usuarios b
					ON (c.codigo_desarrollador = b.codigo_usuario)
					WHERE c.codigo_aplicacion= '.$accion.'');	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detalles Aplicacion</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/div.css">
</head>
<body class="container">

<div class="container-fluid">
    <div class="row">
            <?php aplicacion::Carrousel($conexion,$resultado,$detalles); ?>

            <div class="well">
			</div>

			<div class="container-fluid">
				<div class="well">
					<div id="div-comentarios" class="well">
						<!--generar comentarios-->
					</div>
					<input type="text" id="lbl-codigo-aplicacion" style="display:none" value="<?php echo $accion;?>">
					<input type="text" id="lbl-fecha" value="<?php echo date("Y-m-d");  ?>" style="display:none"><br>
					Usuario:
					<?php Usuario::generarListaUsuarios($conexion); ?>
					ingrese un comentario:
					<input type="text" class="form-control" id="txt-comentarios" name="txt-comentarios"><br>
					<button id="btn-guardarComentario" name="btn-guardarComentario" class="btn btn-success">Enviar Comentario</button>
				</div>
			</div>		
			
    </div>
</div>
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/controlador.js"></script>
</body>
</html>
