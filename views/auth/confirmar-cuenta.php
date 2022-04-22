<h1 class="titulo">Confirmar tu cuenta</h1>
<main class="contenedorMediano">
<?php foreach ($errores as $error) : ?>
    <div class="alerta error">
        <p><?php echo $error ?></p>
    </div>
<?php endforeach ?>
</main>
<div class="contenedorMediano">
    <div class="space_between acciones">
        <p class="text-center">
            <a href="/crear-cuenta">¿Aún no tienes una cuenta? 
                <span>Crear una aquí</span></a></p>
        <p class="text-center">
            <a href="/olvide">¿Olvidaste tu contraseña?</a></p>        
    </div>
</div>

