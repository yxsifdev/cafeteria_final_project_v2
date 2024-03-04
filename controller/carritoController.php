<?php
class carritoController
{
    private $model;

    public function __construct()
    {
        require_once('../../models/productModel.php');
        $this->model = new productModel();
    }

    public function showCart()
    {
        require '../views/menu/carrito.php';
    }

    public function addToCart($productId)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]++;
        } else {
            $_SESSION['cart'][$productId] = 1;
        }

        header('Location: ../views/menu/carrito.php');
    }
}
