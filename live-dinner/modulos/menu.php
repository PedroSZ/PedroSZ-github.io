<?php
// Detecta la página actual
$current_page = basename($_SERVER['PHP_SELF']);

// Función para asignar la clase 'active'
function setActive($page, $current_page) {
    return $page === $current_page ? "active" : "";
}

// Función para grupos (ej: dropdowns)
function setActiveGroup($pages, $current_page) {
    return in_array($current_page, $pages) ? "active" : "";
}
?>

<div class='collapse navbar-collapse' id='navbars-rs-food'>
    <ul class='navbar-nav ml-auto'>
        <li class='nav-item <?= setActive("index.php", $current_page) ?>'>
            <a class='nav-link' href='index.php'>Inicio</a>
        </li>
        <li class='nav-item <?= setActive("menu.php", $current_page) ?>'>
            <a class='nav-link' href='menu.php'>Menu</a>
        </li>
        <li class='nav-item <?= setActive("about.php", $current_page) ?>'>
            <a class='nav-link' href='about.php'>Historia</a>
        </li>

        <!-- Dropdown Pages -->
        <li class='nav-item dropdown <?= setActiveGroup(["reservation.php","stuff.php","gallery.php"], $current_page) ?>'>
            <a class='nav-link dropdown-toggle' href='#' id='dropdown-a' data-toggle='dropdown'>Páginas</a>
            <div class='dropdown-menu' aria-labelledby='dropdown-a'>
                <a class='dropdown-item <?= setActive("reservation.php", $current_page) ?>' href='reservation.php'>Comprar</a>
                <a class='dropdown-item <?= setActive("stuff.php", $current_page) ?>' href='stuff.php'>Equipo</a>
                <a class='dropdown-item <?= setActive("gallery.php", $current_page) ?>' href='gallery.php'>Galeria</a>
            </div>
        </li>

        <!-- Dropdown Blog -->
        <li class='nav-item dropdown <?= setActiveGroup(["blog.php","blog-details.php"], $current_page) ?>'>
            <a class='nav-link dropdown-toggle' href='#' id='dropdown-b' data-toggle='dropdown'>Blog</a>
            <div class='dropdown-menu' aria-labelledby='dropdown-b'>
                <a class='dropdown-item <?= setActive("blog.php", $current_page) ?>' href='blog.php'>Blog</a>
                <a class='dropdown-item <?= setActive("blog-details.php", $current_page) ?>' href='blog-details.php'>Blog Single</a>
            </div>
        </li>

        <li class='nav-item <?= setActive("contact.php", $current_page) ?>'>
            <a class='nav-link' href='contact.php'>Contacto</a>
        </li>
    </ul>
</div>
