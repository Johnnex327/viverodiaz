
<div class="contenedor-anuncios">
    <?php foreach($propiedades as $propiedad): ?>
    <div class="anuncio">
        <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">

        <div class="contenido-anuncio">
            <h3><?php echo $propiedad->titulo; ?></h3>
            <p><?php echo $propiedad->descripcion; ?></p>
            <p class="precio">$<?php echo $propiedad->precio; ?></p>

        
            <a href="propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">
                Ver Propiedad
            </a>
        </div><!--.contenido-anuncio-->
    </div><!--anuncio-->
    <?php endforeach; ?>
</div> <!--.contenedor-anuncios-->
