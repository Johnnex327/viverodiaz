<main class="contenedor seccion">
    <h1>Contacto</h1>

    
    <picture>
        <source srcset="build/img/destacada5.webp" type="image/webp">
        <source srcset="build/img/destacada5.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>

    <h2>Llene el formulario de Contacto</h2>
    <?php if($mensaje) { ?>
        <p class="alerta exito"><?php echo $mensaje; ?></p>
    <?php } ?>
    <form class="formulario" method="POST" action="/contacto">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="asunto">Asunto</label>
            <input type="text" placeholder="" id="nombre" name="asunto">

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje"></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <div class="forma-contacto">
                <!-- <label for="contactar-telefono">Teléfono</label>
                <input name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono" > -->

                <label for="email">E-mail</label>
                <input name="correo" placeholder="Tu email" type="text" id="contactar-email" >
            </div>

            <div id="contacto"></div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>