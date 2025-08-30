<?php
// conexión (ajusta según tu configuración)
// conexión (ajusta según tu configuración)
$host = "localhost";
$user = "root";
$pass = "";
$db   = "piconerialandingpagedb"; // <-- cambia al nombre de tu base
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) die("Post no válido.");
$id = intval($_GET['id']);

$sql = "SELECT * FROM blog WHERE id = $id LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows == 0) die("Post no encontrado.");

$post = $result->fetch_assoc();
?>

<div class="container my-5">
    <a href="blog.php" class="btn btn-secondary mb-3">← Volver al Blog</a>
    <div class="blog-detail">
        <h2><?php echo $post['titulo']; ?></h2>
        <ul>
            <li><span>Post by <?php echo $post['autor']; ?></span></li>
            <li>|</li>
            <li><span><?php echo date("d F Y", strtotime($post['fecha'])); ?></span></li>
        </ul>
        <img src="images/<?php echo $post['imagen']; ?>" alt="<?php echo $post['titulo']; ?>" style="width:100%; height:auto; margin-bottom:20px;">
        <div class="blog-content">
            <p><?php echo nl2br($post['contenido']); ?></p>
        </div>
    </div>
</div>