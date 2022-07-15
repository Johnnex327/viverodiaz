<?php
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;

if (!isset($inicio)) {
    $inicio = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vivero Diaz</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio  ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a class="logo" href="/">
                    <img class="imagen" src="/build/img/logo.png" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <!--<img class="dark-mode-boton" src="/build/img/dark-mode.svg">-->
                    <!-- <img class="dark-mode-boton" src="/build/img/dark-mode.svg"> -->
                    <nav class="navegacion contenedor">
                        <ul class="menu-horizontal">
                            <li><a href="/nosotros">Nosotros</a>
                            <li>
                            <li><a href="/propiedades">Anuncios</a>
                            <li>
                            <li><a href="/galeria">Galeria</a>
                            <li>
                            <li><a href="/blog">Blog</a>
                            <li>
                            <li><a href="/contacto">Contacto</a>
                            <li>
                            <li><a href="/misionyvision">Mision</a>
                            <li>
                            <?php
                                if($auth) :?>
                                <li><a href="/admin">Admin</a></li>
                                <?php
                                endif;
                                ?>
                            <li>
                                <?php if ($auth) : ?>
                                    <a href="/logout">Cerrar Sesión</a>
                                <?php else : ?>
                                    <a class="tipoLogin" href="/login">Login</a>
                                    <ul class="menu-vertical">
                                        <li><a href="/login">Admin web</a></li>
                                        <li><a href="http://gestioncacao.codicephp.com/?fbclid=IwAR25epgVBRQNu8gYIiyFeMgQmdo5G7nwXlQgR4KKIJ_o33j6loK1kHxiNCI">Sistema de Gestion</a></li>
                                    </ul>
                            </li>
                        <?php endif; ?>
                        </ul>
                    </nav>
                </div>

            </div>
            <!--.barra-->

            <?php echo $inicio ? "<h1>PLANTAS DE CACAO VIVERO DÍAZ EN ZHUCAY</h1>" : ''; ?>
        </div>
    </header>


    <?php echo $contenido; ?>

    <footer>
        <div class="redes-container">
            <div>
                <h3>Información</h3>
                <p>Tlfn: 0989454418</p>
                <p>Correo: viverodiaz22@gmail.com</p>
                <p>Dirección: Zhucay</p>
            </div>
            <div>
                <h3>Redes Sociales</h3>
                <nav>
                    <ul>
                        <li><a href="https://www.facebook.com/Vivero-D%C3%ADaz-105756052195094" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/cdiazpino86/" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://wa.me/message/LLQU2B3KYPMPJ1" target="_blank" class="whatsapp"><i class="fab fa-whatsapp"></i></a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </footer>

    <script src="build/js/bundle.min.js"></script>
</body>

</html>