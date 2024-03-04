<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Si el usuario no ha iniciado sesión, redirigir a index.php
    header("Location: ../../views/error404.php");
    exit();
}

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Verificar si el producto está en el carrito
    if (isset($_SESSION['cart'][$product_id])) {
        // Si el producto está en el carrito y tiene más de una unidad, reducir la cantidad en 1
        if ($_SESSION['cart'][$product_id] > 1) {
            $_SESSION['cart'][$product_id]--;
        } else {
            // Si el producto tiene solo una unidad, eliminarlo completamente del carrito
            unset($_SESSION['cart'][$product_id]);
        }
    }

    // Redirigir de vuelta a la página del carrito
    header("Location: ../../views/menu/carrito.php");
    exit();
} else {
    // Si no se envió un ID de producto válido, redirigir a la página de inicio
    header("Location: ../../views/menu/shop.php");
    exit();
}
