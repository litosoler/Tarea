<?php

	class Usuario{

		private $nombreUsuario;
		private $correo;
		private $contraseña;
		private $urlImagen;

		public function __construct($nombreUsuario,
					$correo,
					$contraseña,
					$urlImagen){
			$this->nombreUsuario = $nombreUsuario;
			$this->correo = $correo;
			$this->contraseña = $contraseña;
			$this->urlImagen = $urlImagen;
		}
		public function getNombreUsuario(){
			return $this->nombreUsuario;
		}
		public function setNombreUsuario($nombreUsuario){
			$this->nombreUsuario = $nombreUsuario;
		}
		public function getCorreo(){
			return $this->correo;
		}
		public function setCorreo($correo){
			$this->correo = $correo;
		}
		public function getContraseña(){
			return $this->contraseña;
		}
		public function setContraseña($contraseña){
			$this->contraseña = $contraseña;
		}
		public function getUrlImagen(){
			return $this->urlImagen;
		}
		public function setUrlImagen($urlImagen){
			$this->urlImagen = $urlImagen;
		}

		public function guardarUsuarios($conexion){
			$sql = sprintf("INSERT INTO tbl_usuarios(codigo_usuario, nombre_usuario, correo, contrasena, url_imagen_perfil
				) VALUES (
				null,'%s','%s','%s','%s')",
					stripslashes($this->nombreUsuario),
					stripslashes($this->correo),
					stripslashes($this->contraseña),
					stripslashes($this->urlImagen)
				);
			echo "<br>Instruccion a ejecutar: ".$sql;
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($resultado){
				echo "Registro almacenado con exito";
			}else{
				echo "Error al guardar el registro";
				exit;
			}
		} 

	}
?>