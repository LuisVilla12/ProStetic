<main class="contenedor">
    <h1 class="admin__titulo">Nuevo empleado</h1>
    <form action="" class="formulario" method="POST" enctype="multipart/form-data">
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <p><?php echo $error ?></p>
        </div>
    <?php endforeach; ?>
    
    <?php include __DIR__ . '/formulario.php'?>
    <div class="space_between">
        <a href="/empleados/admin" class="btn">Volver</a>
        <input type="submit" value="Registrar" class="btn-enviar">
    </div>
    </form>    
</main>