<?php

session_start();

require "config/database.php";

require "includes/header.php";

if(
empty($_SESSION["carrito"])
){

echo "<p>Cart empty</p>";

exit;
}

$ids =
implode(
",",
$_SESSION["carrito"]
);

$sql =
"SELECT *
FROM productos
WHERE id IN ($ids)";

$stmt =
$pdo->query($sql);

$productos =
$stmt->fetchAll();

$total = 0;
?>

<h2>Shopping Cart</h2>

<?php foreach($productos as $producto): ?>

<p>

<?= $producto['nombre'] ?>

-

€<?= $producto['precio'] ?>

</p>

<?php

$total +=
$producto['precio'];

?>

<?php endforeach; ?>

<hr>

<h3>

Total:

€<?= $total ?>

</h3>

<a href="order_pending.php" class="btn">

Confirm Order

</a>

</a>
