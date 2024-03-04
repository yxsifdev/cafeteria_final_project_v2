<?php
require_once("c://xampp/htdocs/cafeteria/views/head/head.php");
?>

<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si el usuario no ha iniciado sesión, redirigir a index.php
    header("Location: ../error404.php");
    exit();
}

include("../../config/connect.php");

$userId = $_SESSION['user_id'];

// Crear una instancia de la clase db
$db = new db();

try {
    // Obtener la conexión utilizando el método connection()
    $conn = $db->connection();

    // Consultar la información del usuario
    $query = "SELECT id, nombre, apellido, dni, fechaNa, telefono, email, perfil FROM usuarios WHERE id = $userId";
    $result = $conn->query($query);

    // Verificar si se encontró el usuario
    if ($result->rowCount() > 0) {
        // Obtener los datos del usuario
        $row = $result->fetch(PDO::FETCH_ASSOC);

        // Muestra la información en la página
        // ...
    } else {
        echo "No se encontró ningún usuario con el ID proporcionado.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolce Vita - <?php
                        $userName = $_SESSION['user_name'];

                        if (strlen($userName) > 20) {
                            $truncatedName = substr($userName, 0, 20) . '...';
                            echo $truncatedName;
                        } else {
                            echo $userName;
                        }
                        ?>
    </title>
    <link rel="stylesheet" href="profile.css">
</head>

<body>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
            <img width="100px" src="../../images/dolcevita-2.jpeg" alt="">
                <!-- <a class="navbar-brand" id="shop-name">Dolce Vita</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a style="color: #fff; font-weight: 500" class="nav-link active" aria-current="page" href="../user/home.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #fff; font-weight: 500" class="nav-link active" aria-current="page" href="../menu/shop.php">Menú</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="box-profile">
        <div class="profile-primary-card">
            <div class="primary-banner-img">
                <img src="../../images/bg/profile.png" alt="">
                <!-- banner de perfil -->
            </div>
            <div class="primary-content-card">
                <div class="primary-card-start">
                    <img src="<?php
                                $no_user = "../../images/icons/usernofound.jpg";
                                echo $row['perfil'] ? $row['perfil'] : $no_user;
                                ?>" alt="">
                    <!-- imagen de perfil del usaurio -->
                    <div class="primary-card-name">
                        <h2><?php echo $row['nombre'] . ' ' . $row['apellido']; ?></h2>
                        <p>ID: <?php echo $row['id']; ?></p>
                    </div>
                </div>
                <div class="primary-card-end">
                    <div class="card-end-options">
                        <a class="primary-edit-profile" href="edit_profile.php?id=<?php echo $_SESSION['user_id']; ?>">Editar perfil</a>
                        <a class="primary-home-profile" href="../user/home.php">Volver al inicio</a>
                        <a class="primary-logout-profile" href="../user/logout.php">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        <div class="profile-secondary-card">
            <div class="secondary-card-content">
                <div class="secondary-card-start">
                    <div class="secondary-card-section">
                        <h3>Nombre</h3>
                        <p><?php echo $row['nombre']; ?></p>
                    </div>
                    <div class="secondary-card-section">
                        <h3>Apellido</h3>
                        <p><?php echo $row['apellido']; ?></p>
                    </div>
                    <div class="secondary-card-section">
                        <h3>Correo electrónico</h3>
                        <p><?php echo $row['email']; ?></p>
                    </div>
                    <div class="secondary-card-section">
                        <h3>Dni</h3>
                        <p><?php echo $row['dni']; ?></p>
                    </div>
                </div>
                <div class="secondary-card-end">
                    <div class="secondary-card-section">
                        <h3>Número de teléfono</h3>
                        <p><?php echo $row['telefono']; ?></p>
                    </div>
                    <div class="secondary-card-section">
                        <h3>Fecha de nacimiento</h3>
                        <p><?php echo $row['fechaNa']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900display=swap');
    @import url(../../styles/fonts/font.css);
    @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900display=swap');


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    #shop-name {
        font-family: Marshena;
        color: #323128;
        font-size: 60px;
        padding-right: 10px;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #121212;
        color: #fff;
    }

    .nav-item .dropdown-menu a:hover {
        background-color: transparent;
    }

    /* Carousel-end */

    .user-sesion a:hover {
        background-color: #323128;
        color: #fff;
    }

    .user-sesion a:active {
        background-color: #323128;
    }

    .perfil-sesion a:hover {
        color: #fff;
        background-color: #323128;
    }

    .perfil-sesion a:active {
        background-color: #323128;
    }

    .cerrar-sesion a:hover {
        background-color: #323128;
        color: #fff;
    }

    .cerrar-sesion a:active {
        background-color: #323128;
    }

    .box-profile {
        display: flex;
        /* align-items: center; */
        gap: 30px;
        justify-content: center;
        padding: 20px;
    }


    /* primary-card */
    .profile-primary-card {
        border-radius: 5px;
        background-color: #1f1f1f;
        width: 400px;
    }

    .profile-primary-card .primary-banner-img img {
        width: 100%;
        height: 120px;
        border-radius: 5px 5px 0px 0px;
    }

    .primary-content-card {
        display: flex;
        gap: 30px;
        flex-direction: column;
        padding: 20px;
    }

    .primary-content-card .primary-card-start {
        display: flex;
        /* gap: 20px; */
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .primary-card-start .primary-card-name {
        text-align: center;
    }

    .primary-card-start .primary-card-name p {
        color: #a1a1aa;
    }

    .primary-content-card .primary-card-start img {
        /* margin-left: -10px; */
        width: 130px;
        margin-top: -100px;
        background-color: #1f1f1f;
        padding: 10px;
        height: 130px;
        border-radius: 100%;
    }

    .primary-content-card .primary-card-end .card-end-options {
        display: flex;
        flex-direction: column;
        gap: 15px;
        text-align: center;
    }

    .card-end-options .primary-edit-profile {
        outline: 1px solid #4d4d4d;
        color: #a1a1aa;
        padding: 3px;
        text-decoration: none;
        border-radius: 5px;
        transition: .2s;
    }

    .card-end-options .primary-home-profile {
        outline: 1px solid #4d4d4d;
        color: #a1a1aa;
        padding: 3px;
        text-decoration: none;
        border-radius: 5px;
        transition: .2s;
    }

    .card-end-options .primary-logout-profile {
        outline: 1px solid #4d4d4d;
        color: #a1a1aa;
        padding: 3px;
        text-decoration: none;
        border-radius: 5px;
        transition: .2s;
    }

    .card-end-options .primary-edit-profile:hover {
        outline-color: #5865f2;
        color: #fff;
    }

    .card-end-options .primary-home-profile:hover {
        outline-color: #57F287;
        color: #fff;
    }

    .card-end-options .primary-logout-profile:hover {
        outline-color: #ED4245;
        color: #fff;
    }

    /* secondary-card */

    .profile-secondary-card {
        background-color: #1f1f1f;
        border-radius: 5px;
    }

    .secondary-card-content {
        display: flex;
        padding: 30px;
        gap: 5rem;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .secondary-card-start {
        display: flex;
        height: 100%;
        gap: 30px;
        border-radius: 5px;
        flex-direction: column;
    }

    .secondary-card-end {
        display: flex;
        gap: 30px;
        height: 100%;
        border-radius: 5px;
        flex-direction: column;
    }

    .secondary-card-section p {
        outline: 1px solid #4d4d4d;
        color: #a1a1aa;
        padding: 5px 10px;
        border-radius: 5px;
    }

    /*  */

    @media (max-width: 767px) {
        .box-profile {
            flex-wrap: wrap;
        }

        .profile-primary-card {
            width: 500px
        }

        .secondary-card-content {
            gap: 30px;
        }
    }
</style>