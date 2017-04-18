<?php
	include_once("class/arreglos.php");

	$base = new Conexion;
	$base->conectar();

	$consultaDes = $base->ejecutar("SELECT id, nombre, apellido FROM desarrollador");

	$nombre = $descripcion = $publicacion= $calificacion= $url = $tamanio = $version = $actualizacion = $icono = $desarrolador = "";
	$cateEnvi = array();
	
	if (isset($_POST["enviar"])) {
	 
	  if(isset($_POST["nombre"])){
 			$nombre = $_POST["nombre"]; 
		}
	  if(isset($_POST['descripcion'])){ 
	    $descripcion = $_POST['descripcion']; 
		}

	  if(isset($_POST['publicacion'])){  
	    $publicacion = $_POST['publicacion']; 
		}
	   if(isset($_POST['calificacion'])){  
	    $calificacion = $_POST['calificacion']; 
		}
	   if(isset($_POST['url'])){  
	    $url = $_POST['url']; 
	 	}
	   if(isset($_POST['tamanio'])){  
	    $tamanio = $_POST['tamanio']; 
	  } 
	  if(isset($_POST['version'])){
	  	$version = $_POST['version'];
	  }
	  if (isset($_POST['actualizacion'])) {
	  	$actualizacion = $_POST['actualizacion'];	
	   }
	  if(isset($_POST['icono'])){
	  	$icono = $_POST['icono'];
	  }
	  if (isset($_POST['desarrolador'])) {
	  	$desarrolador = $_POST['desarrolador'];
	  }
	  if (isset($_POST['check'])) {
	  	$cateEnvi = $_POST['check'];
	  }  
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 2 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Tarea 3</title>

		 <!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- personales -->
		<link rel="stylesheet" type="text/css" href="css/css-index.css">
	</head>
	<body>
			<h1 id="titulo">Play Store</h1>
		<div class="container-fluid">
			<div class="row">
				<div class="form-horizontal col-xd-10 col-sm-8 col-md-6  ">

					<div class="form-group ">
						<label class="control-label col-sm-2" for="nombre">Nombre</label>
						<div class="col-sm-10">
						<input type="text" name="nombre"  class="form-control" value="<?php echo $nombre; ?> " >
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="descripcion">Descripcion</label>
						<div class="col-sm-10">
						<input type="text" name="descripcion" class="form-control" value="<?php echo $descripcion; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="publicacion">Fecha de Publicacion</label>
						<div class="col-sm-10">
						<input type="date" name="publicacion"  class="form-control" value="<?php echo $publicacion; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="calificacion">Calificacion Promedio</label>
						<div class="col-sm-10">
						<input type="number" name="calificacion" min="1" max="5" class="form-control" value="<?php echo $calificacion; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="url">URL</label>
						<div class="col-sm-10">
						<input type="text" name="url"  class="form-control" value="<?php echo $url; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="tamanio">Tamaño</label>
						<div class="col-sm-10">
						<input type="text" name="tamanio"  class="form-control" value="<?php echo $tamanio; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="icono">Icono</label>
						<div class="col-sm-10">
						<select name="icono" class="form-control">
							<option></option>
							<?php
							for ($i=1; $i <= $limite ; $i++) {
								if (isset($_POST['icono'])) {
									if (($icono == $i)) {
										echo "<option value='$i' selected='selected'> $iconos[$i] </option>";
									}else{
										echo "<option value='$i' > $iconos[$i] </option>";
									}
								}else{ 
									echo "<option value='$i'> $iconos[$i] </option>";
								}		
							}		
							?>
						</select>
						</div>	
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Categorias</label>
						<div class="col-sm-10">
						<div class="checkbox-inline">
						
						<?php 
							for ($i=0; $i < count($categorias) ; $i++) { 
								echo "<label class='checkbox-inline'>";
								echo "<input type='checkbox' name='check[]' value='$i'".((in_array($i, $cateEnvi))? "checked":"	").">";
							    echo  $categorias[$i]; 
								echo  "</label>";
							}
						 ?>
						 </div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="version"> Version </label>
						<div class="col-sm-10">
						<input type="text" name="version"  class="form-control" value="<?php echo $version; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="actualizacion">Fecha de Actualizacion</label>
						<div class="col-sm-10">
						<input type="date" name="actualizacion"  class="form-control" value="<?php echo $actualizacion; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="desarrolador">Desarrollador</label>
						<div class="col-sm-10">
						<select name="desarrolador" class="form-control">
							<option value="0">---selecciona uno---</option>
							<?php
							while($fila = $base->obtenerRegistro($consultaDes)){
									echo "<option value='".$fila["id"]."'>".$fila["nombre"]." ".$fila["apellido"]."</option>";		
							}		
							?>
						</select>
						</div>
					</div>
					<div class="form-group">        
					      <div class="col-sm-offset-2 col-sm-10">
					        	<button type="submit" name="enviar" class="btn btn-primary">Guardar</button>
								<a href="index.php" class="btn btn-warning">Limpiar</a> 
					      </div>
				    </div>	
				</div>
				<div class="col-xs-2 col-sm-4 col-md-6">
					<?php
						for ($i=1; $i <=6; $i++) { 
						$numEstrellas =rand(2,5);	
						echo "<div class=\"well well-sm col-sm-4\">";
						echo "<img src = \"img/icono$i.png\" class=\"img-responsive\">";
						echo "<b>Aplicacion1</b>";
						echo"<br>";
						echo "<span class=\"label label-primary\">$numEstrellas</span>";
						for ($j=0; $j < $numEstrellas; $j++)
						echo "<span class=\"glyphicon glyphicon-star\" aria-hidden=\"1\"></span>";
						echo "<br>";
						echo "Una muy buena Aplicacion"."<br>";
						echo  $aplicaciones[rand(1,$limite)]->getVersion()."<br>";
						echo "<a href=\"img/icono$i.png\">Descargar</a>";
						echo "</div>";
						}
					?>
				</div>	
			</div>
		</div>		
	</body>
</html>