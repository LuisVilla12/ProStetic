<main class="contenedor">
    <h1 class="admin__titulo">Nuevo cliente</h1>
    <form action="" class="formulario" method="POST" enctype="multipart/form-data">
    <?php
        include_once __DIR__ . '/../templates/alertas.php';
    ?>
    <?php include __DIR__ . '/formulario.php'?>
    <div class="space_between">
        <a href="/usuarios/admin" class="btn">Volver</a>
        <input type="submit" value="Registrar" class="btn-enviar">
    </div>
    </form>    
</main>