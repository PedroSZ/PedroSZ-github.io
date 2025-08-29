

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
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
     <!-- Site Metas -->
    <title>La Piconeria de Ameca</title>  
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
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
					<img src="images/Logo.png" alt="Tradición para tu meza" class="mi-logo" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<?php include_once "modulos/menu.php"; ?>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-left">
				<img src="images/cabeceraPicon.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Bienvenido a <br> La Piconeria de Ameca</strong></h1>
							<p class="m-b-40">¡De nuestro horno a tu mesa! disfruta el aroma y el sabor único de nuestro picón artesanal  <br> 
							 hecho con pasion en cada rebanada.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Comprar</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="images/cabeceraPicon2.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Bienvenido a <br> La Piconeria de Ameca</strong></h1>
							<p class="m-b-40">picones de nuez con pasas, picones de diferentes rellenos: <br> 
							guayabate, membrillo, frutos secos, chocolate, arandanos, nuez con membrillo, picon integral.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Comprar</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="images/cabeceraPicon3.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Bienvenido a <br> La Piconeria de Ameca</strong></h1>
							<p class="m-b-40">galletas de diferentes sabores y una gran variedad de pane dulce tradicional  <br> 
							conchas, cuernos, biskets, cemas, polvorones, cajitas, panquets, orejas, roles, etc.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Comprar</a></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->
	
	<!-- Start About -->
	<div class="about-section-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-12 text-center">
					<div class="inner-column">
						<h1>Bienvenidos a <span>La Piconeria de Ameca</span></h1>
						<h4>Reseña</h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque auctor suscipit feugiat. Ut at pellentesque ante, sed convallis arcu. Nullam facilisis, eros in eleifend luctus, odio ante sodales augue, eget lacinia lectus erat et sem. </p>
						<p>Sed semper orci sit amet porta placerat. Etiam quis finibus eros. Sed aliquam metus lorem, a pellentesque tellus pretium a. Nulla placerat elit in justo vestibulum, et maximus sem pulvinar.</p>
						<a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Comprar</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<img src="images/about-img.jpg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
	<!-- End About -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						" Si visitas Ameca sin probar el delicioso picón de la piconeria, es como si no hubieras visitado Ameca. "
					</p>
					<span class="lead">Fabiola Prado</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Algunos de nuetros productos</h2>
						<p>En la piconería puedes encontrar un gran surtido de productos</p>
					</div>
				</div>
			</div>
			
			<?php
// Lista de categorías (para el menú lateral)
$categorias = [
    "home"      => "Mostrar Todo",
    "profile"   => "Picones",
    "messages"  => "Pan Dulce",
    "messages2" => "Galletas",
    "settings"  => "Bebidas"
];

