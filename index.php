<?php

session_start();

$_SESSION['user'] = '';

session_destroy();

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="assets/sweetalert/dist/sweetalert2.min.css">
		
	<!-- font-awesome -->
		<link rel="stylesheet" href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" type="text/css">
		
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
			#wrapper.toggled{
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
				line-height: 150%;
				display: block;
				text-decoration: none;
				text-align: center;
				color: #FFF !important;
				margin-top: 20px;
				cursor: pointer;
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
				#wrapper.toggled{
					position: relative;
					margin-right: 0;
				}
			}
			body{
				background-image: url("images/fondo_smart_city.jpeg")
			}
			.embed-responsive{
				width: 60% !important;
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
					<img src="images/logo.png" style="max-width: 150px" />
				</div>
				<ul class="sidebar-nav">
					<li>
						<a
							href="#div_commerce"
							onclick="
								$('#wrapper').removeClass('toggled');
								$('#div_commerce').show();
								$('#div_frame_video').show();
								$('#formulario').hide();
								$('#form_info').hide();
								$('#div_index').hide();
								$('#contenedor').hide();
								$('#div_map').hide();
								$('#div_404').hide();
								$('#the_frame').attr('src', 'https://www.youtube.com/embed/6wMYKvaO4zE?rel=0&autoplay=1');
							">
							Puestos Fijos, Semi fijos y Ambulantes
						</a>
					</li>
					<li>
						<a onclick="
							$('#wrapper').removeClass('toggled');
							$('#div_index').hide();
							$('#formulario').hide();
							$('#form_info').hide();
							$('#contenedor').hide();
							$('#div_commerce').hide();
							$('#the_frame').attr('src', '');
							$('#div_404').show();">
							Panteones
						</a>
					</li>
					<li>
						<a onclick="
							$('#wrapper').removeClass('toggled');
							$('#div_index').hide();
							$('#formulario').hide();
							$('#form_info').hide();
							$('#contenedor').hide();
							$('#div_commerce').hide();
							$('#the_frame').attr('src', '');
							$('#div_404').show();">
							Adopción de alumbrado público
						</a>
					</li>
					<li>
						<a 
							data-toggle="collapse" 
							href="#collapseExample"
							onclick="
							$('#wrapper').removeClass('toggled');
							$('#div_index').hide();
							$('#formulario').hide();
							$('#form_info').hide();
							$('#contenedor').hide();
							$('#div_commerce').hide();
							$('#the_frame').attr('src', '');
							$('#div_404').show();">
							Permisos especiales via pública
						</a>
						<ul class="sidebar-nav collapse" id="collapseExample">
							<li>Para utilizar permisos de:</li>
							<li>
								<a 
									onclick="
									$('#wrapper').removeClass('toggled');
									$('#div_index').hide();
									$('#formulario').hide();
									$('#form_info').hide();
									$('#contenedor').hide();
									$('#div_commerce').hide();
									$('#the_frame').attr('src', '');
									$('#div_404').show();">
									Metodos de construcción
								</a>
							</li>
							<li>
								<a 
									style="color: grey"
									onclick="
									$('#wrapper').removeClass('toggled');
									$('#div_index').hide();
									$('#formulario').hide();
									$('#form_info').hide();
									$('#contenedor').hide();
									$('#div_commerce').hide();
									$('#the_frame').attr('src', '');
									$('#div_404').show();">
									Desechos de residuos
								</a>
							</li>
							<li>
								<a 
									onclick="
									$('#wrapper').removeClass('toggled');
									$('#div_index').hide();
									$('#formulario').hide();
									$('#form_info').hide();
									$('#contenedor').hide();
									$('#div_commerce').hide();
									$('#the_frame').attr('src', '');
									$('#div_404').show();">
									Desechos de construcción
								</a>
							</li>
						</ul>
					</li>
					<li>
						
						<a 
							data-toggle="collapse" 
							href="#collapseExample2"
							onclick="
							$('#wrapper').removeClass('toggled');
							$('#div_index').hide();
							$('#formulario').hide();
							$('#form_info').hide();
							$('#contenedor').hide();
							$('#div_commerce').hide();
							$('#the_frame').attr('src', '');
							$('#div_404').show();">
							Servicios públicos
						</a>
						<ul class="sidebar-nav collapse" id="collapseExample2">
							<li>Participación ciudadana notifica:</li>
							<li>
								<a 
									onclick="
									$('#wrapper').removeClass('toggled');
									$('#div_index').hide();
									$('#formulario').hide();
									$('#form_info').hide();
									$('#contenedor').hide();
									$('#div_commerce').hide();
									$('#the_frame').attr('src', '');
									$('#div_404').show();">
									Alumbrado público
								</a>
							</li>
							<li>
								<a 
									onclick="
									$('#wrapper').removeClass('toggled');
									$('#div_index').hide();
									$('#formulario').hide();
									$('#form_info').hide();
									$('#contenedor').hide();
									$('#div_commerce').hide();
									$('#the_frame').attr('src', '');
									$('#div_404').show();">
									Baches
								</a>
							</li>
							<li>
								<a 
									onclick="
									$('#wrapper').removeClass('toggled');
									$('#div_index').hide();
									$('#formulario').hide();
									$('#form_info').hide();
									$('#contenedor').hide();
									$('#div_commerce').hide();
									$('#the_frame').attr('src', '');
									$('#div_404').show();">
									Residuos de basura
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<!-- /#sidebar-wrapper -->
			<!-- Contenedor -->
			<div>
				<div class="container-fluid">
					<form
						style="background-color: rgba(255, 255, 255, 0.5); padding: -10px; display: none"
						method="post"
						id="formulario"
						onsubmit="event.preventDefault();  validate_insert()"
						enctype="multipart/form-data" >
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<label class="control-label">Nombre</label>
								<input required="1" type="text" class="form-control" name="Nombre" id="name"/>
								<label class="control-label">CURP</label>
								<input required="1" type="text" class="form-control" name="CURP" id="curp"/>
								<label class="control-label">Apellido paterno</label>
								<input required="1" type="text" class="form-control" name="Apellidos" id="last_name"/>
								<label class="control-label">Apellido materno</label>
								<input required="1" type="text" class="form-control" name="Apellidos" id="last_name2"/>
								<label class="control-label">Correo</label>
								<input required="1" type="email" class="form-control" name="Correo" id="mail2"/>
								<label class="control-label">Estado</label>
								<select
									onchange="dependencies.list_municipalities({
										div: 'municipiodep',
										from_user: 1,
										estado: $(this).val()
									})"
									required="1"
									class="form-control"
									name="estadodep"
									id="estadodep">
									<option value="1">Aguascalientes</option>
									<option value="2">Baja California</option>
									<option value="3">Baja California Sur</option>
									<option value="4">Campeche</option>
									<option value="5">Coahuila de Zaragoza</option>
									<option value="6">Colima</option>
									<option value="7">Chiapas</option>
									<option value="8">Chihuahua</option>
									<option value="9">Distrito Federal</option>
									<option value="10">Durango</option>
									<option value="11">Guanajuato</option>
									<option value="12">Guerrero</option>
									<option value="13">Hidalgo</option>
									<option value="14">Jalisco</option>
									<option value="15">México</option>
									<option value="16">Michoacán de Ocampo</option>
									<option value="17">Morelos</option>
									<option value="18">Nayarit</option>
									<option value="19">Nuevo León</option>
									<option value="20">Oaxaca</option>
									<option value="21">Puebla</option>
									<option value="22">Querétaro</option>
									<option value="23">Quintana Roo</option>
									<option value="24">San Luis Potosí</option>
									<option value="25">Sinaloa</option>
									<option value="26">Sonora</option>
									<option value="27">Tabasco</option>
									<option value="28">Tamaulipas</option>
									<option value="29">Tlaxcala</option>
									<option value="30">Veracruz de Ignacio de la Llave</option>
									<option value="31">Yucatán</option>
									<option value="32">Zacatecas</option>
								</select>
								<label class="control-label">Municipio</label>
								<select required="1" class="form-control" name="municipiodep" id="municipiodep">
									<option value="Aguascalientes">Aguascalientes</option>
									<option value="Asientos">Asientos</option>
									<option value="Calvillo">Calvillo</option>
									<option value="Cosio">Cosio</option>
									<option value="Jesus Maria">Jesus Maria</option>
									<option value="Pabellon de Arteaga">Pabellon de Arteaga</option>
									<option value="Rincon de Romos">Rincon de Romos</option>
									<option value="San Jose de Gracia">San Jose de Gracia</option>
									<option value="Tepezala">Tepezala</option>
									<option value="El Llano">El Llano</option>
									<option value="San Francisco de los Romo">San Francisco de los Romo</option>
								</select>
							</div>
							<div class="col-sm-12 col-md-6">
								<label class="control-label">Colonia</label>
								<input required="1" type="text" class="form-control" name="Colonia" id="colony"/>
								<label class="control-label">Calle</label>
								<input required="1" type="text" class="form-control" name="Colonia" id="addres"/>
								<label class="control-label">Num. Ext.</label>
								<input required="1" type="number" class="form-control" name="Numero Exterior" id="num"/>
								<label class="control-label">Num. Int.</label>
								<input type="number" class="form-control" name="Numero Interior" id="num_int"/>
								<label class="control-label">Contraseña</label>
								<input required="1" type="password" class="form-control" name="Contraseña" id="pass1"/>
								<label class="control-label">Confirmar contraseña</label>
								<input required="1" type="password" class="form-control" name="Confirmar" id="pass22"/><br />
								<input type="checkbox" id="check_confirm2" /> 
								He leído y aceptado los términos y condiciones de uso, así como el Aviso de privacidad
								<button class="btn btn-success btn-block" type="submit" id="btnInsert" disabled="true">
									Registrar
								</button>
								<button 
									type="button" 
									class="btn btn-warning btn-lg btn-block" 
									id="menu-toggle6">
									Regresar
								</button>
							</div>
						</div>
					</form>
					<form
						style="background-color: rgba(255, 255, 255, 0.8); padding: -10px; display: none"
						method="post"
						id="form_info"
						onsubmit="event.preventDefault();  info()" 
						enctype="multipart/form-data" >
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<label>Nombre del presidente:</label>
								<input 
									required="1" 
									type="text" 
									class="form-control uname"
									name="name3" 
									id="name3"/>
								<label>Periodo de ejercicio:</label>
								<input 
									required="1" 
									type="text" 
									class="form-control uname"
									name="period" 
									id="period"/>
								<label>Oficina de:</label>
								<input 
									required="1" 
									type="text" 
									class="form-control uname"
									name="office" 
									id="office"/>
								¿Con cuántos puestos fijos, semi-fijos y ambulantes cuenta el municipio?
								<input 
									required="1" 
									type="text" 
									class="form-control pword" 
									name="num_pues" 
									id="num_pues"/>
								¿Cuántos mercados tiene el municipio?
								<input 
									required="1" 
									type="text" 
									class="form-control pword" 
									name="num_mer" 
									id="num_mer"/>
								¿Cuántos puestos móviles tiene el municipio?
								<input 
									required="1" 
									type="text" 
									class="form-control pword" 
									name="num_mo" 
									id="num_mo"/>
								<label>Correo:</label> 
								<input 
									required="1" 
									type="email" 
									class="form-control pword" 
									name="mail3" 
									id="mail3"/>
							</div>
							<div class="col-sm-12 col-md-6">
								<label>Telefono:</label>
								<input 
									required="1" 
									type="tel" 
									class="form-control pword" 
									name="telefono" 
									id="telefono"/>
								<label>Celular:</label>
								<input 
									required="1" 
									type="tel" 
									class="form-control pword" 
									name="cel" 
									id="cel"/>
								<label class="control-label">Estado</label>
								<select 
									onchange="dependencies.list_municipalities({
										div: 'municipiodep2',
										estado: $(this).val()
									})"
									required="1" 
									class="custom-select custom-select-lg" 
									name="estadodep" 
									id="estadodep2">
									<option value="1">Aguascalientes</option>
									<option value="2">Baja California</option>
									<option value="3">Baja California Sur</option>
									<option value="4">Campeche</option>
									<option value="5">Coahuila de Zaragoza</option>
									<option value="6">Colima</option>
									<option value="7">Chiapas</option>
									<option value="8">Chihuahua</option>
									<option value="9">Distrito Federal</option>
									<option value="10">Durango</option>
									<option value="11">Guanajuato</option>
									<option value="12">Guerrero</option>
									<option value="13">Hidalgo</option>
									<option value="14">Jalisco</option>
									<option value="15">México</option>
									<option value="16">Michoacán de Ocampo</option>
									<option value="17">Morelos</option>
									<option value="18">Nayarit</option>
									<option value="19">Nuevo León</option>
									<option value="20">Oaxaca</option>
									<option value="21">Puebla</option>
									<option value="22">Querétaro</option>
									<option value="23">Quintana Roo</option>
									<option value="24">San Luis Potosí</option>
									<option value="25">Sinaloa</option>
									<option value="26">Sonora</option>
									<option value="27">Tabasco</option>
									<option value="28">Tamaulipas</option>
									<option value="29">Tlaxcala</option>
									<option value="30">Veracruz de Ignacio de la Llave</option>
									<option value="31">Yucatán</option>
									<option value="32">Zacatecas</option>
								</select>
								<label class="control-label">Municipio</label>
								<select required="1" class="custom-select custom-select-lg" name="municipiodep2" id="municipiodep2">
									<option value="Aguascalientes">Aguascalientes</option>
									<option value="Asientos">Asientos</option>
									<option value="Calvillo">Calvillo</option>
									<option value="Cosio">Cosio</option>
									<option value="Jesus Maria">Jesus Maria</option>
									<option value="Pabellon de Arteaga">Pabellon de Arteaga</option>
									<option value="Rincon de Romos">Rincon de Romos</option>
									<option value="San Jose de Gracia">San Jose de Gracia</option>
									<option value="Tepezala">Tepezala</option>
									<option value="El Llano">El Llano</option>
									<option value="San Francisco de los Romo">San Francisco de los Romo</option>
								</select>
								<label class="control-label">Dirección</label>
								<input 
									required="1" 
									type="text" 
									class="form-control uname"
									name="address" 
									id="address"/>
								Mensaje:<br />
								<textarea id="info_message" class="form-control" required="1"></textarea>
								<button class="btn btn-success btn-block" type="submit" id="btn_send" style="margin-top: 20px">
									Enviar
								</button><br />
								<button 
									type="button" 
									class="btn btn-warning btn-lg btn-block" 
									id="menu-toggle4">
									Regresar
								</button>
							</div>
						</div>
					</form>
					<div class="row" id="contenedor" style="display: none" align="center">
						<div class="col-md-4 col-sm-12">
						</div>
						<div class="col-md-4 col-sm-12" style="padding-top: 20px">
							<form 
								method="post" 
								id="sesion" 
								onsubmit="return forM(this)" 
								enctype="multipart/form-data">
								<h4 class="nomargin">Iniciar Sesión</h4>
								<p class="mt5 mb20">
									Haz seguimiento de tu tramite en linea.
								</p>
								<input 
									type="text" 
									class="form-control uname" 
									placeholder="Correo Electrónico" 
									name="correo" 
									id="correo"/><br>
								<input
									type="password"
									class="form-control pword"
									placeholder="Contraseña"
									name="contrasena"
									id="contrasena"/><br />
								<input type="checkbox" id="check_confirm" /> 
								He leído y aceptado los términos y condiciones de uso,
								así como el Aviso de privacidad
								<button class="btn btn-success btn-block" type="submit" id="btnSubir" disabled="true">
									Iniciar
								</button><br />
								<button 
									onclick="
										$('#formulario').show();
										$('#contenedor').hide();
									"
									class="btn btn-info btn-block" 
									type="button">
									Registrar
								</button>
								<button 
									type="button" 
									class="btn btn-warning btn-lg btn-block" 
									id="menu-toggle5">
									Regresar
								</button><br />
								<div align="center">
									<a href="terminos.html">Términos y condiciones</a><br />
									<a href="aviso.html">Aviso de privacidad</a>
								</div>
							</form>
							<div class="row">
								<div class="col-sm-12" align="center">
									<a href="#div_recovery" aling="center" data-toggle="collapse" data-target="#div_recovery">
										Olvide mi contraseña
									</a>
								</div>
								<div class="col-sm-12 collapse" id="div_recovery">
									<form id="form_recovery" onsubmit="event.preventDefault();  validate()">
										<h4>Recuperar contraseña</h4>
										<input class="form-control" id="mail" type="email" placeholder="Correo" required="1" />
										<input
											class="form-control"
											id="pass"
											type="password"
											placeholder="Nueva contraseña"
											required="1" />
										<input 
											class="form-control" 
											id="pass2" 
											type="password" 
											placeholder="Repetir"
											 required="1" />
										<button id="btn_send_recovery" class="btn btn-success btn-block">
											Recuperar
										</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
						</div>
					</div>
					<div align="center" id="div_404" style="display: none" align="center">
						<img src="images/404.jpeg" class="img-fluid" alt="Responsive image"/><br /><br />
						<button 
							type="button" 
							class="btn btn-warning btn-lg d-lg-none d-md-none" 
							id="menu-toggle3">
							Regresar
						</button>
					</div>
					<div align="center" style="display: none" id="div_frame_video">
						<div class="embed-responsive embed-responsive-21by9">
							
						  		<!-- src="https://www.youtube.com/embed/G7ubCKG3Jxc?rel=0&autoplay=1"  -->
						  	<iframe 
						  		id="the_frame"
						  		width="560" 
						  		height="315" 
						  		src="https://www.youtube.com/embed/G7ubCKG3Jxc" 
						  		frameborder="0" allow="autoplay; encrypted-media" 
						  		allowfullscreen></iframe>
						</div>
					</div>
					<div id="div_map">
						<div class="row">
							<div class="col-sm-12">
								<input style="width:300px;" type="text" class="form-control" id="in_add">
								<div id="google_map" style="width: 100%; height: 60vh"> </div>
							</div>
						</div>
					</div>
					<div align="center" id="div_index" style="display: none">
						<div class="row" style="padding-top: 20px">
							<div class="col-sm-12">
								<button type="button" class="btn btn-warning btn-lg" id="menu-toggle">Ver Mas</button>
								<button 
									onclick="
										$('#form_info').show();
										$('#div_index').hide();
										$('#formulario').hide();
										$('#contenedor').hide();
										$('#div_commerce').hide();
										$('#formulario').hide();
										$('#the_frame').attr('src', '');
										$('#div_404').hide();
									"	
									type="button" 
									class="btn btn-secondary btn-lg">
									Solicitar Información
								</button>
							</div>
						</div>
					</div>
					<div align="center" id="div_commerce" style="display: none">
						<div class="row" style="padding-top: 20px">
							<div class="col-sm-12">
								<button type="button" class="btn btn-warning btn-lg" id="menu-toggle2">Ver mas</button>
								<button 
									type="button" 
									class="btn btn-secondary btn-lg"
									onclick="
										$('#div_index').hide();
										$('#div_commerce').hide();
										$('#formulario').hide();
										$('#form_info').hide();
										$('#div_404').hide();
										$('#the_frame').attr('src', '');
										$('#contenedor').show();
									">Iniciar sesión</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- END Contenedor -->
		</div>
	
	
	
	
		<div class="modal" tabindex="-1" role="dialog" id="modal_map">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Autorizar ubicacion</h5>
					</div>
					<div class="modal-body" align="center">
						<p>
							Para poder usar la aplicación es necesario que autorices tu ubicación.
						</p>
						<img src="images/map-pin-location.jpg" class="img-fluid" />
					</div>
				</div>
			</div>
		</div>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsZOvqzL9c7_O7Fj7t3FDt77nejjwbZXw&libraries=places,geometry" async defer></script>
		<script src="plugins/jquery-1.11.2.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
		<script src="assets/sweetalert/dist/sweetalert2.min.js"></script>
		<script src="js/sesion.js"></script>
		<script>
			var coordenates = {
				lat : 20.6739383,
				lng : -103.405454
			},
			zoom = 15;
	
			$("#menu-toggle").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
			$("#menu-toggle2").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
			$("#menu-toggle3").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
			$("#menu-toggle4").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
			$("#menu-toggle5").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
			$("#menu-toggle6").click(function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
		
			
		// Mobile detected
			if(!/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
				$("#menu-toggle").click();
			}
			
			enable_cb();
			$("#check_confirm").click(enable_cb);
		
			function enable_cb() {
				if (this.checked) {
					$("#btnSubir").removeAttr("disabled");
				} else {
					$("#btnSubir").attr("disabled", true);
				}
			}
			
			enable_cb2();
			$("#check_confirm2").click(enable_cb2);
		
			function enable_cb2() {
				if (this.checked) {
					$("#btnInsert").removeAttr("disabled");
				} else {
					$("#btnInsert").attr("disabled", true);
				}
			}
			
			function validate () {
				console.log("========> !1111111111111111111-----------2222222222222------------33333333")
				var data = {},
					$required = [],
					message = 'Debes llenar los siguientes campos:',
					error = 0,
					count = 0;
		
				$("#form_recovery").find(':input').each(function(key, value){
					var required = $(this).attr('required'),
						valor = $(this).val(),
						id = this.id;
		
				// Validate that the required input not are empty
					if (required === '1' && valor.length <= 0) {
						error = 1;
		
						$required.push(id);
					}
		
					if(id){
						data[id] = $(this).val();
					}
				});
		
			// Build the error message
				if ($required.length > 0) {
					$.each($required, function(index, value) {
						message += '-->' + this + ' -- ';
					});
				}
		
			// Error
				if (error === 1) {
					swal({
						title : 'Campos no validos',
						text : message,
						timer : 5000,
						showConfirmButton : true,
						type : 'warning'
					});
		
					return;
				}
				if(data.pass !== data.pass2){
					swal({
						title : 'Contraseña no valida',
						text : 'Las contraseñas no son iguales',
						timer : 5000,
						showConfirmButton : true,
						type : 'warning'
					});
		
					return;
				}
		
		
				console.log('==========> done DATA', data);
		
				$("#btn_send_recovery").button('loading');
		
				$.ajax({
					data : data,
					url : 'ajax.php?c=users&f=send_recovery',
					type : 'post',
					dataType : 'json'
				}).done(function(resp) {
					console.log('==========> done recovery', resp);
		
					$("#btn_send_recovery").button('reset');
		
					if(resp.status === 1){
						swal({
							title : 'Revisa tu correo',
							text : 'Te hemos enviado un correo con los pasos para recuperar tu cuenta',
							timer : 5000,
							showConfirmButton : true,
							type : 'warning'
						});
					}else{
						swal({
							title : 'Datos no validos',
							text : 'Revisa que el correo sea correcto',
							timer : 5000,
							showConfirmButton : true,
							type : 'warning'
						});
					}
				}).fail(function(resp) {
					console.log('==========> fail !!! save', resp);
		
					$("#btn_send_recovery").button('reset');
		
					swal({
						title : 'Error',
						text : 'A ocurrido un problema al guardar los datos',
						timer : 5000,
						showConfirmButton : true,
						type : 'error'
					});
				});
			}
			
			
			function validate_insert () {
				var data = {},
					$required = [],
					message = 'Debes llenar los siguientes campos: \n',
					error = 0,
					count = 0,
					$function  =  'save';


				$("#formulario").find(':input').each(function(key, value){
					var required = $(this).attr('required'),
						valor = $(this).val(),
						id = this.id;

				// Validate that the required input not are empty
					if (required === '1' && valor.length <= 0) {
						error = 1;

						$required.push($(this).attr("name"));
					}else{
						if(id){
							data[id] = $(this).val();
						}
					}
				});

			// Build the error message
				if ($required.length > 0) {
					$.each($required, function(index, value) {
						message += '-->' + this + ' \n';
					});
				}

			// Invalid CURP
				if (data.curp.length < 18) {
					error = 1;
					message += '-->CURP no valida \n';
				}

			// Error
				if (error === 1) {
					swal({
						title : 'Campos no validos',
						text : message,
						timer : 5000,
						showConfirmButton : true,
						type : 'warning'
					});

					return;
				}

			// Invalid pass
				if (data.pass1 !== data.pass22) {
					swal({
						title : 'Las contraseñas no coinciden',
						text : 'Revisa las constraseñas',
						timer : 5000,
						showConfirmButton : true,
						type : 'warning'
					});

					return;
				}
				
				data.pass = data.pass1;
				data.mail = data.mail2;
				data.pass2 = data.pass22;

				console.log('==========> done DATA', data);

				$("#btnSubir").prop('disabled', true);

				$.ajax({
					data : data,
					url : 'ajax.php?c=users&f='+$function,
					type : 'post',
					dataType : 'json'
				}).done(function(resp) {
					console.log('==========> done save_user', resp);

					$("#btnSubir").prop('disabled', false);

					if(resp.status === 2){
						swal({
							title : 'Usuario existente',
							text : 'Este correo ya esta registrado, intenta iniciar sesion',
							timer : 7000,
							showConfirmButton : true,
							type : 'warning'
						});

						return;
					}

					swal({
						title : 'Datos guardados',
						text : 'Los datos se han guardado con exito',
						timer : 5000,
						showConfirmButton : true,
						type : 'success'
					});

					location.href="panel.php";
				}).fail(function(resp) {
					console.log('==========> fail !!! save', resp);

					$("#btnSubir").prop('disabled', false);
					swal({
						title : 'Error',
						text : 'A ocurrido un problema al guardar los datos',
						timer : 5000,
						showConfirmButton : true,
						type : 'error'
					});
				});
			}
			
			function info () {
				var data = {},
					$required = [],
					message = 'Debes llenar los siguientes campos: \n',
					error = 0, 
					count = 0;
				
				$("#form_info").find(':input').each(function(key, value){
					var required = $(this).attr('required'),
						valor = $(this).val(),
						id = this.id;
					
				// Validate that the required input not are empty
					if (required === '1' && valor.length <= 0) {
						error = 1;
		
						$required.push(id);
					}
					
					if(id){
						data[id] = $(this).val();
					}
				});
				
			// Build the error message
				if ($required.length > 0) {
					$.each($required, function(index, value) {
						message += '-->' + this + ' \n';
					});
				}
				
			// Error
				if (error === 1) {
					swal({
						title : 'Campos no validos',
						text : message,
						timer : 5000,
						showConfirmButton : true,
						type : 'warning'
					});
					
					return;
				}
				
				data.message = $('#info_message').val();
				data.state = $('#estadodep2 option:selected').text();
				data.municipiodep = data.municipiodep2;
				data.mail = data.mail3;
				data.name = data.name3;
				
				console.log('==========> DATA', data);
				
				$("#btn_send").button('loading');
				
				$.ajax({
					data : data,
					url : 'send_mail.php',
					type : 'post',
					dataType : 'json'
				}).done(function(resp) {
					console.log('==========> done info', resp);
					
					$("#btn_send").button('reset');
					
					swal({
						title : 'Datos enviados',
						text : 'Pronto nos pondremos en contacto contigo',
						timer : 5000,
						showConfirmButton : true,
						type : 'success'
					});
					
					$("#form_info")[0].reset();
					dependencies.list_municipalities({
						div: 'municipiodep',
						estado: 1
					})
				}).fail(function(resp) {
					console.log('==========> fail !!! save', resp);
					
					$("#btn_send").button('reset');
					
					swal({
						title : 'Error',
						text : 'A ocurrido un problema al guardar los datos',
						timer : 5000,
						showConfirmButton : true,
						type : 'error'
					});
				});
			}
			
			function check ($objet) {
				console.log("============== Objet check", $objet);
							
				$objet.json = 1;
				
				$.ajax({
					data : $objet,
					url : 'ajax.php?c=dependencies&f=check',
					type : 'post',
					dataType : 'json'
				}).done(function(resp) {
					console.log('==========> done check', resp);

					if(resp.total < 1){
						swal({
							title : 'Municipio sin contrato',
							text : 'Este Municipio no cuenta con contrato',
							timer : 7000,
							showConfirmButton : true,
							type : 'warning'
						});

						return;
					}
					
					$("#wrapper").toggleClass("toggled");
				}).fail(function(resp) {
					console.log('==========> fail !!! save', resp);

					$("#btnSubir").prop('disabled', false);
					swal({
						title : 'Error',
						text : 'A ocurrido un problema al guardar los datos',
						timer : 5000,
						showConfirmButton : true,
						type : 'error'
					});
				});
			}
			
			
			window.onload = function() {
				var startPos;
				var geoOptions = {
					enableHighAccuracy : true,
					timeout: 10 * 1000
				}

				var geoSuccess = function(position) {
					console.log("============> All ok.", position);
					
					
					startPos = position;
					coordenates.lat = startPos.coords.latitude;
					coordenates.lng = startPos.coords.longitude;
					init();
					// document.getElementById('startLat').innerHTML = startPos.coords.latitude;
					// document.getElementById('startLon').innerHTML = startPos.coords.longitude;
				};
				var geoError = function(error) {
					console.log('Error occurred. Error code: ' + error.code);
					if ("geolocation" in navigator) {
						navigator.geolocation.getCurrentPosition(function(position) {});
					}
					if(error.code === 1){
						$('#modal_map').modal({
						    backdrop: 'static',
						    keyboard: false
						})
						// $("#modal_map").modal('show');
					}
				};
				
				navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);
			};
			
			
