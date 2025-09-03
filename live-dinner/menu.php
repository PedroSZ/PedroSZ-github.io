<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "piconerialandingpagedb");
if ($conexion->connect_error) { die("Error de conexión: " . $conexion->connect_error); }

// Traer categorías (aseguramos un orden estable)
$sqlCat = "SELECT * FROM categorias ORDER BY id ASC";
$resCat = $conexion->query($sqlCat);

$categorias = [];
if ($resCat && $resCat->num_rows > 0) {
    while($row = $resCat->fetch_assoc()) { $categorias[] = $row; }
}

// Traer productos (no hace falta JOIN para filtrar por ID)
$sqlProd = "SELECT * FROM productos";
$resProd = $conexion->query($sqlProd);

$productos = [];
if ($resProd && $resProd->num_rows > 0) {
    while($row = $resProd->fetch_assoc()) { $productos[] = $row; }
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
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="images/logo.png" alt="Tradición para tu mesa" class="mi-logo" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<?php include_once "modulos/menu.php"; ?>
			</div>
		</nav>
	</header>
	
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Galería</h1>
				</div>
			</div>
		</div>
	</div>
	
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
			    <div class="col-12 col-md-3 mb-3 mb-md-0">
			        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			            <?php foreach ($categorias as $index => $cat): 
                            // Usamos un ID seguro basado en el ID numérico (no en el slug)
                            $tabId = 'v-pills-cat-' . (int)$cat['id'];
                        ?>
			                <a class="nav-link <?= $index == 0 ? 'active' : '' ?>"
			                   id="<?= $tabId ?>-tab"
			                   data-toggle="pill"
			                   href="#<?= $tabId ?>"
			                   role="tab"
			                   aria-controls="<?= $tabId ?>"
			                   aria-selected="<?= $index == 0 ? 'true' : 'false' ?>">
			                    <?= htmlspecialchars($cat['nombre'] ?? '') ?>
			                </a>
			            <?php endforeach; ?>
			        </div>
			    </div>

			    <!-- Contenido -->
			    <div class="col-12 col-md-9">
			        <div class="tab-content" id="v-pills-tabContent">

			            <?php foreach ($categorias as $index => $cat):
                            $tabId = 'v-pills-cat-' . (int)$cat['id'];
                            $esTodo = isset($cat['slug']) && strtolower($cat['slug']) === 'home'; // "TODO"
                        ?>
			                <div class="tab-pane fade <?= $index == 0 ? 'show active' : '' ?>" 
			                     id="<?= $tabId ?>" role="tabpanel" aria-labelledby="<?= $tabId ?>-tab">

			                    <div class="row">
			                        <?php
                                    $hayProductos = false;
			                        foreach ($productos as $p):
                                        $pertenece = $esTodo || ((int)$p['categoria_id'] === (int)$cat['id']);
                                        if ($pertenece):
                                            $hayProductos = true; ?>
			                                <div class="col-lg-4 col-md-6 mb-4">
			                                    <div class="gallery-single fix">
			                                        <img src="<?= htmlspecialchars($p['imagen'] ?? '') ?>" class="img-fluid" alt="<?= htmlspecialchars($p['nombre'] ?? '') ?>">
			                                        <div class="why-text">
			                                            <h4><?= htmlspecialchars($p['nombre'] ?? '') ?></h4>
			                                            <p><?= htmlspecialchars($p['descripcion'] ?? '') ?></p>
			                                            <h5>$<?= number_format((float)$p['precio'], 2) ?></h5>
			                                        </div>
			                                    </div>
			                                </div>
			                            <?php endif; 
                                    endforeach; 
                                    if (!$hayProductos): ?>
                                        <div class="col-12">
                                            <p class="text-muted mb-0">No hay productos en esta categoría.</p>
                                        </div>
                                    <?php endif; ?>
			                    </div>

			                </div>
			            <?php endforeach; ?>

			        </div>
			    </div>
			</div>
		</div>
	</div>

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