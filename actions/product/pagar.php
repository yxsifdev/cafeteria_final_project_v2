<?php
// processPayment.php

require_once("../../controller/productController.php");
session_start();

$productController = new productController();
$message = $productController->processPayment($_SESSION['cart_products']);

// Redirigir de vuelta a la página del carrito con un mensaje de confirmación
$_SESSION['message'] = $message;
header("Location: ../../views/menu/carrito.php");
exit();
