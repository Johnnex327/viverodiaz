<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $propiedad->titulo; ?></h1>

    
    <img loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen de la propiedad">

    <div class="resumen-propiedad">
    <p class="precio">Precio Und:  $<?php echo $propiedad->precio; ?></p>

        <?php echo $propiedad->descripcion; ?>
        <a href="https://api.whatsapp.com/message/LLQU2B3KYPMPJ1?autoload=1&app_absent=0" class="boton-amarillo-block">Solicitar Pedido</a>
    </div>
</main>