<div class="contenedor">
<h1 class="nombre-pagina">Olvide Password</h1>
<p class="descripcion-pagina">Reestablece tu password escribiendo tu email a continuación</p>
<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>
</div>


<form class="contenedor formulario" action="/olvide" method="POST">
    <div class="campo">
        <label for="email">Email</label>
        <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu Email"
        />
    </div>

    <input type="submit" class="boton boton-verde" value="Enviar Instrucciones">
</form>

<div class="contenedor acciones">
    <a href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
</div>