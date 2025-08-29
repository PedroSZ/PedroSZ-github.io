<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php
$conexion = new mysqli("localhost", "root", "", "piconerialandingpagedb");
if($conexion->connect_error) die("Error: ".$conexion->connect_error);

// Crear carpeta uploads si no existe
if(!is_dir('uploads')) mkdir('uploads',0777,true);

// --- Procesos (Agregar/Editar/Eliminar como antes) ---
if(isset($_POST['agregar_categoria'])){
    $nombre=trim($_POST['cat_nombre']);
    $slug=trim($_POST['cat_slug']);
    if($nombre && $slug){
        $stmt=$conexion->prepare("SELECT id FROM categorias WHERE slug=?");
        $stmt->bind_param("s",$slug); $stmt->execute(); $stmt->store_result();
        if($stmt->num_rows>0) echo "<div class='alert alert-danger'>Slug ya existe</div>";
        else{
            $stmtInsert=$conexion->prepare("INSERT INTO categorias(nombre,slug) VALUES(?,?)");
            $stmtInsert->bind_param("ss",$nombre,$slug); $stmtInsert->execute();
            echo "<div class='alert alert-success'>Categoría agregada</div>";
        }
    }
}
if(isset($_POST['editar_categoria'])){
    $id=$_POST['cat_id']; $nombre=trim($_POST['cat_nombre']); $slug=trim($_POST['cat_slug']);
    $stmt=$conexion->prepare("UPDATE categorias SET nombre=?, slug=? WHERE id=?");
    $stmt->bind_param("ssi",$nombre,$slug,$id); $stmt->execute();
    echo "<div class='alert alert-success'>Categoría editada</div>";
}
if(isset($_GET['eliminar_categoria'])){
    $id=$_GET['eliminar_categoria']; $conexion->query("DELETE FROM categorias WHERE id=$id");
    echo "<div class='alert alert-success'>Categoría eliminada</div>";
}
if(isset($_POST['agregar_producto'])){
    $nombre=trim($_POST['prod_nombre']); $desc=trim($_POST['prod_desc']); $precio=$_POST['prod_precio']; $cat_id=$_POST['prod_categoria'];
    if(isset($_FILES['prod_imagen']) && $_FILES['prod_imagen']['error']===0){
        $archivo=$_FILES['prod_imagen']; $nombreArchivo=time()."_".basename($archivo['name']); $ruta="uploads/".$nombreArchivo;
        move_uploaded_file($archivo['tmp_name'],$ruta);
        $stmt=$conexion->prepare("INSERT INTO productos(nombre,descripcion,precio,imagen,categoria_id) VALUES(?,?,?,?,?)");
        $stmt->bind_param("ssdsi",$nombre,$desc,$precio,$ruta,$cat_id); $stmt->execute();
        echo "<div class='alert alert-success'>Producto agregado</div>";
    }
}
if(isset($_POST['editar_producto'])){
    $id=$_POST['prod_id']; $nombre=trim($_POST['prod_nombre']); $desc=trim($_POST['prod_desc']); $precio=$_POST['prod_precio']; $cat_id=$_POST['prod_categoria'];
    $ruta=$_POST['prod_imagen_actual'];
    if(isset($_FILES['prod_imagen']) && $_FILES['prod_imagen']['error']===0){
        $archivo=$_FILES['prod_imagen']; $nombreArchivo=time()."_".basename($archivo['name']); $ruta="uploads/".$nombreArchivo;
        move_uploaded_file($archivo['tmp_name'],$ruta);
    }
    $stmt=$conexion->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, imagen=?, categoria_id=? WHERE id=?");
    $stmt->bind_param("ssdssi",$nombre,$desc,$precio,$ruta,$cat_id,$id); $stmt->execute();
    echo "<div class='alert alert-success'>Producto editado</div>";
}
if(isset($_GET['eliminar_producto'])){ $id=$_GET['eliminar_producto']; $conexion->query("DELETE FROM productos WHERE id=$id"); echo "<div class='alert alert-success'>Producto eliminado</div>"; }

// --- Consultas ---
$categorias=$conexion->query("SELECT * FROM categorias");
$productos=$conexion->query("SELECT p.*, c.nombre as cat_nombre FROM productos p LEFT JOIN categorias c ON p.categoria_id=c.id");
?>

<div class="container mt-4">
<h1 class="mb-4">Mini CMS con Modales</h1>

<!-- Agregar Categoría -->
<div class="card mb-3 p-3">
<h4>Agregar Categoría</h4>
<form method="POST" class="row g-2">
<input type="text" name="cat_nombre" class="col form-control" placeholder="Nombre" required>
<input type="text" name="cat_slug" class="col form-control" placeholder="Slug" required>
<button type="submit" name="agregar_categoria" class="btn btn-success col-2">Agregar</button>
</form>
</div>

