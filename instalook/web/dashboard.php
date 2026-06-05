<?php
session_start();

if(!isset($_SESSION['usuario_id'])){
    header("Location: login.php");
    exit;
}
?>

<?php include 'includes/header.php'; ?>

<section class="hero">

    <h1>
        Hola <?= htmlspecialchars($_SESSION['nombre']) ?>
    </h1>

    <p>
        Bienvenido a tu cuenta de InstaLook.
    </p>

</section>

<div class="products-grid">

    <div class="product-card">

        <div class="product-card-content">

            <h3>Mi Perfil</h3>

            <p>
                Gestiona tu cuenta y consulta tu información.
            </p>

        </div>

    </div>

    <div class="product-card">

        <div class="product-card-content">

            <h3>Carrito</h3>

            <p>
                Revisa los productos añadidos antes de finalizar tu compra.
            </p>

            <br>

            <a
                href="cart.php"
                class="btn"
            >
                Ver Carrito
            </a>

        </div>

    </div>

    <div class="product-card">

        <div class="product-card-content">

            <h3>Mis Outfits</h3>

            <p>
                Consulta los outfits creados desde la aplicación Java.
            </p>

            <br>

            <a
                href="my_outfits.php"
                class="btn"
            >
                Ver Outfits
            </a>

        </div>

    </div>

    <div class="product-card">

        <div class="product-card-content">

            <h3>Outfit Generator</h3>

            <p>
                Descarga la aplicación Java para crear y guardar outfits personalizados utilizando los productos de InstaLook.
            </p>

            <br>

            <a
                href="/downloads/instalook-manager.jar"
                class="btn"
            >
                Descargar Aplicación
            </a>

        </div>

    </div>

</div>

</main>
</body>
</html>
