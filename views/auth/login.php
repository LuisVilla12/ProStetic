<main class="contenedorMediano">
    <h1 class="formulario__titulo">Iniciar sesión</h1>
    <form action="/login" class="formulario w-50" method="POST">
        <fieldset>
            <div class="campo">
                <label for="usuario" class="campo__label">Correo electronico:</label>
                <input type="email" id="usuario" class="campo__input" name="correo" value="<?php echo sanitizar($usuario->correo) ?>" required>
            </div>
            <div class="campo">
                <label for="contraseña" class="campo__label">Contraseña:</label>
                <input type="password" id="contraseña" class="campo__input" name="contraseña" required>
            </div>
        </fieldset>
        <?php
            include_once __DIR__ . '/../templates/alertas.php';
        ?>
        <div class="centrar_campos">
            <input type="submit" value="Iniciar sesión" class="btn-enviar txt-center">
        </div>
    </form>
    <div class="acciones">
        <p class="text-center">
            <a href="/crear-cuenta">¿Aún no tienes una cuenta? 
                <span>Crear una aquí</span></a></p>
        <p class="text-center">
            <a href="/olvide">¿Olvidaste tu contraseña?</a></p>
    </div>
</main>



