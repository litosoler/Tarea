<?php

	class Usuario{

		protected $nombreUsuario;
		protected $correoElectronico;

		public function __construct($nombreUsuario,
					$correoElectronico){
			$this->nombreUsuario = $nombreUsuario;
			$this->correoElectronico = $correoElectronico;
		}
		public function getNombreUsuario(){
			return $this->nombreUsuario;
		}
		public function setNombreUsuario($nombreUsuario){
			$this->nombreUsuario = $nombreUsuario;
		}
		public function getCorreoElectronico(){
			return $this->correoElectronico;
		}
		public function setCorreoElectronico($correoElectronico){
			$this->correoElectronico = $correoElectronico;
		}
		public function toString(){
			return "NombreUsuario: " . $this->nombreUsuario . 
				" CorreoElectronico: " . $this->correoElectronico;
		}

		public static function generarListaUsuarios($conexion){
			$resultado = $conexion->ejecutarInstruccion(
				"SELECT codigo_usuario, nombre, apellido
				FROM tbl_usuarios 
				WHERE codigo_tipo_usuario =1"
			);
			echo '<select name="" id="slc-usuarios" class="form-control">';
			while($fila = $conexion->obtenerFila($resultado)){
				echo '<option value="'.$fila["codigo_usuario"].'">'.
					$fila["nombre"].' '.$fila["apellido"].'</option>';
			}
			echo '</select>';

		}
	}
?>