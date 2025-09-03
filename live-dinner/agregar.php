<?php
$conn = new mysqli("localhost", "root", "", "piconerialandingpagedb");
if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

function guardar_imagen($archivo, $carpeta_destino) {
    $nombreArchivo = preg_replace('/[^A-Za-z0-9_\-\.]/', '_', time().'_'.$archivo['name']);
    $rutaDestino = $carpeta_destino . '/' . $nombreArchivo;

    if(move_uploaded_file($archivo['tmp_name'], $rutaDestino)){
        return $nombreArchivo;
    } else {
        return false;
    }
}

if($_SERVER['REQUEST_METHOD']==='POST'){
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $autor  = $conn->real_escape_string($_POST['autor']);
    $fecha  = $_POST['fecha'];
    $contenido = $conn->real_escape_string($_POST['contenido']);
    $resumen = empty($_POST['resumen']) ? substr(strip_tags($contenido),0,150)."..." : $conn->real_escape_string($_POST['resumen']);

    if(isset($_FILES['imagen']) && $_FILES['imagen']['error']===0){
        $nombreArchivo = guardar_imagen($_FILES['imagen'], "images");

        if($nombreArchivo){
            $sql = "INSERT INTO blog (titulo, autor, fecha, imagen, resumen, contenido) 
                    VALUES ('$titulo','$autor','$fecha','$nombreArchivo','$resumen','$contenido')";
            echo $conn->query($sql) ? "<p style='color:green;'>Post agregado correctamente!</p>" : "<p style='color:red;'>Error: ".$conn->error."</p>";
        } else {
            echo "<p style='color:red;'>Error al guardar la imagen.</p>";
        }
    } else { 
        echo "<p style='color:red;'>Selecciona una imagen válida.</p>";
    }
}
?>

<h2>Agregar Post</h2>
<form action="" method="post" enctype="multipart/form-data">
    <p>Título: <input type="text" name="titulo" required></p>
    <p>Autor: <input type="text" name="autor" value="Admin" required></p>
    <p>Fecha: <input type="date" name="fecha" value="<?php echo date('Y-m-d'); ?>" required></p>
    <p>Resumen (opcional):<br><textarea name="resumen" rows="3"></textarea></p>
    <p>Contenido:<br><textarea name="contenido" rows="6" required></textarea></p>
    <p>Imagen: <input type="file" name="imagen" accept="image/*" required></p>
    <p><input type="submit" value="Agregar"></p>
</form>
