<?php

class LoginModel
{
    private $connection;

    public function __construct()
    {
        require_once("../../config/connect.php");
        $con = new db();
        $this->connection = $con->connection();
    }

    public function getUserByEmail($email)
    {
        $statement = $this->connection->prepare("SELECT * FROM usuarios WHERE email = :email");
        $statement->bindParam(":email", $email);
        $statement->execute();
        return $statement->fetch();
    }
}
