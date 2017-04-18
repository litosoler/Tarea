<?php
	include_once("class/arreglos.php");

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
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Tarea 2</title>
	</head>
	<body>

		<div class="container-fluid" style="background-color: #7DCCE0; padding-bottom: 15px; border-bottom: 1px solid #5D5E62">
			<h2> Datos: </h2>
			<div class="row">
				<div class="col-md-3"> 
					<label>Nombre: </label>
					<span><?php echo $nombre;?></span>
					<br>
					<label>Calificacion: </label>
					<span><?php echo $calificacion;?></span>
					<br>
					<label>Icono: </label>
					<span> <?php echo $icono;?></span>
					<br>
					<label>Desarrollador: </label>
					<span>
					<?php 
						echo ($desarrolador != 0)? $desarrolladores[$desarrolador]: "";
					 ?>
				    </span>
				</div>
				<div class="col-md-2"> 
					<label> Descripcion:  </label>
					<span><?php echo $descripcion;?></span>
					<br>
					<label>URL: </label>
					<span><?php echo $url;?></span>
					<br>
					<label>Version: </label>
					<span><?php echo $version;?></span>	
				</div>
				<div class="col-md-2"> 
					<label> Publicado:  </label>
					<span><?php echo $publicacion;?></span>
					<br>
					<label>Tamaño: </label>
					<span><?php echo $tamanio;?></span>
					<br>
					<label> Actualizacion:  </label>
					<span><?php echo $actualizacion;?></span>
				</div>
				<div class="col-sm-5">
					<label> Categorias: </label>
					<br>
					<span>
					<?php
						for ($i=0; $i < count($cateEnvi) ; $i++) { 
							echo $categorias[$cateEnvi[$i]]."; ";
						}
					?>
					</span>
				</div>

			</div>
		</div>
	
		<div class="container-fluid">
			<h1>Play Store</h1>
			<div class="row">
				<form class="form-horizontal col-xd-10 col-sm-8 col-md-6  "  action="index.php" method="post" >

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
							<option></option>
							<?php
							for ($i=1; $i <= $limite ; $i++) {
								if (isset($_POST['desarrolador'])) {
									if (($desarrolador == $i)) {
										echo "<option value='$i' selected='selected'> $desarrolladores[$i] </option>";
									}else{
										echo "<option value='$i' > $desarrolladores[$i] </option>";
									}
								}else{ 
									echo "<option value='$i'> $desarrolladores[$i] </option>";
								}		
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
				</form>
				<div class="col-xs-2 col-sm-4 col-md-6">
					<?php
						for ($i=2; $i <=7; $i++) { 
						$numEstrellas =rand(2,5);	
						echo "<div class=\"well well-sm col-sm-1\">";
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