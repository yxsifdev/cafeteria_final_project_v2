<?php
echo (empty($_GET['id']))
    ? ((strpos($_SERVER['REQUEST_URI'], 'create')) ? "Agregando nuevo usuario" : "")
    : ((strpos($_SERVER['REQUEST_URI'], 'show')) ? "Detalles del registro " . $_GET['id'] : "Actualizar registro " . $_GET['id']);
?>

<!DOCTYPE html>
<html lang="es" style="color-scheme: dark">
<!-- <html lang="en" style="color-scheme: dark;"> -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolce Vita - Registrate!</title>
</head>

<body>

    <div class="btn-volver">
        <a href="../../index.php"><i class="fi fi-sr-left"></i> Volver</a>
    </div>

    <section>
        <!-- Formulario de registro -->
        <div class="card-form-register">
            <form action="../../actions/user/register_process.php" method="post">
                <div class="register-to-continue">
                    <h1><i class="fi fi-ss-user-add"></i> Dolce Vita</h1>
                    <p>Regístrate para continuar</p>
                </div>
                <div class="inputs-register-form">
                    <label style="font-size: 14px; font-weight: 500;">Información Personal</label>
                    <input type="text" name="nombre" required placeholder="Nombre">
                    <input type="text" name="apellido" placeholder="Apellido">
                    <input type="text" name="dni" placeholder="DNI">
                    <input type="date" name="fechaNa" placeholder="Fecha de Nacimiento">
                    <input type="tel" name="telefono" placeholder="Número de teléfono" pattern="[0-9]{9}">
                    <label style="font-size: 14px; font-weight: 500;">Seguridad de la cuenta</label>
                    <input type="email" name="email" placeholder="Introduce tu correo electrónico">
                    <input type="password" name="password" placeholder="Introduce la contraseña">
                    <label style="font-size: 14px; font-weight: 500;">Información Personal</label>
                </div>
                <div style="font-size: 10px;" class="politicas">
                    <p>Al registarme, acepto las <span style="color: #916b5e;">Condiciones del servicio</span> de Dolce
                        Vita y su <span style="color: #916b5e;">Política de privacidad</span>.</p>
                </div>
                <div class="btn-submit-register">
                    <button type="submit">Registrarse</button>
                </div>
                <div class="other-forms">
                    <p>O continúa con:</p>
                    <a><img width="20px" height="20px" src="../../images/icons/search.png" alt="">Google</a>
                    <a><img width="20px" height="20px" src="../../images/icons/microsoft.png" alt="">Microsoft</a>
                </div>
            </form>
        </div>
    </section>

</body>

</html>

<style>
    @import url('https://cdn-uicons.flaticon.com/2.1.0/uicons-solid-straight/css/uicons-solid-straight.css');
    @import url('https://cdn-uicons.flaticon.com/2.1.0/uicons-bold-rounded/css/uicons-bold-rounded.css');
    @import url('https://cdn-uicons.flaticon.com/2.1.0/uicons-solid-rounded/css/uicons-solid-rounded.css');
    /*  */
    @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background-image: url(../../images/bg/bg-3.jpeg);
        background-size: cover;
        color: #fff;
    }

    /* Forms - Styles - Start */

    section {
        display: flex;
        gap: 30px;
        /* Opcional */
        justify-content: space-around;
        /* align-items: center; */
    }

    /* Register */

    .card-form-register {
        display: flex;
        flex-direction: column;
        background-color: #121212;
        box-shadow: #0000004b 0 0 10px 2px;
        border-radius: 3px;
        padding: 20px 50px;
        width: 300px;
    }

    .register-to-continue {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* justify-content: center; */
    }

    .register-to-continue h1 {
        font-size: 30px;
    }

    .register-to-continue p {
        margin-top: -10px;
    }

    .register-to-continue h1 i {
        font-size: 30px;
        color: #4B392C;
    }

    .inputs-register-form {
        display: flex;
        gap: 15px;
        flex-direction: column;
    }

    .inputs-register-form input {
        border-radius: 3px;
        border: 1px solid #4d4d4d;
        outline: none;
        color: #fff;
        padding: 10px 7px;
        background-color: #1f1f1f;
    }

    .inputs-register-form input:focus {
        border-color: #57F287;
    }

    .btn-submit-register {
        margin-top: 20px;
    }

    .btn-submit-register button {
        background-color: #4B392C;
        border-radius: 3px;
        border: 0;
        padding: 10px 0;
        cursor: pointer;
        color: #fff;
        font-size: 15px;
        width: 100%;
        display: flex;
        justify-content: center;
        text-align: center;
    }

    .btn-submit-register button:active {
        background-color: #256fde;
    }

    /* other-forms */

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

    /* Forms - Styles - End */

    .btn-volver {
        display: flex;
        padding: 10px;
    }

    .btn-volver a {
        color: #fff;
        background-color: #4B392C;
        padding: 10px 15px;
        font-weight: 500;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-volver a,
    .btn-volver i {
        display: flex;
    }
</style>