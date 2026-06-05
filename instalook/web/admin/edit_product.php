<?php
session_start();
require '../config/database.php';

$id = $_GET['id'];

$stmt = $pdo->prepare(
    "SELECT * FROM productos WHERE id=?"
);

$stmt->execute([$id]);

$producto = $stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $imagen = $producto['imagen'];

    if(
        isset($_FILES['imagen']) &&
        $_FILES['imagen']['error'] == 0
    ){

        $nombreArchivo =
            time() . "_" .
            basename($_FILES['imagen']['name']);

        move_uploaded_file(
            $_FILES['imagen']['tmp_name'],
            "../images/" . $nombreArchivo
        );

        $imagen =
            "images/" . $nombreArchivo;
    }

    $stmt = $pdo->prepare(
        "UPDATE productos
        SET nombre=?,
            descripcion=?,
            precio=?,
            imagen=?,
            stock=?
        WHERE id=?"
    );

    $stmt->execute([
        $nombre,
        $descripcion,
        $precio,
        $imagen,
        $stock,
        $id
    ]);

    header("Location: products.php");
    exit;
}
?>

<?php include '../includes/header.php'; ?>

<h1>Editar Producto</h1>

<form method="POST" enctype="multipart/form-data">

    <input
        type="text"
        name="nombre"
        value="<?= htmlspecialchars($producto['nombre']) ?>"
        required
    >

    <br><br>

    <textarea
        name="descripcion"
        rows="4"
        required
    ><?= htmlspecialchars($producto['descripcion']) ?></textarea>

    <br><br>

    <input
        type="number"
        step="0.01"
        name="precio"
        value="<?= $producto['precio'] ?>"
        required
    >

    <br><br>

    <input
        type="number"
        name="stock"
        value="<?= $producto['stock'] ?>"
        required
    >

    <br><br>

    <?php if(!empty($producto['imagen'])): ?>

        <img
            src="../<?= $producto['imagen'] ?>"
            width="150"
        >

        <br><br>

    <?php endif; ?>

    <input
        type="file"
        name="imagen"
        accept="image/*"
    >

    <br><br>

    <button type="submit">
        Guardar Cambios
    </button>

</form>

</main>
</body>
</html>
