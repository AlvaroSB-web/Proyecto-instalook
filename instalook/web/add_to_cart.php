<?php

session_start();

if (!isset($_GET['id'])) {

    header("Location: products.php");
    exit;
}

$id = (int) $_GET['id'];

if (!isset($_SESSION['carrito'])) {

    $_SESSION['carrito'] = [];
}

$_SESSION['carrito'][] = $id;

header("Location: cart.php");
exit;
