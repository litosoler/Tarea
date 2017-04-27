<?php
include_once("../class/class_conexion.php");
switch ($_GET["accion"]) {
	case '1':
		$conexion = new Conexion();
		$infoUsuarios= $conexion->ejecutarInstruccion(
			'SELECT codigo_usuario, nombre_usuario, 
					correo, contrasena, url_imagen_perfil
			FROM tbl_usuarios;'
			);

			while($info =$conexion->obtenerFila($infoUsuarios)){
?>
		        <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2  card-container">
                  <div class="card-profile">
                    <button type="button" class="btn btn-primary btn-xs" style="position: absolute;" title="Usuario" onclick="seleccionarUsuario(<?php echo $info["codigo_usuario"];  ?> , '<?php echo $info["nombre_usuario"]; ?>');">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </button>
                    <img src="<?php echo $info["url_imagen_perfil"];  ?>"class="img-responsive">
                    <span class="profile-name"><?php echo $info["contrasena"]; ?></span>  
                  </div>
                </div>
<?php
			}
		# code...
		break;

	case '2':
		$conexion = new Conexion();
		$codigo= $_POST["codigo_usuario"];
		$infoUsuarios= $conexion->ejecutarInstruccion(
			'SELECT a.codigo_usuario, a.nombre_usuario, a.correo, a.contrasena, a.url_imagen_perfil
				FROM tbl_usuarios a
				INNER JOIN tbl_amigos b
				ON (a.codigo_usuario = b.codigo_usuario_amigo)
				WHERE b.codigo_usuario = '.$codigo.';'
			);

		while($info =$conexion->obtenerFila($infoUsuarios)){
?>
			<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2  card-container">
                  <div class="card-profile">
                    <img src="<?php echo $info["url_imagen_perfil"];  ?>" class="img-responsive">
                    <span class="profile-name"><?php echo $info["nombre_usuario"]; ?></span>
                  </div>
             </div>
<?php
		}

		break;

	case '3':
		$codigo= $_POST["codigo_usuario"];
		$nombre= $_POST["nombre_usuario"];

		echo '<p>ID: <input type="text" id="txt-id-usuario" class="form-control" disabled="disabled" value='.$codigo.'><br>
            Perfil actual: <input type="text" id="txt-nombre"  class="form-control" disabled="disabled" value='.$nombre.'></p>';
		break;

	case '4':
		include_once("../class/class_conexion.php");
		include_once("../class/class_usuario.php");
		$conexion = new Conexion();
		$nuevoUsuario = new usuario($_POST["txt-usuario"],
			$_POST["txt-correo"],
			$_POST["txt-contrasena"],
			$_POST["slc-url-imagen"]
			);

		$nuevoUsuario->guardarUsuarios($conexion);
		
		break;

	case '5':
		$conexion = new Conexion();
		$codigo= $_POST["codigo_usuario"];
		$infoUsuarios= $conexion->ejecutarInstruccion(
			'SELECT a.codigo_usuario, a.nombre_usuario, a.correo, a.contrasena, a.url_imagen_perfil
				FROM tbl_usuarios a
				WHERE a.codigo_usuario NOT IN
				(
				 SELECT codigo_usuario_amigo
				FROM tbl_amigos
				WHERE codigo_usuario = '.$codigo.'
				)
				AND a.codigo_usuario != '.$codigo.';'

			);

		while($info =$conexion->obtenerFila($infoUsuarios)){
?>
			 <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2  card-container">
                  <div class="card-profile">
                  <button type="button" id="btn-agregar" class="btn btn-primary btn-xs" style="position: absolute;" title="Agregar" onclick="agregarAmigo(<?php echo $info["codigo_usuario"];  ?> );">
                      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </button>
                    <img src="<?php echo $info["url_imagen_perfil"];  ?>" class="img-responsive">
                    <span class="profile-name"><?php echo $info["nombre_usuario"]; ?></span>
                  </div>
              </div>
<?php
		}
		break;

	case '6':
		sleep(2);
		$conexion = new Conexion();
		$codigoNuevo = $_POST["codigo_nuevo"];
		$codigoUsuario = $_POST["codigo_usuario"];
		$instruccion = sprintf("INSERT INTO tbl_amigos(
				codigo_usuario, 
				codigo_usuario_amigo
				) VALUES (
					'%s','%s'
				)",
			stripslashes($codigoUsuario),
			stripslashes($codigoNuevo)
			);

		$instruccion2 = sprintf("INSERT INTO tbl_amigos(
				codigo_usuario, 
				codigo_usuario_amigo
				) VALUES (
					'%s','%s'
				)",
			stripslashes($codigoNuevo),
			stripslashes($codigoUsuario)
			);

		$amistad = $conexion ->ejecutarInstruccion($instruccion);
		$amistad = $conexion ->ejecutarInstruccion($instruccion2);

		if($amistad){
				echo "amigo agregado con exito";
			}else{
				echo "Error al guardar el registro";
				exit;
			}
		break;

	case '7':
		$conexion = new Conexion();
		$email = $_POST["txt-email"];
		$pass = $_POST["txt-pass"];
		$i=0;
		$info = $conexion->ejecutarInstruccion(
			'SELECT correo, 
					contrasena 
				FROM tbl_usuarios 
			');

			while($comparacion = $conexion->obtenerFila($info)){
				if(($comparacion["correo"]==$email)&&($comparacion["contrasena"]==$pass)){
					$i++;
				}
			}

			if($i==1){
				echo '<div class="alert alert-success">
						  	<strong>Success!</strong> usuario existente.
						  </div>';
			}else{
				echo '<div class="alert alert-danger">
						  <strong>Danger!</strong> usuario no existe.
						</div>';
			}
		break;
	default:
		# code...
		break;
}


?>