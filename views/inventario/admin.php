<?php 
// debuguear($productos);
?>
<main class="contenedor">
    <h1 class="admin__titulo">Administrador de productos</h1>
    <?php if($registro):?>
        <?php $mensaje=MostrarMensaje($registro)?>
            <?php if($mensaje): ?>
                <div class="alerta exito">
                    <p><?php echo sanitizar($mensaje);?></p>
                </div>
            <?php endif ?>
        <?php endif ?>
    <div class="space_between">
        <a href="/admin" class="btn">Volver</a>
        <a href="/inventario/crear" class="btn">Añadir producto</a>
    </div>
    
    <table class="lista">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Proveedor</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto) : ?>
                <tr>
                    <td><?php echo $producto->id ?></td>
                    <td><?php echo $producto->nombre ?></td>
                    <td><?php echo $producto->nombreProveedor?></td>
                    <td><?php echo $producto->cantidad ?></td>
                    <td><?php echo $producto->precioVenta ?></td>
                    <td>
                        <div class="dos_columnas">                        
                        <a href="/inventario/actualizar?id=<?php echo $producto->id; ?>" class="btn amarillo" ><i class="fa-solid fa-pen"></i></a>
                        <form method="POST" class="w-100" action="/inventario/eliminar">
                            <input type="hidden" name="id" id="idEliminar" value="<?php echo $producto->id; ?>">
                            <input type="hidden" name="tipo" value="producto" >
                            <button type="submit" class="btn rojo enviar" value="" id="eliminar">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                        </div>                        
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<?php 
    $script="
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='/build/JS/confirmarEliminar.js'></script>
    ";
?>
