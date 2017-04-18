<?php
	
	include_once("class-usuario.php");
	include_once("class-desarrollador.php");
	include_once("class-comentario.php");
	include_once("class-icono.php");
	include_once("class-producto.php");
	include_once("class-aplicacion.php");
	include_once("class-libro.php");
	include_once("class-peliculas.php");



	$limite = 6;

	$nombres=array("Acevedo Manríquez", "María Mejía", "Enrique Acevedo Ruiz", "Carolina Acosta", "Canto Tomás", "José Acosta Gámez", "Celina Aguilar", "Irma Aguilar Lemus", "María Ofelia Aguilar", "Marcela Aguilar Pérez", "Fredy Francisco Alarcón", "Salomón López", "Gerardo Pérez");

	$categorias= array("Bebida y comida", "Compras", "Deporte",	"Diseño multimedi", "Educacion", "Entretenimiento",	 "Finanzas personales", "Estilo de vida", "Fotos y videos", "Gobierno y politica", "Herramientas de desarrollo",	"Libros y referencia",
	"Medicina",	"Música",	"Navegacón y mapas",
	"Negocio", "Niños yfmilia", "Noticia  clima", "Personalización"); 

	for ($i=0; $i <= $limite ; $i++){
		$nombre= $nombres[$i]; 
		$usuarios[]= new Usuario($nombre, trim($nombre)."@ejemplo.com"); 
		$desarrolladores[]= new Desarrollador($nombre, trim($nombre)."@ejemplo.com","UrlDesarrollador".$i); 
		unset($nombre);
	}

	for ($i=0; $i <= $limite ; $i++){ 
		$iconos[]= new Icono(15, 15, "http://localhost/playStore/img/icono".$i.".png"); 
	}

	for ($i=0; $i <= $limite ; $i++){ 
		$comentario1[]= new Comentario("opinion_".$i, "El trozo de texto estándar de Lorem Ipsum usado desde el año 1500 es",     $usuarios[$i], rand(1,30)."/".rand(1,12)."/".rand(2000,2020)); 
	}


	

	for ($i=0; $i <= $limite ; $i++){ 
		$aplicaciones[]= new Aplicacion("nombre_".$i, "descripcion", rand(1,30)."/".rand(1,12)."/".rand(2000,2020), rand(0,10),
		 $comentario1[rand(1,$limite)], "http://localhost/playstore/apks/Aplicacion".$i.".apk", rand(1,1000)."mb", "estatus", 
		 $iconos[rand(1,$limite)], $categorias[rand(0,count($categorias)-1)],
					$desarrolladores[rand(0,$limite)], rand(0,3).".".rand(0,8).".".rand(0,5),
					rand(1,30)."/".rand(1,12)."/".rand(2000,2020), rand(0,10)); 
	}

?>