<!-- Categorías Existentes -->
<h4>Categorías</h4>
<table class="table table-bordered">
<tr><th>ID</th><th>Nombre</th><th>Slug</th><th>Acciones</th></tr>
<?php while($cat=$categorias->fetch_assoc()): ?>
<tr>
<td><?= $cat['id'] ?></td>
<td><?= htmlspecialchars($cat['nombre']) ?></td>
<td><?= htmlspecialchars($cat['slug']) ?></td>
<td>
<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalCat<?= $cat['id'] ?>">Editar</button>
<a href="?eliminar_categoria=<?= $cat['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Eliminar?')">Eliminar</a>
</td>
</tr>

<!-- Modal Editar Categoría -->
<div class="modal fade" id="modalCat<?= $cat['id'] ?>" tabindex="-1" aria-hidden="true">
<div class="modal-dialog"><div class="modal-content p-3">
<form method="POST">
<input type="hidden" name="cat_id" value="<?= $cat['id'] ?>">
<input type="text" name="cat_nombre" class="form-control mb-2" value="<?= htmlspecialchars($cat['nombre']) ?>" required>
<input type="text" name="cat_slug" class="form-control mb-2" value="<?= htmlspecialchars($cat['slug']) ?>" required>
<button type="submit" name="editar_categoria" class="btn btn-primary">Guardar Cambios</button>
</form>
</div></div>
</div>

<?php endwhile; ?>
</table>

<hr>
<!-- Agregar Producto -->
<div class="card mb-3 p-3">
<h4>Agregar Producto</h4>
<form method="POST" enctype="multipart/form-data" class="row g-2">
<input type="text" name="prod_nombre" class="col form-control" placeholder="Nombre" required>
<textarea name="prod_desc" class="col form-control" placeholder="Descripción" required></textarea>
<input type="number" step="0.01" name="prod_precio" class="col form-control" placeholder="Precio" required>
<input type="file" name="prod_imagen" class="col form-control" accept="image/*" required>
<select name="prod_categoria" class="col form-control" required>
<option value="">Seleccione categoría</option>
<?php
$resCat=$conexion->query("SELECT * FROM categorias");
while($c=$resCat->fetch_assoc()): ?>
<option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nombre']) ?></option>
<?php endwhile; ?>
</select>
<button type="submit" name="agregar_producto" class="btn btn-success col-2">Agregar</button>
</form>
</div>

<!-- Productos Existentes -->
<h4>Productos</h4>
<table class="table table-bordered">
<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Categoría</th><th>Imagen</th><th>Acciones</th></tr>
<?php while($p=$productos->fetch_assoc()): ?>
<tr>
<td><?= $p['id'] ?></td>
<td><?= htmlspecialchars($p['nombre']) ?></td>
<td>$<?= $p['precio'] ?></td>
<td><?= htmlspecialchars($p['cat_nombre']) ?></td>
<td><img src="<?= $p['imagen'] ?>" width="50"></td>
<td>
<button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalProd<?= $p['id'] ?>">Editar</button>
<a href="?eliminar_producto=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Eliminar?')">Eliminar</a>
</td>
</tr>

<!-- Modal Editar Producto -->
<div class="modal fade" id="modalProd<?= $p['id'] ?>" tabindex="-1" aria-hidden="true">
<div class="modal-dialog"><div class="modal-content p-3">
<form method="POST" enctype="multipart/form-data">
<input type="hidden" name="prod_id" value="<?= $p['id'] ?>">
<input type="hidden" name="prod_imagen_actual" value="<?= $p['imagen'] ?>">
<input type="text" name="prod_nombre" class="form-control mb-2" value="<?= htmlspecialchars($p['nombre']) ?>" required>
<textarea name="prod_desc" class="form-control mb-2" required><?= htmlspecialchars($p['descripcion']) ?></textarea>
<input type="number" step="0.01" name="prod_precio" class="form-control mb-2" value="<?= $p['precio'] ?>" required>
<input type="file" name="prod_imagen" class="form-control mb-2" accept="image/*">
<select name="prod_categoria" class="form-control mb-2" required>
<?php
$resCat=$conexion->query("SELECT * FROM categorias");
while($c=$resCat->fetch_assoc()):
$sel=($c['id']==$p['categoria_id'])?'selected':'';
?>
<option value="<?= $c['id'] ?>" <?= $sel ?>><?= htmlspecialchars($c['nombre']) ?></option>
<?php endwhile; ?>
</select>
<button type="submit" name="editar_producto" class="btn btn-primary">Guardar Cambios</button>
</form>
</div></div>
</div>

<?php endwhile; ?>
</table>
</div>
