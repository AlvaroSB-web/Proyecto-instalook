<?php

session_start();

require '../config/database.php';

if(
    !isset($_SESSION['email']) ||
    $_SESSION['email'] !== 'admin@instalook.com'
){
    die("Access denied");
}

$stmt = $pdo->query(
    "SELECT * FROM productos ORDER BY id DESC"
);

$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

include '../includes/header.php';

?>

<h1>Gestión de Productos</h1>

<br>

<a href="create_product.php" class="btn">
    + Nuevo Producto
</a>

<br><br>

<table class="admin-table">

<tr>
    <th>Imagen</th>
    <th>ID</th>
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Acciones</th>
</tr>

<?php foreach($productos as $producto): ?>

<tr>

    <td>

        <?php if(!empty($producto['imagen'])): ?>

            <img
                src="../<?= htmlspecialchars($producto['imagen']) ?>"
                width="80"
            >

        <?php endif; ?>

    </td>

    <td>
        <?= $producto['id'] ?>
    </td>

    <td>
        <?= htmlspecialchars($producto['nombre']) ?>
    </td>

    <td>
        <?= htmlspecialchars($producto['descripcion']) ?>
    </td>

    <td>
        <?= number_format($producto['precio'],2) ?> €
    </td>

    <td>
        <?= $producto['stock'] ?>
    </td>

    <td>

        <a href="edit_product.php?id=<?= $producto['id'] ?>">
            Editar
        </a>

        |

        <a
            href="delete_product.php?id=<?= $producto['id'] ?>"
            onclick="return confirm('¿Eliminar producto?')"
        >
            Eliminar
        </a>

    </td>

</tr>

<?php endforeach; ?>

</table>

</main>
</body>
</html>
