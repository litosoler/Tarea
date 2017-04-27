<?php

	class Aplicacion extends Producto{

		private $categoria;
		private $estatus;
		private $version;
		private $fechaActualizacion;
		private $desarrollador;

		public function __construct($nombreProducto,
					$descripcion,
					$fechaPublicacion,
					$calificacionPromedio,
					$comentarios,
					$URLProducto,
					$tamanioArchivo,
					$icono,
					$categoria,
					$estatus,
					$version,
					$fechaActualizacion,
					$desarrollador){
			parent::__construct($nombreProducto,
					$descripcion,
					$fechaPublicacion,
					$calificacionPromedio,
					$comentarios,
					$URLProducto,
					$tamanioArchivo,
					$icono);
			$this->categoria = $categoria;
			$this->estatus = $estatus;
			$this->version = $version;
			$this->fechaActualizacion = $fechaActualizacion;
			$this->desarrollador = $desarrollador;
		}
		public function getCategoria(){
			return $this->categoria;
		}
		public function setCategoria($categoria){
			$this->categoria = $categoria;
		}
		public function getEstatus(){
			return $this->estatus;
		}
		public function setEstatus($estatus){
			$this->estatus = $estatus;
		}
		public function getVersion(){
			return $this->version;
		}
		public function setVersion($version){
			$this->version = $version;
		}
		public function getFechaActualizacion(){
			return $this->fechaActualizacion;
		}
		public function setFechaActualizacion($fechaActualizacion){
			$this->fechaActualizacion = $fechaActualizacion;
		}
		public function getDesarrollador(){
			return $this->desarrollador;
		}
		public function setDesarrollador($desarrollador){
			$this->desarrollador = $desarrollador;
		}
		public function toString(){
			return parent::toString() . " Categoria: " . $this->categoria . 
				" Estatus: " . $this->estatus . 
				" Version: " . $this->version . 
				" FechaActualizacion: " . $this->fechaActualizacion . 
				" Desarrollador: " . $this->desarrollador->toString();
		}

		public function guardarRegistro($conexion){
			$sql = sprintf(
				"INSERT INTO tbl_aplicaciones 
						(
							codigo_aplicacion, codigo_desarrollador,
							 nombre_aplicacion, descripcion,
							  fecha_publicacion, fecha_actualizacion, 
							  version, url, url_icono, calificacion
						) VALUES (
							NULL, '%s', '%s', '%s', '%s', '%s', 
							'%s', '%s', '%s', '%s'
						)",
						stripslashes($this->desarrollador->getNombreUsuario()),//mysqli_magic_quotes, mysqli_real_....
						stripslashes($this->nombreProducto),
						stripslashes($this->descripcion),
						stripslashes($this->fechaPublicacion),
						stripslashes($this->fechaActualizacion),
						stripslashes($this->version),
						stripslashes($this->URLProducto),
						stripslashes($this->icono->getURLImagen()),
						stripslashes($this->calificacionPromedio)
				);
			echo "<br>Instruccion a ejecutar: ".$sql;
			$resultado = $conexion->ejecutarInstruccion($sql);
			if($resultado){
				echo "<b>Registro almacenado con exito</b>";
			}else{
				echo "Error al guardar el registro";
				exit;
			}
			//Es necesario obtener el ultimo ID agregado:
			$resultado = $conexion->ejecutarInstruccion("SELECT last_insert_id() as id;");
			$fila = $conexion->obtenerFila($resultado);

			//Las categorias es un arreglo que contiene los codigos de las categorias que 
			//selecciono el usuario. Por cada categoria tendria
			//que guardar un registro
			if ($fila["id"]>0){
				for ($i=0;$i<count($this->categoria);$i++){
					$sql = sprintf(
						"INSERT INTO tbl_categorias_x_aplicacion(codigo_categoria, 
									codigo_aplicacion) VALUES ('%s','%s')",
						stripslashes($this->categoria[$i]),
						stripslashes($fila["id"])						
					);
					$conexion->ejecutarInstruccion($sql);
				}
			}

			/*$archivo = fopen("../data/aplicaciones.csv","a");
			fwrite(
				$archivo,
				$this->nombreProducto.",".
				$this->descripcion.",".
				$this->fechaPublicacion.",".
				$this->calificacionPromedio.",".
				$this->URLProducto.",".
				$this->tamanioArchivo.",".
				$this->version.",".
				$this->desarrollador->getNombreUsuario().",".
				$this->icono->getURLImagen()."\n"
			);
			fclose($archivo);*/
		}

		public static function Carrousel($conexion,$resultado,$detalles){
			echo
			'<div id="miCarousel" class="carousel slide" data-ride="carousel"> 
				<div class="carousel-inner" role="listbox">
             		
					<div class="item active">
	                    <img src="img/Fondo_active.png" alt="" class="img-responsive">
	                    <div class="carousel-caption">
	                      <h4>Vista previa la aplicacion</h4>
	                    </div>
	                </div>';

	              			while($fila = $conexion->obtenerFila($resultado)){
	              			echo
							'<div class="item">
						        <img src='.$fila['url_imagen'].' alt="">
						        <div class="carousel-caption">
						          <h4>Vista previa</h4>
						       	</div>        
						    </div>';
							}
							$i=0;
							$info = $conexion->obtenerFila($detalles);
							echo "
							<div class='well'>
							</div>
							<div class='container'>
								<div class='container-fluid'>
									nombre de la aplicacion: ".$info["nombre_aplicacion"]."
									<br>descripcion de la app: ".$info["descripcion"]."
									<br>calificacion:"."";
								while($i<$info["calificacion"]){
									echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
									$i++;
								}
								echo "<br>desarrollador:".$info["usuario"]."
									  <br>version:".$info["version"]."
									  <br>fecha de publicacion:".$info["fecha_publicacion"]."
									  <br>fecha de ultima actualizacion:".$info["fecha_actualizacion"]."
								</div>
							</div>	
                </div>
		   </div>";

		   	echo
		   	' <a class="left carousel-control" href="#miCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hiden="true"></a>
              <a class="right carousel-control" href="#miCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hiden="true"></span></a>';
            
           }
	}

	
?>