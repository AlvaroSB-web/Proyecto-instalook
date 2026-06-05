<?php

session_start();

require "../config/database.php";

$id =
$_GET["id"];

$sql =
"DELETE FROM productos
WHERE id=?";

$stmt =
$pdo->prepare($sql);

$stmt->execute([$id]);

header(
"Location: products.php"
);
