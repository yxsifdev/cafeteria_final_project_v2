<?php
class productController
{
    private $model;

    public function __construct()
    {
        require_once('../../models/productModel.php');
        $this->model = new productModel();
    }

    public function getProducts()
    {
        return $this->model->getProducts();
    }

    public function showProducts()
    {
        return $this->model->getAllProducts();
        // require 'productos.php';
    }
    public function showCart()
    {
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $cart_products = array();

            foreach ($_SESSION['cart'] as $product_id => $quantity) {
                // Obtener los detalles del producto utilizando el método getProductDetails() de la clase ProductModel
                $product = $this->model->getProductDetails($product_id);

                if ($product) {
                    // Agregar el producto al arreglo de productos del carrito
                    $cart_products[] = array(
                        'id' => $product_id,
                        'name' => $product['nombre'], // Asegúrate de ajustar esto según tu estructura de datos
                        'desc' => $product['dsc'], // Asegúrate de ajustar esto según tu estructura de datos
                        'type' => $product['tipo'], // Asegúrate de ajustar esto según tu estructura de datos
                        'price' => $product['precio'], // Asegúrate de ajustar esto según tu estructura de datos
                        'quantity' => $quantity,
                        // Otros detalles del producto que necesites mostrar en el carrito
                    );
                }
            }

            return $cart_products;
        } else {
            return array(); // Si el carrito está vacío, devolver un arreglo vacío
        }
    }
    // productController.php

    public function processPayment($cart_products)
    {
        // Aquí deberías implementar la lógica para procesar el pago de los productos
        // Por ejemplo, podrías guardar los detalles del pedido en la base de datos y luego vaciar el carrito
        // Aquí solo se mostrará un mensaje de confirmación

        // Vaciar el carrito después de procesar el pago
        unset($_SESSION['cart']);

        return "Pago procesado exitosamente. ¡Gracias por su compra!";
    }
}
