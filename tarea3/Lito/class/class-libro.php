<?php

	class Libro{

		private $editorial;
		private $fechaPublicacion;
		private $autor;
		private $idioma	;

		public function __construct($editorial,
					$fechaPublicacion,
					$autor,
					$idioma	){
			$this->editorial = $editorial;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->autor = $autor;
			$this->idioma	 = $idioma	;
		}
		public function getEditorial(){
			return $this->editorial;
		}
		public function setEditorial($editorial){
			$this->editorial = $editorial;
		}
		public function getFechaPublicacion(){
			return $this->fechaPublicacion;
		}
		public function setFechaPublicacion($fechaPublicacion){
			$this->fechaPublicacion = $fechaPublicacion;
		}
		public function getAutor(){
			return $this->autor;
		}
		public function setAutor($autor){
			$this->autor = $autor;
		}
		public function getIdioma	(){
			return $this->idioma	;
		}
		public function setIdioma	($idioma	){
			$this->idioma	 = $idioma	;
		}
		public function __toString(){
			return "Editorial: " . $this->editorial . 
				" FechaPublicacion: " . $this->fechaPublicacion . 
				" Autor: " . $this->autor . 
				" Idioma	: " . $this->idioma	;
		}
	}
?>