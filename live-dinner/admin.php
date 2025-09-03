<?php
$conn = new mysqli("localhost", "root", "", "piconerialandingpagedb");
if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

$sql = "SELECT * FROM blog ORDER BY fecha DESC";
$result = $conn->query($sql);
?>

<h2>Administración del Blog</h2>
<p><a href="agregar.php">+ Agregar Nuevo Post</a></p>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Autor</th>
        <th>Fecha</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['titulo']; ?></td>
        <td><?php echo $row['autor']; ?></td>
        <td><?php echo date("d-m-Y", strtotime($row['fecha'])); ?></td>
        <td><img src="images/<?php echo $row['imagen']; ?>" width="100"></td>
        <td>
            <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a> | 
            <a href="eliminar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este post?')">Eliminar</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
