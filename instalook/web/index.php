<?php include 'includes/header.php'; ?>

<section class="hero">

    <h1>InstaLook</h1>

    <p>
        Descubre las últimas tendencias en moda.
    </p>

    <a href="products.php" class="btn">
        Ver Productos
    </a>

</section>

<?php if(!isset($_SESSION['usuario_id'])): ?>

<section>

    <h2>¿Por qué InstaLook?</h2>

    <br>

    <p>
        Regístrate para acceder a productos exclusivos y gestionar tus pedidos.
    </p>

</section>

<?php endif; ?>

</main>

</body>
</html>
