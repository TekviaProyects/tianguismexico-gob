<?php
session_start();

if (empty($_SESSION['dependencie'])) {
	echo "<script>location.href='signin.php'</script>";	
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="shortcut icon" href="../images/favicon.png" type="image/png">
		<title><?php echo $_SESSION['dependencie']['nombredep'] ?></title>
		<link href="../css/style.default.css" rel="stylesheet">
<!-- /////////////////// ===================				CSS						=================== /////////////////// -->

	<!-- bootstrap -->
		<!-- <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css" type="text/css" /> -->
	<!-- font-awesome -->
		<link rel="stylesheet" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
	<!-- dataTables  -->
		<link rel="stylesheet" href="../plugins/dataTable/css/datatablesboot.min.css">
	    <link rel="stylesheet" href="../plugins/dataTable/css/jquery.dataTables.min.css">
	<!-- Animate -->
		<link href="../plugins/animate.css" rel="stylesheet" />
	<!-- bootstrap-datetimepicker -->
		<link rel="stylesheet" href="../plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
	<!-- sweetalert -->
		<link rel="stylesheet" href="../plugins/sweetalert-master/dist/sweetalert.css" />
	<!-- PDFJs -->
		<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
		
	<!-- Sytem -->
		<link rel="stylesheet" href="../css/signup-form.css" type="text/css" />
		
		<style>
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
			a{
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
				<div class="logopanel" align="center">
					<img src="../images/logo.png" style="max-width: 138px" />
				</div><!-- logopanel -->
				<div class="leftpanelinner">
					<!-- This is only visible to small devices -->
					<div class="visible-xs hidden-sm hidden-md hidden-lg">
						<div class="media userlogged">
							<img alt="" src="../images/photos/loggeduser.png" class="media-object">
							<div class="media-body">
								<h4>Guadalajara</h4>
								<span>"Jalisco"</span>
							</div>
						</div>
						<h5 class="sidebartitle actitle">Account</h5>
						<ul class="nav nav-pills nav-stacked nav-bracket mb30">
							<li>
								<a href="../profile.html"><i class="fa fa-user"></i> <span>Perfil</span></a>
							</li>
							<li>
								<a href=""><i class="fa fa-cog"></i> <span>Configuracion</span></a>
							</li>
							<li>
								<a href=""><i class="fa fa-question-circle"></i> <span>Ayuda</span></a>
							</li>
							<li>
								<a href="signout.html"><i class="fa fa-sign-out"></i> <span>Salir</span></a>
							</li>
						</ul>
					</div>
					<h5 class="sidebartitle">Herramientas-Menu</h5>
					<ul class="nav nav-pills nav-stacked nav-bracket">
						<li>
							<a 
								class="btn-orange btn-block" 
								href="index.php">
								<i class="fa fa-home"></i> <span>Inicio</span>
							</a>
						</li>
						<li class="nav-parent">
							<a 
								class="btn-orange btn-block"
								href="#contenedor"
								onclick="requests.list_requests({
									div: 'contenedor',
									state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
									municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
								})">
								<i class="fa fa-user"></i> <span>Solicitudes</span>
							</a>
							<ul class="children">
								<li>
									<a 
										class="btn-orange btn-block"
										href="#contenedor"
										onclick="requests.list_requests({
											div: 'contenedor',
											status: 1,
											state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
											municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
										})">
										<i class="glyphicon glyphicon-ok"></i> <span>Aceptadas</span></a>
								</li>
								<li>
									<a 
										class="btn-orange btn-block"
										href="#contenedor"
										onclick="requests.list_requests({
											div: 'contenedor',
											status: 2,
											state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
											municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
										})">
										<i class="glyphicon glyphicon-remove-circle"></i> <span>Rechazadas</span></a>
								</li>
							</ul>
						</li>
						<li class="nav-parent">
							<a 
								class="btn-orange btn-block"
								href="#contenedor"
								onclick="requests.list_requests({
									div: 'contenedor',
									status: 1,
									view: 'view_messages',
									state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
									municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
								})">
								<i class="glyphicon glyphicon-info-sign"></i> 
								<span>Mesa de Ayuda</span>
							</a>
							<ul class="children">
								<li>
									<a 
										class="btn-orange btn-block"
										href="#contenedor"
										onclick="help_desk.view_main({
											div: 'contenedor',
											state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
											municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
										})">
										<i class="glyphicon glyphicon-info-sign"></i> 
										<span>Preguntas frecuentes</span>
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a 
								onclick="requests.list_requests({
									div: 'contenedor',
									view: 'list_records',
									state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
									municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
								})"
								class="btn-orange btn-block" 
								href="#contenedodr">
								<i class="fa fa-home"></i> <span>Expedientes</span>
							</a>
						</li>
						<li class="nav-parent">
							<a 
								class="btn-orange btn-block"
								href="#contenedor"
								onclick="admon.list_requests({
									div: 'contenedor',
									id_dependencie: '<?php echo $_SESSION['dependencie']['id'] ?>'
								})">
								<i class="glyphicon glyphicon-info-sign"></i> 
								<span>Soporte tecnico</span>
							</a>
							<ul class="children">
								<li>
									<a 
										class="btn-orange btn-block"
										href="#contenedor"
										onclick="admon.list_questions({
											div: 'contenedor'
										})">
										<i class="glyphicon glyphicon-info-sign"></i> 
										<span>Preguntas frecuentes</span>
									</a>
								</li>
							</ul>
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
									view: 'search_results',
									div: 'div_search_results',
									state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
									municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
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
													<a href=""><img src="../images/photos/user1.png" alt="" /></a>
												</div>
												<div class="desc">
													<h5><a href="">Quiñones</a><span class="badge badge-success">Ver</span></h5>
												</div>
											</li>
											<li class="new">
												<div class="thumb">
													<a href=""><img src="../images/photos/user2.png" alt="" /></a>
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
										<img src="../images/photos/loggeduser.png" alt="" />
										<?php echo $_SESSION['dependencie']['nombredep'] ?>
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu dropdown-menu-usermenu pull-right">
										<li>
											<a href="profile.html"><i class="glyphicon glyphicon-user"></i> Perfil</a>
										</li>
										<li>
											<a 
												onclick="dependencies.view_config({
													div: 'contenedor',
													id: <?php echo $_SESSION['dependencie']['id'] ?>
												})"
												href="#contenedor">
												<i class="glyphicon glyphicon-cog"></i> Configuracion
											</a>
										</li>
										<li>
											<a href="#"><i class="glyphicon glyphicon-question-sign"></i> Ayuda</a>
										</li>
										<li>
											<a href="signin.php"><i class="glyphicon glyphicon-log-out"></i> Salir</a>
										</li>
									</ul>
								</div>
							</li>
							<li></li>
						</ul>
					</div><!-- header-right -->
				</div><!-- headerbar -->
				<div class="pageheader">
					<h2><i class="fa fa-home"></i> Administrador <span>Direccion de licencias.</span></h2>
					<div class="breadcrumb-wrapper">
						<span class="label">Tu estas a qui:</span>
						<ol class="breadcrumb">
							<li>
								<a href="index.php">Inicio</a>
							</li>
							<li>
								Inicio
							</li>
						</ol>
					</div>
				</div>
				<div class="contentpanel" id="contenedor">
					<div class="row">
						<div class="col-sm-6 col-md-3">
							<div
								style="cursor: pointer"
								data-toggle="collapse"
								data-target="#div_fixed"
								class="panel panel-success panel-stat">
								<div class="panel-heading">
									<div class="stat">
										<div class="row">
											<div class="col-xs-4">
												<i class="fa fa-building fa-3x"></i>
											</div>
											<div class="col-xs-8">
												<small class="stat-label">Fijo</small>
												<h1 id="sum_fixed">0</h1>
											</div>
										</div><!-- row -->
										<div class="mb15 collapse" id="div_fixed">
											<div 
												onclick="requests.list_requests({
													estado: 'Fijo',
													div: 'contenedor',
													status: 1,
													state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
													municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
												})" 
												class="panel panel-success">
												<div class="panel-heading">
													<div class="stat">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-check"></i>
															</div>
															<div class="col-xs-8">
																<h3>Aceptadas</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div 
												onclick="requests.list_requests({
													estado: 'Fijo',
													div: 'contenedor',
													status: 2,
													state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
													municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
												})" 
												class="panel panel-success" 
												id="div_fixed">
												<div class="panel-heading">
													<div class="stat">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-times"></i>
															</div>
															<div class="col-xs-8">
																<h3>Rechazadas</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div 
												onclick="requests.list_requests({
													estado: 'Fijo',
													div: 'contenedor',
													state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
													municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
												})" 
												class="panel panel-success" 
												id="div_fixed">
												<div class="panel-heading">
													<div class="stat">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-user"></i>
															</div>
															<div class="col-xs-8">
																<h3>Pendientes</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><!-- stat -->
								</div><!-- panel-heading -->
							</div><!-- panel -->
						</div><!-- col-sm-6 -->
						<div class="col-sm-6 col-md-3">
							<div
								style="cursor: pointer"
								data-toggle="collapse"
								data-target="#div_semi_fixed"
								class="panel panel-primary panel-stat">
								<div class="panel-heading">
									<div class="stat">
										<div class="row">
											<div class="col-xs-4">
												<i class="fa fa-shopping-basket fa-3x"></i>
											</div>
											<div class="col-xs-8">
												<small class="stat-label">Semi-fijo</small>
												<h1 id="sum_semi_fixed">0</h1>
											</div>
										</div><!-- row -->
										<div class="mb15 collapse" id="div_semi_fixed">
											<div 
												onclick="requests.list_requests({
													estado: 'Semi-fijo',
													div: 'contenedor',
													status: 1,
													state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
													municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
												})" 
												class="panel panel-primary">
												<div class="panel-heading">
													<div class="stat">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-check"></i>
															</div>
															<div class="col-xs-8">
																<h3>Aceptadas</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div 
												onclick="requests.list_requests({
													estado: 'Semi-fijo',
													div: 'contenedor',
													status: 2,
													state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
													municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
												})" 
												class="panel panel-primary" 
												id="div_fixed">
												<div class="panel-heading">
													<div class="stat">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-times"></i>
															</div>
															<div class="col-xs-8">
																<h3>Rechazadas</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div 
												onclick="requests.list_requests({
													estado: 'Semi-fijo',
													div: 'contenedor',
													state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
													municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
												})" 
												class="panel panel-primary" 
												id="div_fixed">
												<div class="panel-heading">
													<div class="stat">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-user"></i>
															</div>
															<div class="col-xs-8">
																<h3>Pendientes</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><!-- stat -->
								</div><!-- panel-heading -->
							</div><!-- panel -->
						</div><!-- col-sm-6 -->
						<div class="col-sm-6 col-md-3">
							<div
								style="cursor: pointer"
								data-toggle="collapse"
								data-target="#div_walking"
								class="panel panel-warning panel-stat">
								<div class="panel-heading">
									<div class="stat">
										<div class="row">
											<div class="col-xs-4">
												<i class="fa fa-motorcycle fa-3x"></i>
											</div>
											<div class="col-xs-8">
												<small class="stat-label">Ambulante</small>
												<h1 id="sum_walking">0</h1>
											</div>
										</div><!-- row -->
										<div class="mb15 collapse" id="div_walking">
											<div 
												onclick="requests.list_requests({
													estado: 'Ambulante',
													div: 'contenedor',
													status: 1,
													state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
													municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
												})" 
												class="panel panel-success">
												<div class="panel-heading">
													<div class="stat">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-check"></i>
															</div>
															<div class="col-xs-8">
																<h3>Aceptadas</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div 
												onclick="requests.list_requests({
													estado: 'Ambulante',
													div: 'contenedor',
													status: 2,
													state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
													municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
												})" 
												class="panel panel-success" 
												id="div_fixed">
												<div class="panel-heading">
													<div class="stat">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-times"></i>
															</div>
															<div class="col-xs-8">
																<h3>Rechazadas</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div 
												onclick="requests.list_requests({
													estado: 'Ambulante',
													div: 'contenedor',
													state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
													municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
												})" 
												class="panel panel-success" 
												id="div_fixed">
												<div class="panel-heading">
													<div class="stat">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-user"></i>
															</div>
															<div class="col-xs-8">
																<h3>Pendientes</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><!-- stat -->
								</div><!-- panel-heading -->
							</div><!-- panel -->
						</div><!-- col-sm-6 -->
					</div><!-- row -->
				</div><!-- contentpanel -->
			</div><!-- mainpanel -->
		</section>
		
		<script src="../plugins/jquery-1.11.2.min.js"></script>
		<script src="../js/jquery-migrate-1.2.1.min.js"></script>
		<script src="../js/jquery-ui-1.10.3.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/modernizr.min.js"></script>
		<script src="../js/jquery.sparkline.min.js"></script>
		<script src="../js/toggles.min.js"></script>
		<script src="../js/retina.min.js"></script>
		<script src="../js/jquery.cookies.js"></script>
		
		<script src="../js/flot/jquery.flot.min.js"></script>
		<script src="../js/flot/jquery.flot.resize.min.js"></script>
		<script src="../js/flot/jquery.flot.spline.min.js"></script>
		<script src="../js/morris.min.js"></script>
		<script src="../js/raphael-2.1.0.min.js"></script>
		
		<script src="../js/custom.js"></script>
		<script src="../js/dashboard.js"></script>
		
