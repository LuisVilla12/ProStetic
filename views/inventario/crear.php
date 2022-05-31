<main class="contenedor">
    <h1 class="admin__titulo">Nuevo producto</h1>
    <form action="" class="formulario" method="POST" enctype="multipart/form-data">    
    <?php
        include_once __DIR__ . '/../templates/alertas.php';
    ?>
    <?php include __DIR__ . '/formulario.php'?>
    <div class="space_between">
        <a href="/inventario/admin" class="btn">Volver</a>
        <input type="submit" value="Registrar" class="btn-enviar" id="crear">
    </div>
    </form>
    
</main>
<?php 
    $script="
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='/build/JS/Crear.js'></script>
    ";
?>
