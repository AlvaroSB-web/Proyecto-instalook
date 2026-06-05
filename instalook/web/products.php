<?php

session_start();

require 'config/database.php';

include 'includes/header.php';

$stmt = $pdo->query(
    "SELECT * FROM productos ORDER BY id DESC"
);

$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<h1>Nuestros Productos</h1>

<br><br>

<div class="products-grid">

<?php foreach($productos as $producto): ?>

    <div class="product-card">

        <img
    src="<?= htmlspecialchars($producto['imagen']) ?>"
    alt="<?= htmlspecialchars($producto['nombre']) ?>"
    style="width:100%;height:250px;object-fit:cover;"
>

        <div class="product-card-content">

            <h3>
                <?= htmlspecialchars($producto['nombre']) ?>
            </h3>

            <p>
                <?= htmlspecialchars($producto['descripcion']) ?>
            </p>

		<p>
    Stock disponible:
    <?= $producto['stock'] ?>
</p>

            <div class="price">
                <?= number_format($producto['precio'],2) ?> €
            </div>

            <br>

            <?php if($producto['stock'] > 0): ?>

    <a
        href="add_to_cart.php?id=<?= $producto['id'] ?>"
        class="btn"
    >
        Añadir al carrito
    </a>

<?php else: ?>

    <button
        class="btn"
        disabled
    >
        Sin stock
    </button>

<?php endif; ?>
        </div>

    </div>

<?php endforeach; ?>

</div>

</main>
</body>
</html>
