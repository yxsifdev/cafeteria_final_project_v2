<?php
require_once("c://xampp/htdocs/cafeteria/views/head/head.php");

session_start();

if (!isset($_SESSION['user_id'])) {
    // Si el usuario no ha iniciado sesión, redirigir a index.php
    header("Location: ../error404.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago</title>
</head>

<body>

    <br>
    <div style="text-align: center;" class="alert alert-success" role="alert">
        Tus productos se han comprado correctamente, gracias por comprar en <strong>Dolce Vita</strong>.
    </div>

</body>

</html>

<style>
    @import url('https://cdn-uicons.flaticon.com/2.1.0/uicons-brands/css/uicons-brands.css');
    /* fonts */
    @import url(../../styles/fonts/font.css);
    @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    #shop-name {
        font-family: Marshena;
        color: #916b5e;
        font-size: 60px;
        padding-right: 10px;
    }

    body {
        font-family: 'Poppins', sans-serif;
        background-color: #121212;
        color: #fff;
    }
</style>

<?php
require_once("c://xampp/htdocs/cafeteria/views/head/footer.php");
?>