<?php
session_start();

if (empty($_SESSION['user'])) {
	echo "<script>location.href='index.php'</script>";	
}

?>
<!DOCTYPE html>
<html lang="en" id="all">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="images/favicon.png" type="image/png">
		<title><?php echo $_SESSION['user']['nombre'] ?></title>
		<link href="css/style.default.css" rel="stylesheet">
<!-- /////////////////// ===================				CSS						=================== /////////////////// -->

	<!-- bootstrap -->
		<!-- <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css" type="text/css" /> -->
	<!-- font-awesome -->
		<link rel="stylesheet" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
	<!-- dataTables  -->
		<link rel="stylesheet" href="plugins/dataTable/css/datatablesboot.min.css">
	    <link rel="stylesheet" href="plugins/dataTable/css/jquery.dataTables.min.css">
	<!-- Animate -->
		<link href="plugins/animate.css" rel="stylesheet" />
	<!-- bootstrap-datetimepicker -->
		<link rel="stylesheet" href="plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
	<!-- sweetalert -->
		<link rel="stylesheet" href="plugins/sweetalert-master/dist/sweetalert.css" />
		
	<!-- Sytem -->
		<link rel="stylesheet" href="css/signup-form.css" type="text/css" />
		
		<style>
			a {
				color: white !important;
			}
			a:hover {
				background-color: orange !important;
			}
			ul li:hover {
				border-left: solid 2px orange !important;
			}
			.personalize_scroll::-webkit-scrollbar {
				width: 12px;
				background-color: #F5F5F5;
			}
			.personalize_scroll::-webkit-scrollbar-thumb {
				border-radius: 10px;
				-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
				background-color: #FCF8E3;
			}
			@media only screen and (max-device-width: 736px) {
				.personalize_scroll::-webkit-scrollbar {
					width: 0px;
					background-color: #F5F5F5;
				}
				.personalize_scroll::-webkit-scrollbar-thumb {
					border-radius: 0px;
					-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
					background-color: #FCF8E3;
				}
			}
			.nav-tabs > li > a{
				color: orange !important;
			}
			.nav-tabs > li > a:hover{
				background-color: grey !important;
			}a{
				color: white !important;
				
			}
			a:hover { 
				background-color: orange !important;
			}
			.nav-parent, .nav-active {
				background-color: orange !important;
			}
			.nav-bracket > li.nav-active > a{
				background-color: orange !important;
			}
		</style>
		
