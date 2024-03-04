<?php
require_once("c://xampp/htdocs/cafeteria/views/head/head.php");
?>

<?php
// Iniciar la sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si el usuario no ha iniciado sesión, redirigir a index.php
    header("Location: ../error404.php");
    exit();
}

// echo "¡Bienvenido " . $_SESSION['user_name']."!";
?>

<!DOCTYPE html>
<html lang="es" style="color-scheme: dark;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolce Vita - Inicio</title>
    <link rel="icon" href="images/image.jpg">
    <!-- <link rel="stylesheet" href="styles/style.css"> -->
    <!-- <script>
        function mostrarMenu() {
            var menu = document.getElementById("menuPerfil");
            menu.style.display = (menu.style.display === "none" || menu.style.display === "") ? "block" : "none";
        }
    </script> -->
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
                            <a style="color: #fff; font-weight: 500" class="nav-link active" aria-current="page" href="home.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #fff; font-weight: 500" class="nav-link active" aria-current="page" href="../menu/shop.php">Menú</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a style="color: #fff; font-weight: 500" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Otros
                            </a>
                            <ul style="background-color: #121212;" class="dropdown-menu">
                                <!-- <li><a class="dropdown-item" href="../menu/shop.php">Perfil</a></li> -->
                                <li><a style="color: #fff" class="dropdown-item" href="../menu/carrito.php">Carrito de compras</a></li>
                                <!-- <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">option3</a></li> -->
                            </ul>
                        </li>
                    </ul>
                    <!-- Opciones al iniciar sesión -->
                    <div class="btn-group">
                        <button style="background-color: #323128; border-color: #323128" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            <?php
                            $userName = $_SESSION['user_name'];

                            // Verificar la longitud del nombre de usuario
                            if (strlen($userName) > 10) {
                                // Truncar el nombre de usuario a 10 caracteres y agregar "..."
                                $truncatedName = substr($userName, 0, 10) . '...';
                                echo $truncatedName;
                            } else {
                                // Si el nombre de usuario es menor o igual a 10 caracteres, mostrarlo sin cambios
                                echo $userName;
                            }
                            ?>
                        </button>
                        <ul style="background-color: #121212;" class="dropdown-menu dropdown-menu-end">
                            <li class="user-sesion"><a style="color: #fff;" class="dropdown-item">
                                    <?php
                                    echo $_SESSION['user_name'];
                                    ?>
                                </a></li>
                            <hr>
                            <li class="perfil-sesion">
                                <a style="color: #fff;" class="dropdown-item" href="../profile/show.php?id=<?php
                                                                                        echo $_SESSION['user_id'];
                                                                                        ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                    </svg> Perfil <?php
                                                    echo "(" . $_SESSION['user_id'] . ")";
                                                    ?>
                                </a>
                            </li>
                            <li class="cerrar-sesion"><a style="color: #fff;" class="dropdown-item" href="logout.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                                    </svg> Cerrar sesión
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

        <img width="1024px" height="512px" src="../../images/bg/Gatitos.png" class="d-block w-100" alt="...">
    <!--  -->
    <!--  -->
    <aside style="text-align: center; margin-top: 20px" class="sobre-nosotros">
        <h2 style="color: #8B7959; font-family: Marshena; font-size: 90px">Sobre nosotros</h2>
        <div class="contenedor">
            <div class="us">
                Bienvenidos a Dolce Vita, el lugar donde los amantes del café encuentran su paraíso. Sumérgete en un mundo de aromas seductores y sabores exquisitos, donde cada taza es una invitación a disfrutar de la vida al máximo.
                <br>
                En Dolce Vita, nuestra pasión por el café va más allá de la simple preparación. Nos dedicamos a seleccionar los granos más finos de las regiones cafetaleras más prestigiosas del mundo, asegurando así una experiencia de calidad inigualable en cada sorbo. Desde los robustos granos de América Latina hasta los delicados aromas de África, cada taza de café en Dolce Vita cuenta una historia de viaje y descubrimiento.
                <br>
                Pero nuestra pasión por el café no se detiene en la selección de los granos; también nos esforzamos por ofrecerte una variedad de opciones que se adapten a todos los gustos y preferencias. Desde el intenso sabor de un espresso italiano hasta la suavidad cremosa de un latte artesanal, nuestra carta cuenta con una amplia gama de bebidas que seguramente satisfarán incluso a los paladares más exigentes.
                <br>
                Y ¿qué sería del café sin un acompañamiento delicioso? En Dolce Vita, te invitamos a deleitar tu paladar con una selección de postres y bocadillos cuidadosamente elaborados. Desde nuestros croissants recién horneados hasta nuestras tartas caseras, cada bocado está diseñado para complementar a la perfección tu experiencia de café, añadiendo un toque de dulzura y satisfacción a cada visita.
                <br>
                Pero más allá de nuestro café y nuestros deliciosos manjares, en Dolce Vita nos enorgullece ofrecerte un ambiente acogedor y amigable donde te sientas como en casa. Nuestro equipo está comprometido en brindarte un servicio excepcional y una experiencia memorable en cada visita. Ya sea que estés buscando un lugar tranquilo para relajarte y disfrutar de un momento de tranquilidad o necesites un espacio inspirador para reunirte con amigos o colegas, en Dolce Vita encontrarás el ambiente perfecto para cada ocasión.
                <br>
                Te invitamos a que nos visites y descubras por qué Dolce Vita no es solo una cafetería, es un oasis de placer para los sentidos y un refugio para aquellos que buscan un momento de felicidad en su día a día. Ven y únete a nosotros en nuestra búsqueda de la dulce vida.
                <br>
                ¡Esperamos con ansias darte la bienvenida en Dolce Vita!
                </p>
            </div>
        </div>
    </aside>

    <!--  -->
    <br>
    <hr>
    <!--  -->

    <footer>
        <div class="name-shop">
        <img width="200px" src="../../images/dolcevita-3.jpeg" alt="">
            <!-- <h1>Dolce Vita</h1> -->
            <div class="redes-shop">
                <a href=""><i class="fi fi-brands-facebook"></i></a>
                <a href=""><i class="fi fi-brands-instagram"></i></a>
            </div>
        </div>
        <div class="menu-options">
            <ul>
                <h5>Tienda</h3>
                    <li><a href="#">Sobre Nosotros</a></li>
                    <li><a href="../menu/shop.php">Menú</a></li>
                    <li><a href="#">Términos y condiciones</a></li>
            </ul>
            <!-- <ul>
                <h5>Atención</h3>
                    <li><a href="">Sobre nosotros</a></li>
                    <li><a href="">Productos</a></li>
                    <li><a href="">Bebidas</a></li>
                    <li><a href="">Alimentos</a></li>
                    <li><a href="">option5</a></li>
            </ul> -->
            <!-- <ul>
        <h5>Tienda</h3>
            <li><a href="">Sobre nosotros</a></li>
            <li><a href="">Productos</a></li>
            <li><a href="">Bebidas</a></li>
            <li><a href="">Alimentos</a></li>
            <li><a href="">option5</a></li>
        </ul> -->
            <!-- <ul>
        <h5>Tienda</h3>
            <li><a href="">option1</a></li>
            <li><a href="">option2</a></li>
            <li><a href="">option3</a></li>
            <li><a href="">option4</a></li>
            <li><a href="">option5</a></li>
        </ul> -->
        </div>
    </footer>
