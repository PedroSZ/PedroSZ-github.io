<?php
$conn = new mysqli("localhost", "root", "", "piconerialandingpagedb");
if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

if(!isset($_GET['id']) || !is_numeric($_GET['id'])) die("Post no válido.");
$id = intval($_GET['id']);

// Primero borrar imagen del servidor
$res = $conn->query("SELECT imagen FROM blog WHERE id=$id LIMIT 1");
if($res->num_rows){
    $row = $res->fetch_assoc();
    @unlink("images/".$row['imagen']);
}

// Borrar registro de la base
$conn->query("DELETE FROM blog WHERE id=$id");

header("Location: admin.php");
exit;
