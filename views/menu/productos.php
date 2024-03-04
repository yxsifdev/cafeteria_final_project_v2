<?php
session_start();
require_once '../../controller/productController.php';

$productModel = new productController();

echo "<h1>Productos</h1>";

// Mostrar todos los productos
$products = $productModel->showProducts();
if (!empty($products)) {
    foreach ($products as $product) {
        echo "<div>";
        echo "<h2>{$product['nombre']}</h2>";
        echo "<p>{$product['dsc']}</p>";
        echo "<p>Precio: {$product['precio']}</p>";
        echo "<img src='{$product['imagen']}' alt='Imagen del producto'>";
        echo "<form action='carrito.php?action=add_to_cart&product_id={$product['idM']}' method='post'>";
        echo "<input type='submit' value='Agregar al carrito'>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "<p>No hay productos disponibles.</p>";
}

