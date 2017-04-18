<?php

	class Producto{

		protected $nombreProducto;
		protected $descripcion;
		protected $fechaPublicacion;
		protected $calificacionPromedio;
		protected $comentario;
		protected $URLProducto;
		protected $tamanoArchivo;
		protected $estatus;
		protected $icono;

		public function __construct($nombreProducto,
					$descripcion,
					$fechaPublicacion,
					$calificacionPromedio,
					$comentario,
					$URLProducto,
					$tamanoArchivo,
					$estatus,
					$icono){
			$this->nombreProducto = $nombreProducto;
			$this->descripcion = $descripcion;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->calificacionPromedio = $calificacionPromedio;
			$this->comentario = $comentario;
			$this->URLProducto = $URLProducto;
			$this->tamanoArchivo = $tamanoArchivo;
			$this->estatus = $estatus;
			$this->icono = $icono;
		}
		public function getNombreProducto(){
			return $this->nombreProducto;
		}
		public function setNombreProducto($nombreProducto){
			$this->nombreProducto = $nombreProducto;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		public function getFechaPublicacion(){
			return $this->fechaPublicacion;
		}
		public function setFechaPublicacion($fechaPublicacion){
			$this->fechaPublicacion = $fechaPublicacion;
		}
		public function getCalificacionPromedio(){
			return $this->calificacionPromedio;
		}
		public function setCalificacionPromedio($calificacionPromedio){
			$this->calificacionPromedio = $calificacionPromedio;
		}
		public function getComentario(){
			return $this->comentario;
		}
		public function setComentario($comentario){
			$this->comentario = $comentario;
		}
		public function getURLProducto(){
			return $this->URL-Producto;
		}
		public function setURLProducto($URLProducto){
			$this->URLProducto = $URLProducto;
		}
		public function getTamanoArchivo(){
			return $this->tamanoArchivo;
		}
		public function setTamanoArchivo($tamanoArchivo){
			$this->tamanoArchivo = $tamanoArchivo;
		}
		public function getEstatus(){
			return $this->estatus;
		}
		public function setEstatus($estatus){
			$this->estatus = $estatus;
		}
		public function getIcono(){
			return $this->icono;
		}
		public function setIcono($icono){
			$this->icono = $icono;
		}
		public function __toString(){
			return "NombreProducto: " . $this->nombreProducto . 
				" Descripcion: " . $this->descripcion . 
				" FechaPublicacion: " . $this->fechaPublicacion . 
				" CalificacionPromedio: " . $this->calificacionPromedio . 
				" Comentario: " . $this->comentario . 
				" URL-Producto: " . $this->URL-Producto . 
				" TamanoArchivo: " . $this->tamanoArchivo . 
				" Estatus: " . $this->estatus . 
				" Icono: " . $this->icono;
		}
	}
?>