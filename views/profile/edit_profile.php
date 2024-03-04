<?php
require_once("../head/head.php");
require_once("../../controller/userController.php");

session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si el usuario no ha iniciado sesión, redirigir a index.php
    header("Location: ../error404.php");
    exit();
}

include("../../config/connect.php");

$obj = new userController();
$user = $obj->show($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en" style="color-scheme: dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfíl</title>
</head>

<body>
    <section>
        <div class="card-form-login">
            <form action="../../actions/user/update.php" method="post" enctype="multipart/form-data">
                <div class="btn-submit-login">
                    <label style="color: #fff; font-weight: 500;" class="form-label">Name</label>
                    <input style="background-color: #1F1F1F; color: #fff; border-color: #4d4d4d;" required type="text" class="form-control" value="<?= $user['nombre'] ?>" name="nombre" placeholder="Ingresa tu nombre" />
                    <br>
                    <!--  -->
                    <label style="color: #fff; font-weight: 500;" class="form-label">Apellido</label>
                    <input style="background-color: #1F1F1F; color: #fff; border-color: #4d4d4d;" required type="text" class="form-control" value="<?= $user['apellido'] ?>" name="apellido" placeholder="Ingresa tu apellido" />
                    <br>
                    <!--  -->
                    <label style="color: #fff; font-weight: 500;" class="form-label">Dni</label>
                    <input style="background-color: #1F1F1F; color: #fff; border-color: #4d4d4d;" required type="text" class="form-control" value="<?= $user['dni'] ?>" name="dni" pattern="[0-9]{8}" placeholder="Ingresa tu dni" />
                    <br>
                    <!--  -->
                    <label style="color: #fff; font-weight: 500;" class="form-label">Fecha de nacimiento</label>
                    <input style="background-color: #1F1F1F; color: #fff; border-color: #4d4d4d;" required type="date" class="form-control" value="<?= $user['fechaNa'] ?>" name="fechaNa" placeholder="Ingresa tu fecha de nacimiento" />
                    <br>
                    <!--  -->
                    <label style="color: #fff; font-weight: 500;" class="form-label">Teléfono</label>
                    <input style="background-color: #1F1F1F; color: #fff; border-color: #4d4d4d;" required type="tel" class="form-control" value="<?= $user['telefono'] ?>" name="telefono" pattern="[0-9]{9}" placeholder="Ingresa tu número de teléfono" />
                    <br>
                    <!--  -->
                    <label style="color: #fff; font-weight: 500;" class="form-label">Perfil</label>
                    <input style="background-color: #1F1F1F; color: #fff; border-color: #4d4d4d;" type="file" class="form-control" value="<?= $user['perfil'] ?>" name="perfil" placeholder="Ingresa tu foto de perfil" />
                    <br>
                    <!--  -->
                    <div class="d-flex gap-2">
                        <a href="show.php?id=<?php echo $_SESSION['user_id']; ?>" style="color: #fff; text-decoration: none; background-color: #4B392C; font-size: 15px; font-family: sans-serif; padding: 10px; border-radius: 3px; border-color:#4B392C;" class="btn btn-danger"> Cancelar</a>
                        <button name="update" type="submit" style="color: #fff; text-decoration: none; background-color: #4B392C; font-size: 15px; font-family: sans-serif; padding: 10px; border-radius: 3px; border-color:#4B392C;" class="btn btn-success">
                            Confirmar cambios
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>


</body>

</html>

<?php require_once("../head/footer.php"); ?>
<style>

        body {
        font-family: 'Poppins', sans-serif;
        background-image: url(../../images/bg/bg-3.jpeg);
        background-size: cover;
        color: #ffff;
    }

    /* Forms - Styles - Start */

    section {
        display: flex;
        gap: 30px;
        /* Opcional */
        justify-content: space-around;
        /* align-items: center; */
    }

    .card-form-login {
        display: flex;
        flex-direction: column;
        background-color: #121212;
        box-shadow: #0000004b 0 0 10px 2px;
        border-radius: 3px;
        padding: 20px 50px;
        /* justify-content: space-between; */
        width: 300px;
        /* height: max-content; */
    }

    .login-to-continue {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* justify-content: center; */
    }

    .login-to-continue h1 {
        font-size: 30px;
    }

    .login-to-continue p {
        margin-top: -10px;
    }

    .login-to-continue h1 i {
        font-size: 30px;
        color: #4B392C;
    }

    .inputs-login-form {
        display: flex;
        gap: 15px;
        flex-direction: column;
    }

    .inputs-login-form input {
        border-radius: 3px;
        border: 1px solid #4d4d4d;
        outline: none;
        padding: 10px 7px;
        background-color: #1f1f1f;
    }

    .inputs-login-form input:focus {
        border-color: #57F287;
    }
    .other-forms {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 10px;
        align-items: center;
    }

    .other-forms p {
        margin: 0;
        color: #4b4e60;
        font-size: 12px;
    }

    .other-forms img,
    a {
        display: flex;
        gap: 10px;
        align-items: center;
        justify-content: center;
    }

    .other-forms a {
        border: 1px solid #4d4d4d;
        color: #4b4e60;
        border-radius: 3px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        width: 100%;
        padding: 10px 0;
        text-decoration: none;
    }
</style>



