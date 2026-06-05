<?php

session_start();

require "config/database.php";

if(!isset($_SESSION["usuario"])){

    die("Debes iniciar sesión");

}

if(empty($_SESSION["carrito"])){

    die("El carrito está vacío");

}

$usuario_id = $_SESSION["usuario"];

$ids = implode(",", $_SESSION["carrito"]);

$stmt = $pdo->query(
    "SELECT *
    FROM productos
    WHERE id IN ($ids)"
);

$productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total = 0;

foreach($productos as $producto){

    $total += $producto["precio"];

}

$stmt = $pdo->prepare(
    "INSERT INTO pedidos
    (usuario_id,total)
    VALUES(?,?)"
);

$stmt->execute([
    $usuario_id,
    $total
]);

$pedido_id = $pdo->lastInsertId();

foreach($productos as $producto){

    $stmt = $pdo->prepare(
        "INSERT INTO detalles_pedido
        (
            pedido_id,
            producto_id,
            cantidad,
            precio
        )
        VALUES
        (
            ?,
            ?,
            ?,
            ?
        )"
    );

    $stmt->execute([
        $pedido_id,
        $producto["id"],
        1,
        $producto["precio"]
    ]);

    $stmt = $pdo->prepare(
        "UPDATE productos
        SET stock = stock - 1
        WHERE id = ?
        AND stock > 0"
    );

    $stmt->execute([
        $producto["id"]
    ]);

}

unset($_SESSION["carrito"]);

include "includes/header.php";
?>

<h1>Pedido realizado correctamente</h1>

<p>
    Gracias por tu compra.
</p>

<p>
    Tu pedido ha sido registrado en el sistema.
</p>

<a href="products.php" class="btn">
    Volver a la tienda
</a>

</main>
</body>
</html>
