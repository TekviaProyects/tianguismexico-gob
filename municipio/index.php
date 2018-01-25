<?php
session_start();
	if (empty($_SESSION['dependencie'])) {
		echo "<script>location.href='signin.php'</script>";
	}

?>
<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
	<!-- fullcalendar -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.css" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		
	<!-- font-awesome -->
		<link rel="stylesheet" href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
	<!-- dataTables  -->
	    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.16/b-1.5.1/datatables.min.css"/>
	<!-- Animate -->
		<link href="../plugins/animate.css" rel="stylesheet" />
	<!-- bootstrap-datetimepicker -->
		<link rel="stylesheet" href="../plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
	<!-- sweetalert -->
		<link rel="stylesheet" href="../plugins/sweetalert-master/dist/sweetalert.css" />
		
		<style>
			.vuela{
				position: sticky;
			    right: 0px;
			    top: 0px;
			    z-index: 1;
			    width: 100%;
			}
			#wrapper {
				padding-left: 0;
				-webkit-transition: all 0.5s ease;
				-moz-transition: all 0.5s ease;
				-o-transition: all 0.5s ease;
				transition: all 0.5s ease;
			}
			#wrapper.toggled {
				padding-left: 250px;
			}
			#sidebar-wrapper {
				z-index: 1000;
				position: fixed;
				left: 250px;
				width: 0;
				height: 100%;
				margin-left: -250px;
				/*overflow-y: scroll;*/
				overflow-x: hidden;
				background: #000;
				-webkit-transition: all 0.5s ease;
				-moz-transition: all 0.5s ease;
				-o-transition: all 0.5s ease;
				transition: all 0.5s ease;
			}
			#wrapper.toggled #sidebar-wrapper {
				width: 250px;
			}
			#contenedor {
				width: 100%;
				position: absolute;
				padding: 15px;
			}
			#wrapper.toggled #contenedor {
				position: absolute;
				margin-right: -250px;
			}
			/* Sidebar Styles */
			.sidebar-nav {
				/*position: absolute;*/
				top: 0;
				width: 250px;
				margin: 0;
				padding: 0;
				list-style: none;
			}
			.sidebar-nav li {
				text-indent: 5px;
				line-height: 40px;
			}
			.sidebar-nav li a {
				line-height: 200%;
				display: block;
				text-decoration: none;
				color: #999999;
			}
			.sidebar-nav li a:hover {
				text-decoration: none;
				color: #fff;
				background: rgba(255, 255, 255, 0.2);
			}
			.sidebar-nav li a:active, .sidebar-nav li a:focus {
				text-decoration: none;
			}
			.sidebar-nav > .sidebar-brand {
				height: 65px;
				font-size: 1px;
				line-height: 60px;
			}
			.sidebar-nav > .sidebar-brand a {
				color: #999999;
			}
			.sidebar-nav > .sidebar-brand a:hover {
				color: #fff;
				background: none;
			}
			@media (min-width: 768px) {
				#wrapper {
					padding-left: 250px;
				}
				#wrapper.toggled {
					padding-left: 0;
				}
				#sidebar-wrapper {
					width: 250px;
				}
				#wrapper.toggled #sidebar-wrapper {
					width: 0;
				}
				#contenedor {
					padding: 20px;
					position: relative;
				}
				#wrapper.toggled #contenedor {
					position: relative;
					margin-right: 0;
				}
			}
			.footer {
				position: relative;
				right: 0;
				bottom: 0;
				text-align: right;
			}
			.notoy{
				display: none !important;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<!-- Sidebar -->
			<div id="sidebar-wrapper">
				<div 
					
					onclick="location.reload()"
					align="center" 
					style="background-color: #ffbc49; cursor: pointer">
					<img src="../images/logo.png" style="max-width: 150px" />
				</div>
				<ul class="sidebar-nav">
					<li>
						<a
							data-toggle="collapse" 
							href="#collapseExample4"
							onclick="requests.list_requests({
								div: 'contenedor',
								state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
								municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
							})">
							<i class="fa fa-user"></i> <span>Solicitudes</span>
						</a>
						<ul class="sidebar-nav collapse" id="collapseExample4">
							<li>
								<a
									href="#contenedor"
									onclick="requests.list_requests({
										div: 'contenedor',
										status: 1,
										state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
										municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
									})">
									- <i class="fa fa-check"></i> <span>Aceptadas</span></a>
							</li>
							<li>
								<a
									href="#contenedor"
									onclick="requests.list_requests({
										div: 'contenedor',
										status: 2,
										state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
										municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
									})">
									- <i class="fa fa-times"></i> <span>Rechazadas</span></a>
							</li>
							<li>
								<a
									href="#contenedor"
									onclick="requests.list_requests({
										div: 'contenedor',
										status: 3,
										state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
										municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
									})">
									- <i class="fa fa-credit-card"></i> <span>Pagadas</span></a>
							</li>
						</ul>
					</li>
					<li>
						<a
							onclick="help_desk.view_dating({
								div: 'contenedor',
								view: 'view_dating_dep'
							})"
							href="#contenedor">
							<i class="fa fa-calendar-o"></i> <span>Citas</span>
						</a>
					</li>
					<li>
						<a
							data-toggle="collapse" 
							href="#collapseExample2"
							href="#contenedor"
							onclick="requests.list_requests({
								div: 'contenedor',
								status: 1,
								view: 'view_messages',
								state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
								municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
							})">
							<i class="fa fa-info-circle"></i>
							<span>Mesa de Ayuda</span>
						</a>
						<ul class="sidebar-nav collapse" id="collapseExample2">
							<li>
								<!-- <a
									href="#contenedor"
									onclick="help_desk.view_main({
										div: 'contenedor',
										state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
										municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
									})">
									<i class="fa fa-info-circle"></i>
									<span>Preguntas frecuentes</span>
								</a> -->
								<a href="#">
									- <i class="fa fa-info-circle"></i> <span>Preguntas frecuentes</span>
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
							href="#contenedodr">
							<i class="fa fa-home"></i> <span>Expedientes</span>
						</a>
					</li>
					<li>
						<a
							href="#contenedor"
						 	class="btn-orange btn-block">
							<i class="fa fa-shopping-basket" aria-hidden="true"></i>
							<span>Modificación al padrón de comerciantes</span>
						</a>
					</li>
					<li>
						<a
							href="#contenedor"
						 	class="btn-orange btn-block" >
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<span>Asignación de espacio</span>
						</a>
					</li>
					<li>
						<a
							data-toggle="collapse" 
							href="#collapseExample3"
							href="#contenedor"
							onclick="admon.list_requests({
								div: 'contenedor',
								id_dependencie: '<?php echo $_SESSION['dependencie']['id'] ?>'
							})">
							<i class="fa fa-info-circle"></i>
							<span>Soporte tecnico</span>
						</a>
						<ul class="sidebar-nav collapse" id="collapseExample3">
							<li>
								<a
									class="btn-orange btn-block"
									href="#contenedor"
									onclick="admon.list_questions({
										div: 'contenedor'
									})">
									- <i class="fa fa-info-circle"></i> <span>Preguntas frecuentes</span>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /#sidebar-wrapper -->
			<!-- Contenedor -->
			<div>
				<nav class="navbar navbar-expand-lg navbar-light bg-light vuela">
					<button class="btn btn-default" id="menu-toggle" style="margin-right: 10px">
						<i class="fa fa-bars"></i>
					</button>
					<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
						<form class="form-inline my-2 my-lg-0" onsubmit="event.preventDefault()">
							<input 
								class="form-control mr-sm-2" 
								type="search" 
								placeholder="Buscar.."
								onchange="requests.search_dep({
									from_dep: 1,
									search: $(this).val(),
									state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
									municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
								})"
								id="search_expedients"
								name="keyword">
							<button 
								onclick="requests.search({
									search: $('#search_expedients').val(),
									mail: '<?php echo $_SESSION['user']['correo'] ?>'
								})"
								class="btn btn-outline-success my-2 my-sm-0" 
								type="button" 
								style="margin-right: 10px">
								Buscar
							</button>
						</form>
						<ul class="navbar-nav mr-auto mt- mt-lg-0">
							
						</ul>
						<ul class="navbar-nav">
							<li class="nav-item">
								<button 
									class="btn btn-default"
									 data-toggle="collapse" 
									 href="#collapseExample" 
									 role="button" 
									 aria-expanded="false" 
									 aria-controls="collapseExample"> 
									 <img 
									 	style="max-width: 30px"
									 	// src="../dep_files/<?php echo $_SESSION['dependencie']['id'] ?>/logo.png"
										onerror="this.src='../images/photos/loggeduser.png';" 
										class="profile-image img-circle"> 
									 <?php echo $_SESSION['dependencie']['nombredep'] ?></h4>
								</button>
								</a>
								<div class="collapse" id="collapseExample">
									<a 
										onclick="dependencies.view_config({
											div: 'contenedor',
											id: <?php echo $_SESSION['dependencie']['id'] ?>
										})"
										class="dropdown-item" href="#">
										<i class="fa fa-cog"></i> Configuración
									</a>
									<a class="dropdown-item" href="#"><i class="fa fa-info-circle"></i> Ayuda</a>
									<a class="dropdown-item" href="signin.php"><i class="fa fa-sign-out"></i> Salir</a>
								</div>
							</li>
						</ul>
					</div>
					<button 
						class="navbar-toggler" 
						type="button" 
						data-toggle="collapse" 
						data-target="#navbarTogglerDemo01" 
						aria-controls="navbarTogglerDemo01" 
						aria-expanded="false" 
						aria-label="Toggle navigation">
						<i class="fa fa-exchange fa-rotate-90" aria-hidden="true"></i>
					</button>
				</nav>
				<div id="div_search_results"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12" id="contenedor">
							<div class="row">
								<div class="col-sm-6 col-md-3">
									<div class="card text-white bg-success mb-3">
										<div class="card-header">
											Fijo
										</div>
										<div class="card-body">
											<div 
												style="cursor: pointer"
												data-toggle="collapse"
												data-target="#div_fixed">
												<i class="fa fa-building fa-3x"></i> <h1 id="sum_fixed">0</h1>
											</div>
											<div class="collapse" id="div_fixed">
												<div 
													onclick="requests.list_requests({
														estado: 'Fijo',
														div: 'contenedor',
														status: 1,
														state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
														municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
													})"
													class="card text-white bg-success mb-3">
													<div class="card-header" style="cursor: pointer">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-check fa-2x"></i>
															</div>
															<div class="col-xs-8">
																<h3>Aceptadas</h3>
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
													class="card text-white bg-success mb-3">
													<div class="card-header" style="cursor: pointer">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-times fa-2x"></i>
															</div>
															<div class="col-xs-8">
																<h3>Rechazada</h3>
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
													class="card text-white bg-success mb-3">
													<div class="card-header" style="cursor: pointer">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-user fa-2x"></i>
															</div>
															<div class="col-xs-8">
																<h3>Pendientes</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="card text-white bg-primary mb-3">
										<div class="card-header">
											Semi-fijo
										</div>
										<div class="card-body">
											<div 
												style="cursor: pointer"
												data-toggle="collapse"
												data-target="#div_semi_fixed">
												<i class="fa fa-shopping-basket fa-3x"></i> <h1 id="sum_semi_fixed">0</h1>
											</div>
											<div class="collapse" id="div_semi_fixed">
												<div 
													onclick="requests.list_requests({
														estado: 'Fijo',
														div: 'contenedor',
														status: 1,
														state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
														municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
													})"
													class="card text-white bg-primary mb-3">
													<div class="card-header" style="cursor: pointer">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-check fa-2x"></i>
															</div>
															<div class="col-xs-8">
																<h3>Aceptadas</h3>
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
													class="card text-white bg-primary mb-3">
													<div class="card-header" style="cursor: pointer">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-times fa-2x"></i>
															</div>
															<div class="col-xs-8">
																<h3>Rechazada</h3>
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
													class="card text-white bg-primary mb-3">
													<div class="card-header" style="cursor: pointer">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-user fa-2x"></i>
															</div>
															<div class="col-xs-8">
																<h3>Pendientes</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="card text-white bg-secondary  mb-3">
										<div class="card-header">
											Ambulante
										</div>
										<div class="card-body">
											<div 
												style="cursor: pointer"
												data-toggle="collapse"
												data-target="#div_walking">
												<i class="fa fa-motorcycle fa-3x"></i> <h1 id="sum_walking">0</h1>
											</div>
											<div class="collapse" id="div_walking">
												<div 
													onclick="requests.list_requests({
														estado: 'Fijo',
														div: 'contenedor',
														status: 1,
														state: '<?php echo $_SESSION['dependencie']['estadodep'] ?>',
														municipality: '<?php echo $_SESSION['dependencie']['municipiodep'] ?>'
													})"
													class="card text-white bg-secondary mb-3">
													<div class="card-header" style="cursor: pointer">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-check fa-2x"></i>
															</div>
															<div class="col-xs-8">
																<h3>Aceptadas</h3>
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
													class="card text-white bg-secondary mb-3">
													<div class="card-header" style="cursor: pointer">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-times fa-2x"></i>
															</div>
															<div class="col-xs-8">
																<h3>Rechazada</h3>
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
													class="card text-white bg-secondary mb-3">
													<div class="card-header" style="cursor: pointer">
														<div class="row">
															<div class="col-xs-4">
																<i class="fa fa-user fa-2x"></i>
															</div>
															<div class="col-xs-8">
																<h3>Pendientes</h3>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- row <-->
						</div>
					</div>
				</div>
			</div>
			<!-- END Contenedor -->
		</div>
		
<!-- /////////////////// ===================				JS						=================== /////////////////// -->

		<script src="../plugins/jquery-1.11.2.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	<!-- dataTables  -->
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/b-1.5.1/datatables.min.js"></script>
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
	<!-- notify -->
		<script type="text/javascript" src="../plugins/notify.js"></script>
	<!-- PDFJs -->
		<script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
	<!-- responsivevoice -->
		<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
	<!-- fullcalendar -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.8.0/fullcalendar.min.js"></script>
		<script src='../plugins/fullCalendarLang.js'></script>

	<!-- System -->
		<script src="../js_system/requests.js"></script>
		<script src="../js_system/help_desk.js"></script>
		<script src="../js_system/users.js"></script>
		<script src="../js_system/dependencies.js"></script>

<!-- /////////////////// ===================			END JS						=================== /////////////////// -->

	</body>
	<div class="footer">
		<a href="../terminos.html" style="color: grey !important;">Terminos y condiciones</a> /
		<a href="../aviso.html" style="color: grey !important;">Aviso de privacidad</a>
	</div>
</html>
<script>
	$("#menu-toggle").click(function(e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
</script>