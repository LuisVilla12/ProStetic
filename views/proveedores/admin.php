<main class="contenedor">
    <h1 class="admin__titulo">Administrador de proveedores</h1>
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
        <a href="/proveedores/crear" class="btn">Añadir proveedor</a>
    </div>
    
    <table class="lista">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>RFC</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($proveedores as $proveedor) : ?>
                <tr>
                    <td><?php echo $proveedor->id ?></td>
                    <td><?php echo $proveedor->nombre ?></td>
                    <td><?php echo $proveedor->telefono ?></td>
                    <td><?php echo $proveedor->correo ?></td>
                    <td><?php echo $proveedor->RFC ?></td>
                    <td>
                        <div class="dos_columnas">                        
                        <a href="/proveedores/actualizar?id=<?php echo $proveedor->id; ?>" class="btn amarillo" ><i class="fa-solid fa-pen"></i></a>
                        <form method="POST" class="w-100" action="/proveedores/eliminar">
                            <input type="hidden" name="id" value="<?php echo $proveedor->id; ?>">
                            <input type="hidden" name="tipo" value="proveedor">
                            <button type="submit" class="btn rojo enviar" value="">
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