<!-- /////////////////// ===================				JS						=================== /////////////////// -->

	<!-- dataTables  -->
		<script src="../plugins/dataTable/js/datatables.min.js"></script>
		<script src="../plugins/dataTable/js/dataTables.bootstrap.min.js"></script>
	    <script src="../plugins/export_print/dataTables.buttons.min.js"></script>
	    <script src="../plugins/export_print/buttons.html5.min.js"></script>
	    <script src="../plugins/export_print/buttons.print.min.js"></script>
	    <script src="../plugins/export_print/jszip.min.js"></script>
	<!-- sweetalert -->
		<script type="text/javascript" src="../plugins/sweetalert-master/dist/sweetalert.min.js"></script>
	<!-- validate -->
		<script src="../plugins/jquery.validate.min.js"></script>
		<script src="../plugins/register.js"></script>
	<!-- Date-time Peaker -->
		<script type="text/javascript" src="../plugins/moment/moment.js"></script>
		<script type="text/javascript" src="../plugins/transition.js"></script>
		<script type="text/javascript" src="../plugins/collapse.js"></script>
		<script type="text/javascript" src="../plugins/bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
	<!-- html2canvas -->
		<script type="text/javascript" src="../plugins/html2canvas.min.js"></script>
	<!-- jsPDF -->
		<script type="text/javascript" src="../plugins/jsPDF-1.3.2/dist/jspdf.min.js"></script>
	<!-- pdf.js -->
		<!-- <script src="../plugins/pdfjs/build/pdf.js"></script> -->
		
	<!-- System -->
		<script src="../js_system/requests.js"></script>
		<script src="../js_system/help_desk.js"></script>
		<script src="../js_system/admon.js"></script>
		<script src="../js_system/dependencies.js"></script>
		
<!-- /////////////////// ===================			END JS						=================== /////////////////// -->
		
		<script>
			requests.main_requests({
				state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
				municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
			});
		</script>
	</body>
</html>