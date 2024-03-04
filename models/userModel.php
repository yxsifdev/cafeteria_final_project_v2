<?php

class userModel
{
    private $connection;


    public function __construct()
    {
        require_once("../../config/connect.php");
        $con = new db();
        $this->connection = $con->connection();
    }

    public function show($id)
    {
        $stament = $this->connection->prepare("SELECT * FROM usuarios where id = :id limit 1");
        $stament->bindParam(":id", $id);
        return ($stament->execute()) ? $stament->fetch() : false;
    }

    public function update($id, $nombre, $apellido, $dni, $fechaNa, $telefono, $perfil)
    {
        $stament = $this->connection->prepare("UPDATE usuarios SET nombre = :nombre, apellido = :apellido, dni = :dni, fechaNa = :fechaNa, telefono = :telefono, perfil = :perfil WHERE id = :id");
        $stament->bindParam(":id", $id);
        $stament->bindParam(":nombre", $nombre);
        $stament->bindParam(":apellido", $apellido);
        $stament->bindParam(":dni", $dni);
        $stament->bindParam(":fechaNa", $fechaNa);
        $stament->bindParam(":telefono", $telefono);
        $stament->bindParam(":perfil", $perfil);
        return ($stament->execute()) ? $id : false;
    }
}
