<?php

	class Pelicula{

		private $direcctor;
		private $genero;
		private $duracion;
		private $idioma	;

		public function __construct($direcctor,
					$genero,
					$duracion,
					$idioma	){
			$this->direcctor = $direcctor;
			$this->genero = $genero;
			$this->duracion = $duracion;
			$this->idioma	 = $idioma	;
		}
		public function getDirecctor(){
			return $this->direcctor;
		}
		public function setDirecctor($direcctor){
			$this->direcctor = $direcctor;
		}
		public function getGenero(){
			return $this->genero;
		}
		public function setGenero($genero){
			$this->genero = $genero;
		}
		public function getDuracion(){
			return $this->duracion;
		}
		public function setDuracion($duracion){
			$this->duracion = $duracion;
		}
		public function getIdioma	(){
			return $this->idioma	;
		}
		public function setIdioma	($idioma	){
			$this->idioma	 = $idioma	;
		}
		public function __toString(){
			return "Direcctor: " . $this->direcctor . 
				" Genero: " . $this->genero . 
				" Duracion: " . $this->duracion . 
				" Idioma	: " . $this->idioma	;
		}
	}
?>