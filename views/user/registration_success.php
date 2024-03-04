<?php
require_once("c://xampp/htdocs/cafeteria/views/head/head.php");
session_start();

if (!isset($_SESSION['user_id'])) {
    // Si el usuario ya ha iniciado sesión, redirigir a home.php
    header("Location: ../../index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body style="background-color: #212529; color: #fff;">
    <br>
    <!-- <br>
    <div class="alert alert-success" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg> Tu cuenta ha sido registrada correctamente, ahora ya puedes <a href="login.php" class="alert-link">iniciar sesión</a> con tu cuenta.
    </div>
    <br> -->
    <div class="alert alert-success" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg> Hemos hecho comprobaciones y al parecer ya tienes una sesión iniciada. <a href="../../views/user/home.php" class="alert-link">Volver al inicio</a>
    </div>
    <!-- <a href="../../index.php" type="button" class="btn btn-success">Regresar al inicio</a> -->

</body>

</html>

<?php
require_once("c://xampp/htdocs/cafeteria/views/head/footer.php");
?>