<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="POST" class="formulario" novalidate>
        <fieldset>
            <legend>Autenticación</legend>

            <label for="email">Correo</label>
            <input type="email" name="email" placeholder="Tu Email" id="email">

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Tu Password" id="password">
        </fieldset>


        <div class="olvide">
            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
            <a href="/olvide">Olvidaste contraseña?</a>
        </div>
    </form>
</main>