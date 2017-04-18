<?php

	class Comentario{

		private $titulo;
		private $comentario;
		private $usuario;		
		private $fechaComentario;

		public function __construct($titulo,
					$comentario,
					$usuario,
					$fechaComentario	){
			$this->titulo = $titulo;
			$this->comentario = $comentario;
			$this->usuario = $usuario;
			$this->fechaComentario= $fechaComentario;
		}
		public function getTitulo(){
			return $this->titulo;
		}
		public function setTitulo($t0itulo){
			$this->titulo = $titulo;
		}
		public function getComentario(){
			return $this->comentario;
		}
		public function setComentario($comentario){
			$this->comentario = $comentario;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		public function getFechaComentario	(){
			return $this->fechaComentario	;
		}
		public function setFechaComentario	($fechaComentario	){
			$this->fechaComentario	 = $fechaComentario	;
		}
		public function __toString(){
			return "Titulo: " . $this->titulo . 
				" Comentario: " . $this->comentario . 
				" Usuario: " . $this->usuario . 
				" FechaComentario	: " . $this->fechaComentario	;
		}
	}
?>