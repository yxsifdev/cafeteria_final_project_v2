<?php
include_once '../../models/registerModel.php';

class RegisterController
{
    private $registerModel;

    public function __construct()
    {
        $this->registerModel = new RegisterModel();
    }

    public function registerUser($nombre, $apellido, $dni, $fechaNa, $telefono, $email, $password)
    {
        return $this->registerModel->createUser($nombre, $apellido, $dni, $fechaNa, $telefono, $email, $password);
    }

    public function getUserByEmail($email)
    {
        return $this->registerModel->getUserByEmail($email);
    }
}
