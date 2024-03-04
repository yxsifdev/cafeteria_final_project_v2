<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si el usuario no ha iniciado sesión, redirigir al inicio de sesión
    header("Location: ../../views/user/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $id = $_SESSION['user_id']; // Obtener el ID del usuario de la sesión
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $fechaNa = $_POST['fechaNa'];
    $telefono = $_POST['telefono'];

    // Procesar archivo de perfil
    $perfil = $_FILES['perfil'];

    // Verificar si se ha cargado un archivo
    if (!empty($perfil['name'])) {
        // Directorio donde se guardarán los archivos de perfil
        $directorio_destino = '../../images/perfiles/';

        // Mover el archivo cargado al directorio de destino
        $nombre_archivo = $perfil['name'];
        $archivo_temporal = $perfil['tmp_name'];
        $ruta_archivo_destino = $directorio_destino . $nombre_archivo;

        // Mover el archivo temporal al directorio de destino
        if (move_uploaded_file($archivo_temporal, $ruta_archivo_destino)) {
            // La carga del archivo fue exitosa, asignar la ruta del perfil
            $perfil = $ruta_archivo_destino;
        } else {
            // La carga del archivo falló, muestra un mensaje de error o toma alguna acción apropiada
            echo "Error al cargar el archivo de perfil";
            exit();
        }
    } else {
        // Si no se cargó un archivo de perfil, conservar la ruta anterior (si existe)
        $perfil = $_POST['perfil_anterior'] ?? '';
    }

    // Importar el controlador de usuario
    require_once("../../controller/userController.php");
    $userController = new UserController();

    // Actualizar los datos del usuario
    $updateResult = $userController->update($id, $nombre, $apellido, $dni, $fechaNa, $telefono, $perfil);
    if ($updateResult) {
        // Si la actualización fue exitosa, redirigir a la página de perfil
        echo "Actualización exitosa";
        header("Location: ../../views/profile/show.php?id=" . $id);
        exit();
    } else {
        // Si ocurrió un error durante la actualización, redirigir a una página de error
        echo "Error al actualizar";
        header("Location: ../../views/error.php");
        exit();
    }
} else {
    // Si no se recibió una solicitud POST, redirigir a una página de error
    echo "No se recibió una solicitud POST";
    header("Location: ../../views/error.php");
    exit();
}
