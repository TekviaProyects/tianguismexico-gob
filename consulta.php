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
  <a href="mAyuda.php"><div class="ui bottom attached button"><i class="home icon"></i> Regresar </div></a>
  <div class="right menu">
    <div class="ui bottom attached button"><i class="remove user icon"></i> Cerrar Sesión </div>
  </div>
</div>
</header>

<body>
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>


<section>

  <div class="leftpanel">



  </div><!-- leftpanel -->





      <!-- header-right -->

    </div><!-- headerbar -->



    <div class="contentpanel">

      <div class="row">

        <div class="col-md-6">
          <form id="basicForm" action="form-validation.html" class="form-horizontal">
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="" class="panel-close">&times;</a>
                  <a href="" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">Nueva Consulta</h4>
                <p>Pagos, Facturacion y Tramites Administrativos</p>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Consulta <span class="asterisk">*</span></label>
                  <div class="col-sm-9">
                    <textarea rows="5" class="form-control" placeholder="Describe tu problema lo mas claro posible..." required></textarea>
                  </div>
                </div>
              </div><!-- panel-body -->
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary">Enviar</button>
                    <button type="reset" class="btn btn-default">Borrar</button>
                  </div>
                </div>
              </div>

  </div><!-- mainpanel -->


    <!-- Nav tabs -->


    <!-- Tab panes -->
    <!-- tab-content -->
  </div><!-- rightpanel -->

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
