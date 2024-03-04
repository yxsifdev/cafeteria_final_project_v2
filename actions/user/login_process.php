<?php
session_start();
include_once __DIR__ . '../../../controller/loginController.php';

$loginController = new LoginController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $loginResult = $loginController->login($email, $password);
    if ($loginResult === true) {
        header("Location: ../../views/user/home.php"); // Redirigir a la página de inicio después de iniciar sesión
        exit();
    } else {
        echo $loginResult; // Mostrar un mensaje de error al usuario
    }
} else {
    // Si alguien intenta acceder a este archivo sin enviar datos a través del formulario, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit();
}
