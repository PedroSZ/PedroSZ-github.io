<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "piconerialandingpagedb");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Traer categorías
$sqlCat = "SELECT * FROM categorias";
$resCat = $conexion->query($sqlCat);

$categorias = [];
if ($resCat->num_rows > 0) {
    while($row = $resCat->fetch_assoc()) {
        $categorias[] = $row;
    }
}

// Traer productos
$sqlProd = "SELECT * FROM productos";
$resProd = $conexion->query($sqlProd);

$productos = [];
if ($resProd->num_rows > 0) {
    while($row = $resProd->fetch_assoc()) {
        $productos[] = $row;
    }
}
?>


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
	
	<!-- Start All Pages -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Galeria</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End All Pages -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Nuestros Productos</h2>
						<p>Disfruta de esta galería de fotos que hemos preparado para ti</p>
					</div>
				</div>
			</div>
			
							<div class="row inner-menu-box">
    <!-- Menú lateral -->
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <?php foreach ($categorias as $index => $cat): ?>
                <a class="nav-link <?= $index == 0 ? 'active' : '' ?>"
                   id="v-pills-<?= $cat['slug'] ?>-tab"
                   data-toggle="pill"
                   href="#v-pills-<?= $cat['slug'] ?>"
                   role="tab"
                   aria-controls="v-pills-<?= $cat['slug'] ?>"
                   aria-selected="<?= $index == 0 ? 'true' : 'false' ?>">
                    <?= $cat['nombre'] ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Contenido -->
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">

            <?php foreach ($categorias as $index => $cat): ?>
                <div class="tab-pane fade <?= $index == 0 ? 'show active' : '' ?>" 
                     id="v-pills-<?= $cat['slug'] ?>" role="tabpanel">

                    <div class="row">
                        <?php foreach ($productos as $p): ?>
                            <?php if ($cat['slug'] == 'home' || $p['categoria'] == $cat['slug']): ?>
                                <div class="col-lg-4 col-md-6 special-grid">
                                    <div class="gallery-single fix">
                                        <img src="<?= $p['imagen'] ?>" class="img-fluid" alt="<?= $p['nombre'] ?>">
                                        <div class="why-text">
                                            <h4><?= $p['nombre'] ?></h4>
                                            <p><?= $p['descripcion'] ?></p>
                                            <h5>$<?= $p['precio'] ?></h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>




		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						“ Visítanos en cualquiera de nuestras sucursales, te esperamos con los brazos abiertos. ”
					</p>
					<span class="lead">Atención de calidad</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->


	<?php
// 🔑 Configuración DB
$host = "localhost";
$user = "root";
$pass = "";
$db   = "piconerialandingpagedb";

/*
$host   = '162.241.203.102';
$db     = 'danie384_lapiconerialandingpagedb';
$user   = 'danie384_user';
$pass   = 'Piconeria2025@';
$charset= 'utf8_spanish2_ci';

*/

// Conectar a MySQL
$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// 🔄 Obtener reseñas guardadas en la DB (10 aleatorias)
$reviews = [];
$stmt = $mysqli->prepare("SELECT * FROM google_reviews ORDER BY RAND() LIMIT 10");
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}

// ⭐ Generar HTML para el carrusel
$reviewsHtml = "";
$active = "active";

foreach ($reviews as $review) {
    $stars = str_repeat("⭐", $review['rating']);
    $reviewsHtml .= '
    <div class="carousel-item text-center '.$active.'">
        <div class="img-box p-1 border rounded-circle m-auto" style="width:100px;height:100px;overflow:hidden;">
            <img class="d-block w-100 rounded-circle" src="'.$review['photo'].'" alt="'.$review['author'].'">
        </div>
        <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">'.$review['author'].'</strong></h5>
        <h6 class="text-dark m-0">'.$stars.' - '.$review['place_name'].'</h6>
        <p class="m-0 pt-3">'.$review['text'].'</p>
    </div>';
    $active = ""; // solo el primero es activo
}
?>
	
	<!-- Start Customer Reviews -->
	<!-- ---------------------------------------------------------------Start Customer Reviews -->
	 <div class="customer-reviews-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Opiniones de nuestros clientes</h2>
                        <p>Nuestros clientes respaldan la calidad de nuestros productos</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center">
                    <div id="reviews" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner mt-4">
                            <?php echo $reviewsHtml ?: "<p>No hay reseñas disponibles</p>"; ?>
                        </div>
                        <a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- ---------------------------------------------------------------------End Customer Reviews -->
	<!-- End Customer Reviews -->
	
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