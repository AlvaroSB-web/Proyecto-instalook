<?php
session_start();

if(
    !isset($_SESSION['email']) ||
    $_SESSION['email'] !== 'admin@instalook.com'
){
    die("Access denied");
}
?>

<?php include '../includes/header.php'; ?>

<h1>Panel de Administración</h1>

<br>

<div class="products-grid">

    <div class="product-card">
        <div class="product-card-content">

            <h3>Productos</h3>

            <p>
                Gestionar catálogo.
            </p>

            <br>

            <a href="products.php" class="btn">
                Gestionar
            </a>

        </div>
    </div>

    <div class="product-card">
        <div class="product-card-content">

            <h3>Usuarios</h3>

            <p>
                Próximamente.
            </p>

        </div>
    </div>

    <div class="product-card">
        <div class="product-card-content">

            <h3>Pedidos</h3>

            <p>
                Próximamente.
            </p>

        </div>
    </div>

</div>

</main>
</body>
</html>
