<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Tarea 2</title>
	</head>
	<body>

	<div class="container">
	<div class="row">
		<div class="col-sm-12">
		<?php
			for ($i=0; $i < 10; $i++) { 
			echo "<div class=\"well well-sm col-sm-1\">";
			echo "<img src = \"img/icono1.png\" class=\"img-responsive\">";
			echo "<b>Aplicacion1</b>";
			echo"<br>";
			echo "<span class=\"label label-primary\">5</span>";
			echo "<span class=\"glyphicon glyphicon-star\" aria-hidden=\"true\"></span>";
			echo "<br>";
			echo "descripcion de la aplicacion 1"."<br>";
			echo "Versión: <b>1.2.4</b>"."<br>";
			echo "<a href=\"img/icono1.png\">Descargar</a>";
			echo "</div>";
			}
		?>
		</div>
		
	</div>
	</div>
	</body>
</html>