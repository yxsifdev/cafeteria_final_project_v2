<?php

class RegisterModel
{
    private $connection;

    public function __construct()
    {
        require_once("../../config/connect.php");
        $con = new db();
        $this->connection = $con->connection();
    }

    public function createUser($nombre, $apellido, $dni, $fechaNa, $telefono, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $statement = $this->connection->prepare("INSERT INTO usuarios (nombre, apellido, dni, fechaNa, telefono, email, password) VALUES (:nombre, :apellido, :dni, :fechaNa, :telefono, :email, :password)");
        $statement->bindParam(":nombre", $nombre);
        $statement->bindParam(":apellido", $apellido);
        $statement->bindParam(":dni", $dni);
        $statement->bindParam(":fechaNa", $fechaNa);
        $statement->bindParam(":telefono", $telefono);
        $statement->bindParam(":email", $email);
        $statement->bindParam(":password", $hashedPassword);

        return $statement->execute();
    }

    public function getUserByEmail($email)
    {
        $statement = $this->connection->prepare("SELECT * FROM usuarios WHERE email = :email");
        $statement->bindParam(":email", $email);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}
