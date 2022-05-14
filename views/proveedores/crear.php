<main class="contenedor">
    <h1 class="admin__titulo">Nuevo Proveedor</h1>
    <?php
        include_once __DIR__ . '/../templates/alertas.php';
    ?>
    <form action="" class="formulario" method="POST" enctype="multipart/form-data">
    <?php include __DIR__ . '/formulario.php'?>
    <div class="space_between">
        <a href="/proveedores/admin" class="btn" >Volver</a>
        <input type="submit" value="Registrar" id="crearProveedor" class="btn-enviar">
    </div>
    </form>
</main>
<?php 
$script=
    "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='../build/JS/proveedores.js'></script>";
?>
