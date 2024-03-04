<?php
class db
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "cafeteria";
    public function connection()
    {
        try {
            $connection = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->dbname, $this->username, $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}

// Cerrar la conexión
// $conn->close();