///////////////// ******** -------						init						------ ************ //////////////////
//////// Load a Google map
	// The parameters can receive:

			function init() {
				if (coordenates.lat === 20.6739383 || coordenates.lng === -103.405454) {
					zoom = 15;
				}
		
				var myLatlng = {
					lat : coordenates.lat,
					lng : coordenates.lng
				};
		
				var map = new google.maps.Map(document.getElementById('google_map'), {
					zoom : zoom,
					center : myLatlng
				});
				
			// Imput para busqueda en google maps
				var input = document.getElementById('in_add');
				var searchBox = new google.maps.places.SearchBox(input, {
					region: 'MX'
				});
				map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		
			// mostrar resultados de la busqueda
				map.addListener('bounds_changed', function() {
					searchBox.setBounds(map.getBounds());
				});
				
		        var markers = [],
		        	markersArray = [];
		        
				searchBox.addListener('places_changed', function() {
					$("#wrapper").addClass("toggled");
				// Clear markers
					function clearOverlays() {
						for (var i = 0; i < markersArray.length; i++ ) {
							markersArray[i].setMap(null);
						}
						markersArray.length = 0;
					}
					markersArray.push(marker);
					google.maps.event.addListener(marker,"click",function(){});
					clearOverlays();

					var places = searchBox.getPlaces();
					
					if (places.length == 0) {
						return;
					}
					
				// Clear out the old markers.
					markers.forEach(function(marker) {
						marker.setMap(null);
					});
					markers = [];
					
					// For each place, get the icon, name and location.
					var bounds = new google.maps.LatLngBounds();
					places.forEach(function(place) {
						if (!place.geometry) {
							console.log("Returned place contains no geometry");
							return;
						}
						
						var marker = new google.maps.Marker({
								position: place.geometry.location,
								draggable : true,
								map : map,
								title : 'Arrastrar'
							});
						
					// Create a marker for each place.
						markers.push(marker);
						
						google.maps.event.addListener(marker, "dragend", function(event) {
							console.log("============> Event", event);
						});
						
						google.maps.event.addListener(marker, "click", function(event) {
							console.log("==============Event click", event);
							
							var geocoder = new google.maps.Geocoder,
								latlng = place.geometry.location;
								
							geocoder.geocode({'location': latlng}, function(results, status) {
								if (status === 'OK') {
									
								console.log("==============results", results[1]);
								
									var data = {};
									$.each(results[1].address_components, function(index, value) {
										var arr = value.types;
										var m = arr.indexOf("administrative_area_level_2"),
											s = arr.indexOf("administrative_area_level_1");
										
										if(m > -1){
											data.municipality = value.short_name;
										}
										if(s > -1){
											data.state = value.short_name;
										}
									});
									
									check(data);
								} else {
									console.log("============== !!! FAIL :(", status);
									window.alert('No podemos encontrar tu direccion');
								}
							});
						});
						
						if (place.geometry.viewport) {
						// Only geocodes have viewport.
							bounds.union(place.geometry.viewport);
						} else {
							bounds.extend(place.geometry.location);
						}
					});
					map.fitBounds(bounds);
				});
				
				var marker = new google.maps.Marker({
					position : myLatlng,
					draggable : true,
					map : map,
					title : 'Arrastrar'
				});
		
				google.maps.event.addListener(marker, "click", function(event) {
					console.log("==============Event click", event);
					
					var geocoder = new google.maps.Geocoder,
						latlng = event.latLng;
						
					geocoder.geocode({'location': latlng}, function(results, status) {
						if (status === 'OK') {
							var data = {};
							$.each(results[1].address_components, function(index, value) {
								var arr = value.types;
								var m = arr.indexOf("administrative_area_level_2"),
									s = arr.indexOf("administrative_area_level_1");
								
								if(m > -1){
									data.municipality = value.short_name;
								}
								if(s > -1){
									data.state = value.short_name;
								}
							});
							
							check(data);
						} else {
							console.log("============== !!! FAIL :(", status);
							window.alert('No podemos encontrar tu direccion');
						}
					});
				});
			}

///////////////// ******** -------					END init						------ ************ //////////////////

		</script>
	</body>
</html>