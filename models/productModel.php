<?php

class productModel
{
    private $connection;


    public function __construct()
    {
        require_once("../../config/connect.php");
        $con = new db();
        $this->connection = $con->connection();
    }

    public function getProducts()
    {
        // Consulta SQL para obtener los productos desde la base de datos
        $sql = "SELECT id, nombre, descripcion, precio FROM productos";
        $result = $this->connection->query($sql);

        if ($result instanceof PDOStatement) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Manejar el caso en el que $result no es un objeto PDOStatement válido
            // Esto puede incluir imprimir mensajes de error, registrar el error, o realizar alguna otra acción de manejo de errores
            return [];
        }
    }
    public function getAllProducts()
    {
        $query = "SELECT * FROM menu";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getProductDetails($product_id)
    {
        // Aquí deberías escribir la lógica para obtener los detalles del producto
        // Puedes realizar una consulta a la base de datos para obtener los detalles del producto según su ID
        // Supongamos que tienes una conexión a la base de datos almacenada en la variable $db

        // Ejemplo de consulta SQL para obtener los detalles del producto según su ID
        $query = "SELECT * FROM menu WHERE idM = :product_id";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(':product_id', $product_id);
        $statement->execute();

        // Obtener los resultados de la consulta
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