// Lista de productos
$productos = [
    ["img" => "images/img-01.jpg", "titulo" => "Special Drinks 1", "desc" => "Sed id magna vitae eros sagittis euismod.", "precio" => "7.79", "cat" => "profile"],
    ["img" => "images/img-02.jpg", "titulo" => "Special Drinks 2", "desc" => "Sed id magna vitae eros sagittis euismod.", "precio" => "9.79", "cat" => "profile"],
    ["img" => "images/img-03.jpg", "titulo" => "Special Drinks 3", "desc" => "Sed id magna vitae eros sagittis euismod.", "precio" => "10.79", "cat" => "profile"],
    
    ["img" => "images/img-04.jpg", "titulo" => "Special Lunch 1", "desc" => "Sed id magna vitae eros sagittis euismod.", "precio" => "15.79", "cat" => "messages"],
    ["img" => "images/img-05.jpg", "titulo" => "Special Lunch 2", "desc" => "Sed id magna vitae eros sagittis euismod.", "precio" => "18.79", "cat" => "messages"],
    ["img" => "images/img-06.jpg", "titulo" => "Special Lunch 3", "desc" => "Sed id magna vitae eros sagittis euismod.", "precio" => "20.79", "cat" => "messages"],

    ["img" => "images/img-50.jpg", "titulo" => "Special Galleta 1", "desc" => "Sed id magna vitae eros sagittis euismod.", "precio" => "15.79", "cat" => "messages2"],
    ["img" => "images/img-51.jpg", "titulo" => "Special Galleta 2", "desc" => "Sed id magna vitae eros sagittis euismod.", "precio" => "18.79", "cat" => "messages2"],
    ["img" => "images/img-52.jpg", "titulo" => "Special Galleta 3", "desc" => "Sed id magna vitae eros sagittis euismod.", "precio" => "20.79", "cat" => "messages2"],

    ["img" => "images/img-07.jpg", "titulo" => "Special Dinner 1", "desc" => "Sed id magna vitae eros sagittis euismod.", "precio" => "25.79", "cat" => "settings"],
    ["img" => "images/img-08.jpg", "titulo" => "Special Dinner 2", "desc" => "Sed id magna vitae eros sagittis euismod.", "precio" => "22.79", "cat" => "settings"],
    ["img" => "images/img-09.jpg", "titulo" => "Special Dinner 3", "desc" => "Sed id magna vitae eros sagittis euismod.", "precio" => "24.79", "cat" => "settings"]
];
?>

<div class="row inner-menu-box">
    <!-- Menú lateral -->
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <?php foreach ($categorias as $id => $nombre): ?>
                <a class="nav-link <?= $id == 'home' ? 'active' : '' ?>" 
                   id="v-pills-<?= $id ?>-tab" 
                   data-toggle="pill" 
                   href="#v-pills-<?= $id ?>" 
                   role="tab" 
                   aria-controls="v-pills-<?= $id ?>" 
                   aria-selected="<?= $id == 'home' ? 'true' : 'false' ?>">
                    <?= $nombre ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Contenido -->
    <div class="col-9">
        <div class="tab-content" id="v-pills-tabContent">

            <!-- Tab "Mostrar Todo" -->
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel">
                <div class="row">
                    <?php foreach ($productos as $p): ?>
                        <div class="col-lg-4 col-md-6 special-grid">
                            <div class="gallery-single fix">
                                <img src="<?= $p['img'] ?>" class="img-fluid" alt="<?= $p['titulo'] ?>">
                                <div class="why-text">
                                    <h4><?= $p['titulo'] ?></h4>
                                    <p><?= $p['desc'] ?></p>
                                    <h5>$<?= $p['precio'] ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Tabs por categoría -->
            <?php foreach ($categorias as $id => $nombre): if ($id == 'home') continue; ?>
                <div class="tab-pane fade" id="v-pills-<?= $id ?>" role="tabpanel">
                    <div class="row">
                        <?php foreach ($productos as $p): ?>
                            <?php if ($p['cat'] == $id): ?>
                                <div class="col-lg-4 col-md-6 special-grid">
                                    <div class="gallery-single fix">
                                        <img src="<?= $p['img'] ?>" class="img-fluid" alt="<?= $p['titulo'] ?>">
                                        <div class="why-text">
                                            <h4><?= $p['titulo'] ?></h4>
                                            <p><?= $p['desc'] ?></p>
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
	
	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Galeria de Productos</h2>
						<p>Visite alguna de nuestras sucursales para ver más productos.</p>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-01.jpg">
							<img class="img-fluid" src="images/gallery-img-01.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-02.jpg">
							<img class="img-fluid" src="images/gallery-img-02.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-03.jpg">
							<img class="img-fluid" src="images/gallery-img-03.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-04.jpg">
							<img class="img-fluid" src="images/gallery-img-04.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-05.jpg">
							<img class="img-fluid" src="images/gallery-img-05.jpg" alt="Gallery Images">
						</a>
					</div> 
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-06.jpg">
							<img class="img-fluid" src="images/gallery-img-06.jpg" alt="Gallery Images">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->
	
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