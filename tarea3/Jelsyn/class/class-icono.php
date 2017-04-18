<?php

	class Icono{

		private $ancho;
		private $alto;
		private $url;

		public function __construct($ancho,
					$alto,
					$url){
			$this->ancho = $ancho;
			$this->alto = $alto;
			$this->url = $url;
		}
		public function getAncho(){
			return $this->ancho;
		}
		public function setAncho($ancho){
			$this->ancho = $ancho;
		}
		public function getAlto(){
			return $this->alto;
		}
		public function setAlto($alto){
			$this->alto = $alto;
		}
		public function getUrl(){
			return $this->url;
		}
		public function setUrl($url){
			$this->url = $url;
		}
		public function __toString(){
			return $this->url;
		}
	}
?>