<!-- /////////////////// ===================			END CSS						=================== /////////////////// -->
		
	</head>
	<body>
		<div id="preloader">
			<div id="status">
				<i class="fa fa-spinner fa-spin"></i>
			</div>
		</div>
		<section>
			<div class="leftpanel">
				<div class="logopanel" align="center" onclick="window.location='panel.php'" style="cursor: pointer">
					<img src="images/logo.png" style="max-width: 138px" />
				</div><!-- logopanel -->
				<div class="leftpanelinner">
					<!-- This is only visible to small devices -->
					<div class="visible-xs hidden-sm hidden-md hidden-lg">
						<div class="media userlogged">
							<img alt="" src="images/photos/loggeduser.png" class="media-object">
							<div class="media-body">
								<h4>Guadalajara</h4>
								<span>"Jalisco"</span>
							</div>
						</div>
						<h5 class="sidebartitle actitle">Cuenta</h5>
						<ul class="nav nav-pills nav-stacked nav-bracket mb30">
							<li>
								<a href="profile.html"><i class="fa fa-user"></i> <span>Perfil</span></a>
							</li>
							<li>
								<a href=""><i class="fa fa-cog"></i> <span>Configuracion</span></a>
							</li>
							<li>
								<a href=""><i class="fa fa-question-circle"></i> <span>Ayuda</span></a>
							</li>
							<li>
								<a href="index.php"><i class="fa fa-sign-out"></i> <span>Salir</span></a>
							</li>
						</ul>
					</div>
					<h5 class="sidebartitle">Herramientas-Menu</h5>
					<ul class="nav nav-pills nav-stacked nav-bracket">
						<li>
							<a
								href="panel.php"
							 	class="btn-orange btn-block" 
							 	href="panel.php">
							 	<i class="fa fa-home"></i> <span>Inicio</span>
							</a>
						</li>
						<li>
							<a
								id="btn_new_request"
								href="#contenedor"
							 	class="btn-orange btn-block"
								onclick="requests.new_request({
									div: 'contenedor',
									view: 'list_user_requests',
									from_user: 1
								})">
								<i class="fa fa-plus" aria-hidden="true"></i>
								<span>Nueva solicitud</span>
							</a>
						</li>
						<li>
							<a
								href="#contenedor"
							 	class="btn-orange btn-block"
								onclick="requests.list_requests({
									div: 'contenedor',
									view: 'list_user_requests',
									mail: '<?php echo $_SESSION['user']['correo'] ?>',
									from_user: 1
								})">
								<i class="fa fa-address-card" aria-hidden="true"></i>
								<span>Estado de solicitudes</span>
							</a>
						</li>
						<li>
							<a
								href="#contenedor"
							 	class="btn-orange btn-block" 
								onclick="help_desk.view_user_main({
									div: 'contenedor',
									mail: '<?php echo $_SESSION['user']['correo'] ?>',
									from_user: 1
								})">
								<i class="glyphicon glyphicon-info-sign"></i> 
								<span>Atencion a quejas</span>
							</a>
						</li>
						<li>
							<a
								href="#contenedor"
							 	class="btn-orange btn-block"
								onclick="requests.list_requests({
									div: 'contenedor',
									status: 1,
									mail: '<?php echo $_SESSION['user']['correo'] ?>',
									view: 'list_transfer_rights',
									from_user: 1
								})">
								<i class="fa fa-archive" aria-hidden="true"></i> <span>Cesión de derechos</span>
							</a>
						</li>
						<li>
							<a
								href="#contenedor"
							 	class="btn-orange btn-block"
								href="#contenedor"
								onclick="requests.list_requests({
									div: 'contenedor',
									status: 2,
									mail: '<?php echo $_SESSION['user']['correo'] ?>',
									view: 'list_user_requests',
									from_user: 1
								})">
								<i class="fa fa-address-card" aria-hidden="true"></i>
								<span>Carta de registro en padron de tianguis</span>
							</a>
						</li>
						<li>
							<a
								href="#contenedor"
							 	class="btn-orange btn-block">
								<i class="fa fa-shopping-basket" aria-hidden="true"></i>
								<span>Modificacion al padron de comerciantes de tianguis</span>
							</a>
						</li>
						<li>
							<a
								href="#contenedor"
							 	class="btn-orange btn-block" >
								<i class="fa fa-lock" aria-hidden="true"></i>
								<span>Permiso por ausencia</span>
							</a>
						</li>
						<li>
							<a
								href="#contenedor"
							 	class="btn-orange btn-block" >
								<i class="fa fa-user-times" aria-hidden="true"></i>
								<span>Suplencias en tianguis</span>
							</a>
						</li>
						<li>
							<a
								href="#contenedor"
							 	class="btn-orange btn-block" >
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<span>Asignacion de espacio en tianguis</span>
							</a>
						</li>
						<li>
							<a 
								onclick="users.view_profile({
									div: 'contenedor',
									mail: '<?php echo $_SESSION['user']['correo'] ?>',
									from_user: 1
								})" 
								href="#contenedor"
							 	class="btn-orange btn-block" >
								<i class="fa fa-user" aria-hidden="true"></i>
								<span>Perfil unico</span>
							</a>
						</li>
						<li class="nav-parent">
							<a 
								style="cursor: pointer"
								class="btn-orange btn-block">
								<i class="fa fa-book"></i> 
								<span>Manuales</span>
							</a>
							<ul class="children">
								<li>
									<a 
										class="btn-orange btn-block"
										href="#contenedor">
										<i class="fa fa-book"></i> 
										<span>Manual de limpieza</span>
									</a>
								</li>
								<li>
									<a 
										class="btn-orange btn-block"
										href="#contenedor">
										<i class="fa fa-book"></i> 
										<span>Manual de imagen urbana</span>
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a
								onclick="users.view_insurance_policy({
									div: 'contenedor',
									mail: '<?php echo $_SESSION['user']['correo'] ?>',
									from_user: 1
								})" 
								href="#contenedor"
							 	class="btn-orange btn-block" >
								<i class="fa fa-shield" aria-hidden="true"></i>
								<span>Poliza de seguro</span>
							</a>
						</li>
						<li>
							<a
								href="#contenedor"
							 	class="btn-orange btn-block" >
								<i class="fa fa-cutlery" aria-hidden="true"></i>
								<span>Constancia de manejo de alimentos</span>
							</a>
						</li>
					</ul>
				</div><!-- leftpanelinner -->
			</div><!-- leftpanel -->
			<div class="mainpanel">
				<div class="headerbar">
					<a class="menutoggle"><i class="fa fa-bars"></i></a>
					<div class="searchform" action="#" method="post">
						<input 
							onchange="if($(this).val().length > 0){
								requests.list_requests({
									search: $(this).val(),
									from_user: 1,
									view: 'search_user_results',
									div: 'div_search_results',
									mail: '<?php echo $_SESSION['user']['correo'] ?>',
								});
							} else{
								$('#div_search_results').html('');
								$('#search_expedients').focus();
							}"
							id="search_expedients"
							type="search" 
							class="form-control" 
							name="keyword" 
							placeholder="Buscar Expedientes..." /><br>
						<div id="div_search_results"></div>
					</div>
					<div class="header-right">
						<ul class="headermenu">
							<li>
								<div class="btn-group">
									<button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
										<i class="glyphicon glyphicon-user"></i>
										<span class="badge">2</span>
									</button>
									<div class="dropdown-menu dropdown-menu-head pull-right">
										<h5 class="title">Nuevas Solicitudes</h5>
										<ul class="dropdown-list user-list">
											<li class="new">
												<div class="thumb">
													<a href=""><img src="images/photos/user1.png" alt="" /></a>
												</div>
												<div class="desc">
													<h5><a href="">Quiñones</a><span class="badge badge-success">Ver</span></h5>
												</div>
											</li>
											<li class="new">
												<div class="thumb">
													<a href=""><img src="images/photos/user2.png" alt="" /></a>
												</div>
												<div class="desc">
													<h5><a href="">Jorge</a><span class="badge badge-success">Ver</span></h5>
												</div>
											</li>
											<li class="new">
												<a href="">Ver Todas</a>
											</li>
										</ul>
									</div>
								</div>
							</li>
							<li></li>
							<li>
								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
										<img 
											src="users_files/<?php echo $_SESSION['user']['id'] ?>/perfil.png" 
											onerror="this.src='images/photos/loggeduser.png'; />
										
										<?php echo $_SESSION['user']['nombre'] ?>
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu dropdown-menu-usermenu pull-right">
										<li>
											<a 
												onclick="users.view_profile({
													div: 'contenedor',
													mail: '<?php echo $_SESSION['user']['correo'] ?>',
													from_user: 1
												})" 
												href="#contenedor">
												<i class="glyphicon glyphicon-user"></i> Perfil
											</a>
										</li>
										<li>
											<a href="#"><i class="glyphicon glyphicon-cog"></i> Configuracion</a>
										</li>
										<li>
											<a 
												onclick="help_desk.view_user_main({
													div: 'contenedor',
													mail: '<?php echo $_SESSION['user']['correo'] ?>',
													from_user: 1
												})" 
												href="#contenedor">
												<i class="glyphicon glyphicon-question-sign"></i> 
												Ayuda
											</a>
										</li>
										<li>
											<a href="index.php"><i class="glyphicon glyphicon-log-out"></i> Salir</a>
										</li>
									</ul>
								</div>
							</li>
							<li></li>
						</ul>
					</div><!-- header-right -->
				</div><!-- headerbar -->
				<div class="pageheader">
					<h2><i class="fa fa-home"></i> Usuario <span>Panel de solicitudes.</span></h2>
					<div class="breadcrumb-wrapper">
						<span class="label">Tu estas a qui:</span>
						<ol class="breadcrumb">
							<li>
								<a href="index.php">Inicio</a>
							</li>
							<li class="active">
								Inicio
							</li>
						</ol>
					</div>
				</div>
				<div class="contentpanel" id="contenedor">
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div 
								onclick="requests.list_requests({
									div: 'contenedor',
									status: 1,
									mail: '<?php echo $_SESSION['user']['correo'] ?>',
									view: 'list_user_requests',
									from_user: 1
								})" 
								style="cursor: pointer" 
								class="panel panel-success panel-stat">
								<div class="panel-heading">
									<div class="stat">
										<div class="row">
											<div class="col-xs-4">
												<i class="fa fa-check fa-3x"></i>
											</div>
											<div class="col-xs-8">
												<small class="stat-label">Aceptadas</small>
												<h1 id="sum_aceppted">0</h1>
											</div>
										</div><!-- row -->
										<div class="mb15"></div>
									</div><!-- stat -->
								</div><!-- panel-heading -->
							</div><!-- panel -->
						</div><!-- col-sm-6 -->
						<div class="col-sm-6 col-md-3">
							<div 
								onclick="requests.list_requests({
									div: 'contenedor',
									status: 2,
									mail: '<?php echo $_SESSION['user']['correo'] ?>',
									view: 'list_user_requests',
									from_user: 1
								})" 
								style="cursor: pointer" 
								class="panel panel-danger panel-stat">
								<div class="panel-heading">
									<div class="stat">
										<div class="row">
											<div class="col-xs-4">
												<i class="fa fa-times fa-3x"></i>
											</div>
											<div class="col-xs-8">
												<small class="stat-label">Rechazadas</small>
												<h1 id="sum_rejected">0</h1>
											</div>
										</div><!-- row -->
										<div class="mb15"></div>
									</div><!-- stat -->
								</div><!-- panel-heading -->
							</div><!-- panel -->
						</div><!-- col-sm-6 -->
						<div class="col-sm-6 col-md-3">
							<div
								onclick="requests.list_requests({
									div: 'contenedor',
									mail: '<?php echo $_SESSION['user']['correo'] ?>',
									view: 'list_user_requests',
									from_user: 1
								})" 
								style="cursor: pointer" 
								class="panel panel-primary panel-stat">
								<div class="panel-heading">
									<div class="stat">
										<div class="row">
											<div class="col-xs-4">
												<i class="fa fa-user fa-3x"></i>
											</div>
											<div class="col-xs-8">
												<small class="stat-label">Pendientes</small>
												<h1 id="sum_requests">0</h1>
											</div>
										</div><!-- row -->
										<div class="mb15"></div>
									</div><!-- stat -->
								</div><!-- panel-heading -->
							</div><!-- panel -->
						</div><!-- col-sm-6 -->
					</div><!-- row -->
				</div><!-- contentpanel -->
			</div><!-- mainpanel -->
		</section>
		
		<script src="plugins/jquery-1.11.2.min.js"></script>
		<script src="js/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/jquery-ui-1.10.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/modernizr.min.js"></script>
		<script src="js/jquery.sparkline.min.js"></script>
		<script src="js/toggles.min.js"></script>
		<script src="js/retina.min.js"></script>
		<script src="js/jquery.cookies.js"></script>
		
		<script src="js/flot/jquery.flot.min.js"></script>
		<script src="js/flot/jquery.flot.resize.min.js"></script>
		<script src="js/flot/jquery.flot.spline.min.js"></script>
		<script src="js/morris.min.js"></script>
		<script src="js/raphael-2.1.0.min.js"></script>
		
		<script src="js/custom.js"></script>
		<script src="js/dashboard.js"></script>
		
