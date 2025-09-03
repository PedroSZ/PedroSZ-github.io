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
	
	<!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>¿Quienes Somos?</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->
	
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 text-center">
					<div class="inner-column">
						<h1>Bienvenido <span>Conoce nuestra historia</span></h1>
						<h4>Historia de La Piconeria de Ameca</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
						<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam metus lorem, a pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem pulvinar.</p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<img src="images/img-56.jpg" alt="" class="img-fluid">
				</div>
				<div class="col-md-12">
					<div class="inner-pt">
						<p>Sed tincidunt, neque at egestas imperdiet, nulla sapien blandit nunc, sit amet pulvinar orci nibh ut massa. Proin nec lectus sed nunc placerat semper. Duis hendrerit elit nec sapien porttitor, ut pretium ipsum feugiat. Aenean volutpat porta nisi in gravida. Curabitur pulvinar ligula sed facilisis bibendum. Nullam vitae nulla elit. </p>
						<p>Integer purus velit, eleifend eu magna volutpat, porttitor blandit lectus. Aenean risus odio, efficitur quis erat eget, mattis tristique arcu. Fusce in ante enim. Integer consectetur elit nec laoreet rutrum. Mauris porta turpis nec tellus accumsan pellentesque. Morbi non quam tempus, convallis urna in, cursus mauris. </p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	
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