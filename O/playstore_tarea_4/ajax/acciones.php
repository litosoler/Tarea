<?php
	switch ($_GET["accion"]) {
		case '1':
			/*$nombreProducto,
			$descripcion,
			$fechaPublicacion,
			$calificaciónPromedio,
			$comentarios,
			$URLProducto,
			$tamanioArchivo,
			$icono,
			$categoria,
			$estatus,
			$version,
			$fechaActualizacion,
			$desarrollador*/
			include_once("../class/class_conexion.php");
			include_once("../class/class_producto.php");
			include_once("../class/class_icono.php");
			include_once("../class/class_usuario.php");
			include_once("../class/class_desarrollador.php");
			include_once("../class/class_aplicacion.php");

			$conexion = new Conexion();
			$aplicacion = new Aplicacion($_POST["txt-aplicacion"],
					$_POST["txt-descripcion"],
					$_POST["dte-fecha-publicacion"],
					$_POST["txt-calificacion"],
					null,//Comentarios
					$_POST["txt-url"],
					$_POST["txt-tamanio"],
					new Icono($_POST["slc-icono"],5,5),
					$_POST["categorias"],//Categorias, esto es un arregla
					null,//Estatus
					$_POST["txt-version"],
					$_POST["dte-fecha-actualizacion"],
					new Desarrollador($_POST["slc-desarrollador"], null,null)
			);

			echo "Categorias: " . var_dump($_POST["categorias"]);

			$aplicacion->guardarRegistro($conexion);
			break;
		case '2':
			include_once("../class/class_conexion.php");
			$conexion = new Conexion();
			$resultado = $conexion->ejecutarInstruccion(
					'SELECT 	a.codigo_aplicacion, a.codigo_desarrollador, 
								a.nombre_aplicacion,a.descripcion, 
								a.fecha_publicacion, a.fecha_actualizacion, 
								a.version, a.url, a.url_icono, a.calificacion, b.usuario
					FROM tbl_aplicaciones a
					INNER JOIN tbl_usuarios b
					ON (a.codigo_desarrollador = b.codigo_usuario)'
			);
			while ($fila = $conexion->obtenerFila($resultado)){
				?>
				<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
					<div class="well">
						<a href="detalle_aplicacion.php?codigo_aplicacion=<?php echo $fila["codigo_aplicacion"]; ?>"><img src="<?php echo $fila["url_icono"]; ?>" class="img-responsive">
						<b><?php echo $fila["nombre_aplicacion"]; ?></b><br></a>
						<span class="label label-primary"><?php echo $fila["calificacion"]; ?></span>
						<?php 
							for ($j=0;$j<$fila["calificacion"];$j++)
								echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
						?>
						<br>
						Versión: <b><?php echo $fila["version"]; ?></b><br>
						<a href="<?php echo $fila["url"]; ?>">Descargar</a>
						<br>
						<span class="glyphicon glyphicon-pencil" onclick="actualizarAplicacion(<?php echo $fila["codigo_aplicacion"]; ?>)" aria-hidden="true"></span>
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
					</div>
				</div>
				<?php
			}
			
			break;

			case '3':
			include_once("../class/class_conexion.php");
			include_once("../class/class_comentario.php");

				$conexion = new Conexion();
				$nuevoComentario= new comentario(
					$_POST["slc-usuarios"],
					$_POST["txt-comentarios"],
					$_POST["lbl-fecha"],
					$_POST["lbl-codigo-aplicacion"],
					null);

				$nuevoComentario->guardarComentario($conexion);
			break;

			case '4':
			include_once("../class/class_conexion.php");
			include_once("../class/class_comentario.php");
				$conexion = new Conexion();
				$cod = $_POST["lbl-codigo-aplicacion"];

				$comentarios = $conexion->ejecutarInstruccion(
					'SELECT t.codigo_comentario, 
							t.comentario, 
							t.fecha_publicacion,
							t.calificacion, 
							t.codigo_usuario,
							t.codigo_aplicacion,
							h.usuario,
							h.codigo_usuario
					FROM tbl_comentarios t
					INNER JOIN tbl_usuarios h
					ON (t.codigo_usuario = h.codigo_usuario)
					WHERE t.codigo_aplicacion= '.$cod.'');	

				while ($com = $conexion->obtenerFila($comentarios)){
					echo 
					'<div class="container"> 
						usuario:'.$com["usuario"].'<br>
						fecha:'.$com["fecha_publicacion"].'<br>
						<div class="well col-md-10">
							'.$com["comentario"].'
						</div><br>
					</div>';
				}

			break;

		default:

			$detalles = $conexion->ejecutarInstruccion(
					'SELECT 	c.codigo_aplicacion, c.codigo_desarrollador, 
								c.nombre_aplicacion,c.descripcion, 
								c.fecha_publicacion, c.fecha_actualizacion, 
								c.version, c.url, c.url_icono, c.calificacion, b.usuario
					FROM tbl_aplicaciones c
					INNER JOIN tbl_usuarios b
					ON (c.codigo_desarrollador = b.codigo_usuario)
					WHERE c.codigo_aplicacion= '.$accion.'');	
			# code...
			break;
	}
	
?>

