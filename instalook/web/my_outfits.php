<?php

session_start();

require 'config/database.php';

if(!isset($_SESSION['usuario_id'])){
    header("Location: login.php");
    exit;
}

$stmt = $pdo->prepare(
"
SELECT *
FROM outfits
WHERE usuario_id = ?
ORDER BY fecha_creacion DESC
"
);

$stmt->execute([
    $_SESSION['usuario_id']
]);

$outfits = $stmt->fetchAll(PDO::FETCH_ASSOC);

include 'includes/header.php';
?>

<h1>Mis Outfits</h1>

<br>

<?php if(empty($outfits)): ?>

<p>
    Todavía no tienes outfits guardados.
</p>

<?php else: ?>

<?php foreach($outfits as $outfit): ?>

<div class="product-card">

    <div class="product-card-content">

        <h3>
            <?= htmlspecialchars($outfit['nombre']) ?>
        </h3>

        <p>
            <strong>Parte superior:</strong>
            <?= htmlspecialchars($outfit['parte_superior']) ?>
        </p>

        <p>
            <strong>Parte inferior:</strong>
            <?= htmlspecialchars($outfit['parte_inferior']) ?>
        </p>

        <p>
            <strong>Calzado:</strong>
            <?= htmlspecialchars($outfit['calzado']) ?>
        </p>

        <p>
            <small>
                <?= $outfit['fecha_creacion'] ?>
            </small>
        </p>

    </div>

</div>

<br>

<?php endforeach; ?>

<?php endif; ?>

</main>
</body>
</html>
