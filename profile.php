<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">


  <link href="css/style.default.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/semantic/dist/semantic.min.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>
<header>
  <div class="ui menu">
  <a href="index.php"><div class="ui bottom attached button"><i class="home icon"></i> Inicio </div></a>
  <div class="right menu">
    <div class="ui bottom attached button"><i class="remove user icon"></i> Cerrar Sesión </div>
  </div>
</div>
</header>
<body>
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>
<section>
  <div class="leftpanel">
  </div>
    </div>



    <div class="mb30"></div>

      <div class="people-list">
        <div class="row">
          <div class="col-md-6">
            <div class="people-item">
              <div class="media">
                <a href="#" class="pull-left">
                  <img alt="" src="images/photos/user2.png" class="thumbnail media-object">
                </a>
                <div class="media-body">
                  <h4 class="person-name">Toñita</h4>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>paterno</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>materno</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>sexo</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>curp</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>estado</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>municipio</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>colonia</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>calle</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>numero ext</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>numero int</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>cp</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>celular</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>correo</div>
                  <div class="text-muted"><i class="glyphicon-circle-arrow-right"></i>contraseña</div>
                  <ul class="social-list">
                    <li><a href="" class="tooltips" data-toggle="tooltip" data-placement="top" title="Enviar Gafette"><i class="fa fa-envelope-o"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

  </div>
  </div>

</section>


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/toggles.min.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/jquery.cookies.js"></script>


<script src="js/custom.js"></script>
<script>
  jQuery(window).load(function(){

    "use strict";

    var container = document.querySelector('#bloglist');
    var msnry = new Masonry( container, {
      // options
      columnWidth: '.col-xs-6',
      itemSelector: '.col-xs-6'
    });

  });
</script>

</body>
</html>