</body>
<style>
    /* icons */
    @import url('https://cdn-uicons.flaticon.com/2.1.0/uicons-brands/css/uicons-brands.css');
    /* fonts */
    @import url(../../styles/fonts/font.css);
    @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .contenedor {
    display: flex;
    justify-content: center; 
    align-items: center;  
    }
    .us {
    width: 80%; 
    padding: 20px; 
    border: 2px; 
    text-align: justify; 
    font-size: 20px;
    color: #c6c6c6;
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

    /* header-start */

    /* header-end */

    /* Carousel-start */

    .carousel-item img {
        border-radius: 10px;
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


    footer {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        background-color: #121212;
        margin-top: 30px;
        align-items: center;
        /* gap: 35rem; */
        padding: 15px 0;
        border-radius: 5px;
    }

    footer .name-shop {
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    footer .name-shop h1 {
        font-family: Marshena;
        color: #323128;
        font-size: 75px;
    }

    footer .name-shop .redes-shop {
        display: flex;
        justify-content: center;
        gap: 30px;
    }

    footer .name-shop .redes-shop a {
        transition: .3s;
        text-decoration: none;
    }

    footer .menu-options a:hover {
        color: #323128
    }


    footer .name-shop .redes-shop i {
        color: #323128;
        font-size: 30px;
    }

    footer .menu-options {
        display: flex;
        /* justify-content: center; */
        flex-wrap: wrap;
    }

    footer .menu-options h5 {
        color: #916b5e;
    }

    footer .menu-options a {
        text-decoration: none;
        color: #fff;
    }

    footer .menu-options li {
        list-style: none;
    }

    footer .name-shop .redes-shop a:hover {
        transform: translateY(-5px);
    }

    @media (max-width: 768px) {
        footer {
            gap: 0;
        }
    }
</style>

</html>

<?php
require_once("c://xampp/htdocs/cafeteria/views/head/footer.php");
?>