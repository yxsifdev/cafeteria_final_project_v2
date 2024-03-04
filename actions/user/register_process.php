<?php
include_once __DIR__ . '../../../controller/registerController.php';

$registerController = new RegisterController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $fechaNa = $_POST['fechaNa'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $existingUser = $registerController->getUserByEmail($email);
    if ($existingUser) {
        echo "Este correo electrónico ya ha sido usado";
        exit();
    }

    $registerResult = $registerController->registerUser($nombre, $apellido, $dni, $fechaNa, $telefono, $email, $password);
    if ($registerResult) {
        header("Location: ../../index.php"); // Redirigir al usuario a la página de inicio de sesión después del registro
        exit();
    } else {
        echo "Error al registrar el usuario"; // Mostrar un mensaje de error al usuario
    }
} else {
    // Si alguien intenta acceder a este archivo sin enviar datos a través del formulario, redirigir al formulario de registro
    header("Location: register.php");
    exit();
}
