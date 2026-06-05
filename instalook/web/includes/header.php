<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLogged = isset($_SESSION['usuario_id']);

$isAdmin = isset($_SESSION['rol']) &&
           $_SESSION['rol'] === 'admin';

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>InstaLook</title>

    <link rel="stylesheet" href="/style.css">

</head>

<body>

<header class="navbar">

    <div class="logo">

        <a href="/index.php">
            InstaLook
        </a>

    </div>

    <nav>

        <?php if (!$isLogged): ?>

            <a href="/index.php">
                Inicio
            </a>

            <a href="/products.php">
                Productos
            </a>

            <a href="/login.php">
                Login
            </a>

            <a href="/register.php">
                Registro
            </a>

        <?php elseif ($isAdmin): ?>

            <a href="/admin/index.php">
                Panel Admin
            </a>

            <a href="/admin/products.php">
                Productos
            </a>

            <a href="/logout.php">
                Cerrar sesión
            </a>

        <?php else: ?>

            <a href="/index.php">
                Inicio
            </a>

            <a href="/products.php">
                Productos
            </a>

            <a href="/cart.php">
                Carrito
            </a>

            <a href="/dashboard.php">
                Mi cuenta
            </a>

            <a href="/logout.php">
                Cerrar sesión
            </a>

        <?php endif; ?>

    </nav>

</header>

<main class="container">
