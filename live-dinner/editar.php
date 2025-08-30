<?php
$conn = new mysqli("localhost", "root", "", "piconerialandingpagedb");
if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) die("Post no válido.");
$id = intval($_GET['id']);

$result = $conn->query("SELECT * FROM blog WHERE id = $id LIMIT 1");
if($result->num_rows == 0) die("Post no encontrado.");

$post = $result->fetch_assoc();

function guardar_imagen($archivo, $carpeta_destino) {
    $nombreArchivo = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', time().'_'.$archivo['name']);
    $rutaDestino = $carpeta_destino . '/' . $nombreArchivo;
    return move_uploaded_file($archivo['tmp_name'], $rutaDestino) ? $nombreArchivo : false;
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $autor  = $conn->real_escape_string($_POST['autor']);
    $fecha  = $_POST['fecha'];
    $contenido = $conn->real_escape_string($_POST['contenido']);
    $resumen = empty($_POST['resumen']) ? substr(strip_tags($contenido),0,150)."..." : $conn->real_escape_string($_POST['resumen']);

    $imagen = $post['imagen']; // mantener imagen antigua
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error']===0){
        $nuevoArchivo = guardar_imagen($_FILES['imagen'], "images");
        if($nuevoArchivo) $imagen = $nuevoArchivo;
    }

    $sql = "UPDATE blog SET titulo='$titulo', autor='$autor', fecha='$fecha', contenido='$contenido', resumen='$resumen', imagen='$imagen' WHERE id=$id";
    echo $conn->query($sql) ? "<p style='color:green;'>Post actualizado!</p>" : "<p style='color:red;'>Error: ".$conn->error."</p>";
}

?>

<h2>Editar Post</h2>
<form action="" method="post" enctype="multipart/form-data">
    <p>Título: <input type="text" name="titulo" value="<?php echo $post['titulo']; ?>" required></p>
    <p>Autor: <input type="text" name="autor" value="<?php echo $post['autor']; ?>" required></p>
    <p>Fecha: <input type="date" name="fecha" value="<?php echo $post['fecha']; ?>" required></p>
    <p>Resumen:<br><textarea name="resumen" rows="3"><?php echo $post['resumen']; ?></textarea></p>
    <p>Contenido:<br><textarea name="contenido" rows="6" required><?php echo $post['contenido']; ?></textarea></p>
    <p>Imagen actual:<br><img src="images/<?php echo $post['imagen']; ?>" width="150"></p>
    <p>Cambiar imagen: <input type="file" name="imagen" accept="image/*"></p>
    <p><input type="submit" value="Actualizar"></p>
</form>
