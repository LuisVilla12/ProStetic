<main class="contenedor">
    <h1 class="admin__titulo">Administrador de clientes</h1>
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
        <a href="/usuarios/crear" class="btn">Añadir cliente</a>
    </div>
    
    <table class="lista">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario) : ?>
                <tr>
                    <td><?php echo $usuario->id ?></td>
                    <td><?php echo $usuario->nombre ?></td>
                    <td><?php echo $usuario->apellidoPat ." " . $usuario->apellidoMat ?></td>
                    <td><?php echo $usuario->telefono ?></td>
                    <td>
                        <div class="dos_columnas">
                            <div class="div">
                                <a href="/usuarios/actualizar?id=<?php echo $usuario->id; ?>" class="btn amarillo"><i class="fa-solid fa-pen"></i></a>
                            </div>
                            <div class="">
                                <form method="POST" class="w-100" action="/usuarios/eliminar">
                                    <input type="hidden" name="id" value="<?php echo $usuario->id;?>">
                                    <input type="hidden" name="tipo" value="usuario">
                                    <button type="submit" class="btn rojo enviar" value="">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>                            
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>