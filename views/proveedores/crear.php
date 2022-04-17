<main class="contenedor">
    <h1 class="admin__titulo">Nuevo Proveedor</h1>
    <form action="" class="formulario" method="POST" enctype="multipart/form-data">
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <p><?php echo $error ?></p>
        </div>
    <?php endforeach; ?>
    
    <?php include __DIR__ . '/formulario.php'?>
    <div class="justify">
        <a href="/proveedores/admin" class="btn">Volver</a>
        <input type="submit" value="Registrar" class="btn-enviar">
    </div>
    </form>
    
</main>