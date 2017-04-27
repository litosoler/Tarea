<?php
	include_once("class/class_conexion.php");
	include_once("class/class_categoria.php");
	include_once("class/class_producto.php");
	include_once("class/class_aplicacion.php");
	include_once("class/class_icono.php");
	include_once("class/class_usuario.php");
	include_once("class/class_desarrollador.php");
	include_once("class/class_comentario.php");
	$conexion = new Conexion();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tarea 5</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">Brand</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Link</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a id="btn-accion" href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li>
	      </ul>
	      <form class="navbar-form navbar-left">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">Link</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>


	<div class="alert alert-success" role="alert" id= "resultado">
		<!-- Imprimir en esta seccion las verificaciones.-->
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<!--- INICIO DEL FORMULARIO -->
			
				<table class = "table table-striped table-hover">
					<tr>
						<td>Nombre aplicación:</td>
						<td>
							<input type="text" name="" id="txt-aplicacion" class="form-control">
						</td>
					</tr>
					<tr>
						<td>Descripción:</td>
						<td>
							<input type="text" name="" id="txt-descripcion" class="form-control">
						</td>
					</tr>
					<tr>
						<td>Fecha de publicación:</td>
						<td>
							<input type="date" name="dte-fecha-publicacion" id="dte-fecha-publicacion"  step="1" min="01-01-1900" max="31-31-2099" value="2016-11-04" class="date form-control">
						</td>
					</tr>
					<tr>
						<td>Calificación promedio:</td>
						<td>
							<input type="text" name="" id="txt-calificacion" class="form-control">
						</td>
					</tr>
					<tr>
						<td>URL:</td>
						<td>
							<input type="text" name="" id="txt-url" class="form-control">
						</td>

					</tr>
					<tr>
						<td>Tamaño archivo:</td>
						<td>
							<input type="text" name="" id="txt-tamanio" class="form-control">
						</td>

					</tr>
					<tr>
						<td>Icono:</td>
						<td>
							<select name="" id="slc-icono" class="form-control">
								<?php 
									icono::cmbIconos($conexion);
								?>			
							</select>
						</td>
					</tr>
					<tr>
					
						<td>Categorias:</td>
						<td>
							<?php
								Categoria::generarCheckboxesCategoria($conexion);
							?>
						</td>
					</tr>
					<tr>
						<td>Version:</td>
						<td>
							<input type="text" name="" id="txt-version" class="form-control">
						</td>
					</tr>
					<tr>
						<td>Fecha de actualización:</td>
						<td>
							<input type="date" name="dte-fecha-actualizacion" id="dte-fecha-actualizacion" step="1" min="01-01-1900" max="31-31-2099" value="<?php echo date('Y-m-d');?>" class="form form-control">

						</td>
					</tr>
					<tr>
						<td>Desarrollador:</td>
						<td>
							<?php 
								Desarrollador::generarListaDesarrolladores($conexion);
							?>								
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<button id="btn-guardar" class="btn btn-primary">
								Guardar
							</button>
							<button id="btn-limpiar" class="btn btn-warning">
								Limpiar
							</button>
						</td>
					</tr>
				</table>
				<!--- FIN DEL FORMULARIO -->
			</div>
			<!--Listado de las aplicaciones-->
			<div class="col-lg-6">
				<div class="row" id="div-lista-aplicaciones">
					
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<hr>
	
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/controlador.js"></script>
</body>
</html>