<?php
session_start();
require '../config/database.php';

if (
    !isset($_SESSION['email']) ||
    $_SESSION['email'] !== 'admin@instalook.com'
){
    die("Access denied");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $imagen = "";

    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){

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
        "INSERT INTO productos
        (nombre, descripcion, precio, imagen, stock)
        VALUES (?, ?, ?, ?, ?)"
    );

    $stmt->execute([
        $nombre,
        $descripcion,
        $precio,
        $imagen,
        $stock
    ]);

    header("Location: products.php");
    exit;
}
?>

<?php include '../includes/header.php'; ?>

<h1>Nuevo Producto</h1>

<form method="POST" enctype="multipart/form-data">

    <input
        type="text"
        name="nombre"
        placeholder="Nombre"
        required
    >

    <br><br>

    <textarea
        name="descripcion"
        placeholder="Descripción"
        rows="4"
        required
    ></textarea>

    <br><br>

    <input
        type="number"
        step="0.01"
        name="precio"
        placeholder="Precio"
        required
    >

    <br><br>

    <input
        type="number"
        name="stock"
        placeholder="Stock"
        required
    >

    <br><br>

    <input
        type="file"
        name="imagen"
        accept="image/*"
        required
    >

    <br><br>

    <button type="submit">
        Crear Producto
    </button>

</form>

</main>
</body>
</html>
