<?php

	class Comentario{

		private $usuario;
		private $descripcionComentario;
		private $fechaComentario;
		private $aplicacion;
		private $calificacion;

		public function __construct(
					$usuario,
					$descripcionComentario,
					$fechaComentario,
					$aplicacion,
					$calificacion){
			$this->usuario = $usuario;
			$this->descripcionComentario = $descripcionComentario;
			$this->fechaComentario = $fechaComentario;
			$this->aplicacion = $aplicacion;
			$this->calificacion = $calificacion;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		public function getDescripcionComentario(){
			return $this->descripcionComentario;
		}
		public function setDescripcionComentario($descripcionComentario){
			$this->descripcionComentario = $descripcionComentario;
		}
		public function getFechaComentario(){
			return $this->fechaComentario;
		}
		public function setFechaComentario($fechaComentario){
			$this->fechaComentario = $fechaComentario;
		}

		public function getAplicacion(){
			return $this->aplicacion;
		}
		public function setAplicacion($aplicacion){
			$this->aplicacion = $aplicacion;
		}

		public function getCalificacion(){
			return $this->fechaComentario;
		}
		public function setCalificacion($calificacion){
			$this->calificacion = $calificacion;
		}

		public function toString(){
			return "TituloComentario: " . $this->tituloComentario . 
				" Usuario: " . $this->usuario . 
				" DescripcionComentario: " . $this->descripcionComentario . 
				" FechaComentario: " . $this->fechaComentario;
		}

		public function guardarComentario($conexion){

			$sql = sprintf(
				"INSERT INTO tbl_comentarios
				(
				codigo_comentario,
				comentario, 
				fecha_publicacion, 
				calificacion, 
				codigo_usuario, 
				codigo_aplicacion
				) VALUES (
				NULL,'%s','%s',NULL,'%s','%s'
				)",

			stripslashes($this->descripcionComentario),
			stripslashes($this->fechaComentario),
			stripslashes($this->usuario),
			stripslashes($this->aplicacion)
			);

			echo "<br>Instruccion a ejecutar: ".$sql;
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($resultado){
				echo "<b>Registro almacenado con exito</b>";
			}else{
				echo "Error al guardar el registro";
				exit;
			}
		}
	}
?>