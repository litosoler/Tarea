<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="img/favicon.png">

    <title>Facebook</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/facebook.css" rel="stylesheet">
    


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Feizbuk</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" id="txt-email" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" id="txt-pass" placeholder="Password" class="form-control">
            </div>
            <button type="button" id="btn-ingresar" class="btn btn-primary">Iniciar sesión</button>
            <button type="button" data-toggle="modal" data-target="#registroUsuariosModal" class="btn btn-primary" title="Registrar"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <div id="div-alert" class="colspan 12">
          <!--imprime alert de cuenta existente-->
        </div>
        <h1>Feizbuk</h1>
        <p>Esta es una plantilla básica para el exámen práctico. Quizá se darán cuenta que para grandes cosas se tiene que saber también lo básico.</p>
        <p>
          <a class="btn btn-primary btn-lg" href="docs/ExamenPracticoUnidadII.pdf" role="button" target="_blank">Ver enunciado</a>&nbsp;&nbsp;
          <a class="btn btn-primary btn-lg" href="#" id="btn-tengo-hambre" role="button">Muero de hambre</a>&nbsp;&nbsp;
          <a class="btn btn-primary btn-lg" href="#" id="btn-ir-banio" role="button">Quiero ir al baño</a>
        </p>
      </div>
    </div>

  <div class="container">
      <!-- Example row of columns -->
    <div class="row ">

      <div class="col-md-6">
          <hr><h2>¿Quien soy?</h2><hr>
          <div id="div-txt">
              <!--aqui van los txt-->
          </div>

          <p>Elija el perfil que representa actualmente. </p>
          <div id="div-usuarios" class="rowglyphicon-thumbs-up">
              <!--aqui van todos los usuarios-->
          </div>
      </div>
        <div class="col-md-6">
          <hr><h2>Mis Aleros</h2><hr>
          <p>Este es el listado de mis amigos</p>
          <div id="div-amigos" class="rowglyphicon-thumbs-up">
              <!-- Esta es la lista de los aleros -->
          </div>
        </div> 

      </div>

       <div class="col-md-6 ">
          <hr><h2>Seleccionar nuevos amigos</h2><hr>
          <p>Este es el listado de las personas que aun no son tus amigos</p>
          <div id="div-no-amigos" class="rowglyphicon-thumbs-up">
              <!-- Esta es la lista de los que no son aleros -->
          </div>
       </div> 

    </div>
  </div>

<!--Ventana Modal de registro de usuarios-->
<div class="modal fade" id="registroUsuariosModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registro de usuarios</h4>
      </div>
      <div class="modal-body">
          <!--Formulario de registro-->
          <input type="text" name="txt-usuario" id="txt-usuario" class="form-control" placeholder="Usuario"><br>
          <input type="text" name="txt-correo" id="txt-correo" class="form-control" placeholder="Correo"><br>
          <input type="password" name="txt-contrasena" id="txt-contrasena" class="form-control" placeholder="Contraseña"><br>
          <select id="slc-url-imagen" class="form-control" placeholder="Imagen">
            <option selected="selected"></option>
            <option value="img/profile-pics/roshi.jpg">img/profile-pics/roshi.jpg</option>
            <option value="img/profile-pics/shenlong.jpg">img/profile-pics/shenlong.jpg</option>
            <option value="img/profile-pics/taopaipai.jpg">img/profile-pics/taopaipai.jpg</option>
            <option value="img/profile-pics/trunks.jpg">img/profile-pics/trunks.jpg</option>
            <option value="img/profile-pics/uub.jpg">img/profile-pics/uub.jpg</option>
            <option value="img/profile-pics/videl.jpg">img/profile-pics/videl.jpg</option>
            <option value="img/profile-pics/zarbon.jpg">img/profile-pics/zarbon.jpg</option>
          </select>


          <!--Fin Formulario de registro-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btn-guardar-usuario" data-dismiss="modal">Guardar</button>
      </div>
    </div>
  </div>
</div>


      <hr>
      <div class="container">
        <div class="row">
          <div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 ">
            <div class="well">
              <img id="img-loading" src="img/loading.gif" style="display: none">
            </div>
          </div>
        </div>
      </div>
      <footer>
        <hr>
        <p>&copy; 2016 Feizbuk, Inc. Programación Orientada a Objetos, Exámen práctico Unidad II, UNAH. Catedrático Erick Marín. </p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/controlador.js"></script>
  </body>
</html>
