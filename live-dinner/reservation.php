<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>Live Dinner Restaurant - Responsive HTML5 Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">    
	<!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
	<!-- Pickadate CSS -->
    <link rel="stylesheet" href="css/classic.css">    
	<link rel="stylesheet" href="css/classic.date.css">    
	<link rel="stylesheet" href="css/classic.time.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="Tradición para tu meza" class="mi-logo" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<?php include_once "modulos/menu.php"; ?>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Pedidos</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Reservation -->
	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Realiza tu pedido</h2>
						<p>Todo pedido requiere un aticipo del almenos el 70% del valor total de venta</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-sm-12 col-xs-12">
					<div class="contact-block">
						<form id="contactForm">
							<div class="row">
								<div class="col-md-6">
									<h3>Fecha y Hora de entrega</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input id="input_date" class="datepicker picker__input form-control" name="date" type="text" value="" equired data-error="Please enter Date">
											<div class="help-block with-errors"></div>
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input id="input_time" class="time form-control picker__input" required data-error="Please enter time">
											<div class="help-block with-errors"></div>
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<select class="custom-select d-block form-control" id="person" required data-error="Please select Person">
											  <option disabled selected>Seleccione Entrega*</option>
											  <option value="1">Recoger en Sucursal</option>
											  <option value="2">Enviar por Correspondencia</option>
											</select>
											<div class="help-block with-errors"></div>
										</div> 
									</div>
								</div>
								<div class="col-md-6">
									<h3>Datos de contacto</h3>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="name" placeholder="Tu nombre" required data-error="Por favor ingrese su nombre">
											<div class="help-block with-errors"></div>
										</div>                                 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Tu Email" id="email" class="form-control" name="email" required data-error="Por favor ingrese su correo electronico">
											<div class="help-block with-errors"></div>
										</div> 
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" placeholder="Tu Teléfono" id="phone" class="form-control" name="phone" required data-error="Porfavor ingres su nmero de teléfono">
											<div class="help-block with-errors"></div>
										</div> 
									</div>
								</div>
								<div class="col-md-12">
									<div class="submit-button text-center">
										<button class="btn btn-common" id="submit" type="submit">Book Table</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div> 
										<div class="clearfix"></div> 
									</div>
								</div>
							</div>            
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Reservation -->
	
	
	
		
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
  <div class="container">
    <div id="sucursales" class="row">
      <!-- Aquí se va a mostrar la info dinámica -->
    </div>
  </div>
</div>

<script>
// Lista de sucursales (puedes agregar todas las que quieras)
const sucursales = [
  {
    telefono: "+52 375 100 3330",
    email: "lapiconeria@gmail.com",
    direccion: "Independencia 49B, 46600 Ameca, Jal."
  },
  {
    telefono: "+52 375 100 3330",
    email: "lapiconeria@gmail.com",
    direccion: "Av. Patria Pnte. 204, 46600 Ameca, Jal."
  },
  {
    telefono: "+52 375 100 3330",
    email: "lapiconeria@gmail.com",
    direccion: "Av Valle de Atemajac 1930, Jardines del Valle, 45138 Zapopan, Jal."
  }
];

let index = 0;
const contenedor = document.getElementById("sucursales");

// Función para renderizar la info de una sucursal
function mostrarSucursal(idx) {
  const suc = sucursales[idx];
  contenedor.innerHTML = `
    <div class="col-md-4 arrow-right">
      <i class="fa fa-volume-control-phone"></i>
      <div class="overflow-hidden">
        <h4>Teléfono:</h4>
        <p class="lead">${suc.telefono}</p>
      </div>
    </div>
    <div class="col-md-4 arrow-right">
      <i class="fa fa-envelope"></i>
      <div class="overflow-hidden">
        <h4>Email</h4>
        <p class="lead">${suc.email}</p>
      </div>
    </div>
    <div class="col-md-4">
      <i class="fa fa-map-marker"></i>
      <div class="overflow-hidden">
        <h4>Location</h4>
        <p class="lead">${suc.direccion}</p>
      </div>
    </div>
  `;
}

// Mostrar la primera sucursal
mostrarSucursal(index);

// Cambiar cada 2 segundos
setInterval(() => {
  index = (index + 1) % sucursales.length; 
  mostrarSucursal(index);
}, 2000);
</script>

	<!-- End Contact info -->
	
	<!-- Start Footer -->
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>Nuestra Sucursales</h3>
					<p>Para obtener un horario detallado de acuerdo a la sucursal verificar en La Piconeria de Ameca google maps en tu sucursal mas cercana.</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Suscribirse</h3>
					<div class="subscribe_form">
						<form class="subscribe_form">
							<input name="EMAIL" id="subs-email" class="form_input" placeholder="Correo Electrónico" type="email">
							<button type="submit" class="submit">SUSCRIBIRSE</button>
							<div class="clearfix"></div>
						</form>
					</div>

					
<ul class="list-inline">
  <!-- Facebook (igual en FA4 y FA6) -->
  <li class="list-inline-item">
    <a href="#">
      <i class="fa fa-facebook fa-brands fa-facebook-f"></i>
    </a>
  </li>

  <!-- X (si no carga FA6, cae en Twitter de FA4) -->
  <li class="list-inline-item">
    <a href="#">
      <i class="fa fa-twitter fa-brands fa-x-twitter"></i>
    </a>
  </li>

  <!-- LinkedIn -->
  <li class="list-inline-item">
    <a href="#">
      <i class="fa fa-linkedin fa-brands fa-linkedin-in"></i>
    </a>
  </li>

  <!-- TikTok (si no carga FA6, cae en Google+ de FA4) -->
  <li class="list-inline-item">
    <a href="#">
      <i class="fa fa-google-plus fa-brands fa-tiktok"></i>
    </a>
  </li>

  <!-- Instagram -->
  <li class="list-inline-item">
    <a href="#">
      <i class="fa fa-instagram fa-brands fa-instagram"></i>
    </a>
  </li>
</ul>


					
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Información de contacto</h3>
					<p class="lead">Independencia 49B, 46600 Ameca, Jal.</p>
					<p class="lead"><a href="#">+52 375 100 3330</a></p>
					<p><a href="#"> lapiconeria@gmail.com</a></p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Horarios de Atención</h3>
					
					<p><span class="text-color">Lunes-Sabado :</span> 9:Am - 8PM</p>
					<p><span class="text-color">Domingos :</span> 9:30Am - 6PM</p>
					
				</div>
			</div>
		</div>
		
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">Todos los derechos reservados. &copy; 2025 <a href="#">La Piconeria de Ameca</a> Design By : 
					<a href="https://www.facebook.com/profile.php?id=61579712559792">Microblogchains</a></p>
					</div>
				</div>
			</div>
		</div>
		
	</footer>
	<!-- End Footer -->
	
	<a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>

	<!-- ALL JS FILES -->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
	<script src="js/jquery.superslides.min.js"></script>
	<script src="js/images-loded.min.js"></script>
	<script src="js/isotope.min.js"></script>
	<script src="js/baguetteBox.min.js"></script>
	<script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
