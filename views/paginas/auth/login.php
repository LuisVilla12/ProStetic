<main class="contenedorMediano">
    <h1 class="form_cita__titulo">Iniciar sesión</h1>
    <form action="/login" class="formulario w-50" method="POST">
        <fieldset>
            <div class="campo">
                <label for="usuario" class="campo__label">Correo electronico:</label>
                <input type="email" id="usuario" class="campo__input" name="correo" value="">
            </div>
            <div class="campo">
                <label for="contraseña" class="campo__label">Contraseña:</label>
                <input type="password" id="contraseña" class="campo__input" name="contraseña" value="">
            </div>
        </fieldset>
        <?php foreach ($errores as $error) : ?>
            <div class="alerta error">
                <p><?php echo $error ?></p>
            </div>
        <?php endforeach ?>
        <div class="centrar_campos">
            <input type="submit" value="Iniciar sesión" class="btn-enviar txt-center">
        </div>
    </form>
</main>
