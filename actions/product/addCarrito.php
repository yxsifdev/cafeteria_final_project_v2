<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // Si el usuario no ha iniciado sesión, redirigir a index.php
    header("Location: ../../views/error404.php");
    exit();
}

// Verificar si se ha enviado un ID de producto
if (isset($_POST['product_id'])) {
    // Obtener el ID del producto enviado desde el formulario
    $product_id = $_POST['product_id'];

    // Verificar si la variable de sesión del carrito existe
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Verificar si el producto ya está en el carrito
    if (isset($_SESSION['cart'][$product_id])) {
        // Incrementar la cantidad si el producto ya está en el carrito
        $_SESSION['cart'][$product_id]++;
    } else {
        // Agregar el producto al carrito con una cantidad inicial de 1
        $_SESSION['cart'][$product_id] = 1;
    }

    // Redirigir de vuelta a la página de productos
    header("Location: ../../views/menu/carrito.php");
    exit();
} else {
    // Si no se envió un ID de producto, redirigir a la página de inicio
    header("Location: ../../views/menu/shop.php");
    exit();
}
