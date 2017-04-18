<?php

	class Usuario{

		protected $nombre;
		protected $email;

		public function __construct($nombre, $email){
			$this->nombre= $nombre;
			$this->email= $email;
		}

		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function __toString(){
			return "Nombre: " . $this->nombre ." ". 
				" Email: " . $this->email;
		}
	}
?>