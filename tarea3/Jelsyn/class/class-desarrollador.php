<?php

	class Desarrollador extends Usuario{

		private $url;

		public function __construct($nombre,$apellido,$url){
			$this->url = $url;
			parent::__construct($nombre,$apellido);
		}

		public function getUrl(){
			return $this->url;
		}

		public function setUrl($url){
			$this->url = $url;
		}

		public function __toString(){
			return $this->getNombre();
		}
	}
?>