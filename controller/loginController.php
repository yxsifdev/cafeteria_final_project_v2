<?php
// session_start();
include_once "../../models/loginModel.php";

class LoginController
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function login($email, $password)
    {
        $user = $this->loginModel->getUserByEmail($email);

        if (!$user) {
            return "Usuario no encontrado";
        }

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['nombre'];
            return true;
        } else {
            return "Contraseña incorrecta";
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }
}