<!-- /////////////////// ===================				JS						=================== /////////////////// -->
	<!-- dataTables  -->
		<script src="plugins/dataTable/js/datatables.min.js"></script>
		<script src="plugins/dataTable/js/dataTables.bootstrap.min.js"></script>
	    <script src="plugins/export_print/dataTables.buttons.min.js"></script>
	    <script src="plugins/export_print/buttons.html5.min.js"></script>
	    <script src="plugins/export_print/buttons.print.min.js"></script>
	    <script src="plugins/export_print/jszip.min.js"></script>
	<!-- sweetalert -->
		<script type="text/javascript" src="plugins/sweetalert-master/dist/sweetalert.min.js"></script>
	<!-- validate -->
		<script src="plugins/jquery.validate.min.js"></script>
		<script src="plugins/register.js"></script>
	<!-- Date-time Peaker -->
		<script type="text/javascript" src="plugins/moment/moment.js"></script>
		<script type="text/javascript" src="plugins/transition.js"></script>
		<script type="text/javascript" src="plugins/collapse.js"></script>
		<script type="text/javascript" src="plugins/bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
	<!-- html2canvas -->
		<script type="text/javascript" src="plugins/html2canvas.min.js"></script>
	<!-- jsPDF -->
		<script type="text/javascript" src="plugins/jsPDF-1.3.2/dist/jspdf.min.js"></script>
	<!-- notify -->
		<script type="text/javascript" src="plugins/notify.js"></script>
	<!-- PDFJs -->
		<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
		
	<!-- System -->
		<script src="js_system/requests.js"></script>
		<script src="js_system/help_desk.js"></script>
		<script src="js_system/users.js"></script>
		
<!-- /////////////////// ===================			END JS						=================== /////////////////// -->
		
		<script>
			requests.main_user_requests({
				mail: '<?php echo $_SESSION['user']['correo'] ?>'
			});
		</script>
	</body>
</html>