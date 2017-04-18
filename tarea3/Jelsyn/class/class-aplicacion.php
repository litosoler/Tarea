<?php

	class Aplicacion extends Producto{

		private $categoria;
		private $desarrollador;
		private $version;
		private $fechaActualizacion;

		public function __construct(
					$nombreProducto,
					$descripcion,
					$fechaPublicacion,
					$calificacionPromedio,
					$comentario,
					$URLProducto,
					$tamanoArchivo,
					$estatus,
					$icono,
					$categoria,
					$desarrollador,
					$version,
					$fechaActualizacion){

					parent::__construct($nombreProducto,
					$descripcion,
					$fechaPublicacion,
					$calificacionPromedio,
					$comentario,
					$URLProducto,
					$tamanoArchivo,
					$estatus,
					$icono);
			$this->categoria = $categoria;
			$this->desarrollador = $desarrollador;
			$this->version = $version;
			$this->fechaActualizacion = $fechaActualizacion;
		}
		public function getCategoria(){
			return $this->categoria;
		}
		public function setCategoria($categoria){
			$this->categoria = $categoria;
		}
		public function getDesarrollador(){
			return $this->desarrollador;
		}
		public function setDesarrollador($desarrollador){
			$this->desarrollador = $desarrollador;
		}
		public function getVersion(){
			return $this->version;
		}
		public function setVersion($version){
			$this->version = $version;
		}
		public function getFechaActualizacion(){
			return $this->fechActualizacion;
		}
		public function setFechaActualizacion($fechaActualizacion){
			$this->fechaActualizacion = $fechaActualizacion;
		}
		public function __toString(){
			return "Categoria: " . $this->categoria . 
				" Desarrollador: " . $this->desarrollador . 
				" Version: " . $this->version . 
				" Fecha de actualizacion: " . $this->fechaActualizacion;
		}
	}
?>