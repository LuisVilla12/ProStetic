<main class="contenedor">
    <h1 class="admin__titulo">Administrador de servicios</h1>
    <div class="space_between">
        <a href="/admin" class="btn">Volver</a>
        <a href="/servicios/crear" class="btn">Añadir servicio</a>
    </div>
    <table class="lista">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Duración</th>
                <th>Precio</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicios as $servicio) : ?>
                <tr>
                    <td><?php echo $servicio->id ?></td>
                    <td><?php echo $servicio->nombre ?></td>
                    <td><?php echo $servicio->duracion . "min"?></td>
                    <td><?php echo "$". $servicio->precio_1 ?></td>                    
                    <td>
                        <div class="dos_columnas">                        
                        <a href="/servicios/actualizar?id=<?php echo $servicio->id; ?>" class="btn amarillo" ><i class="fa-solid fa-pen"></i></a>
                        <form method="POST" class="w-100" action="/servicios/eliminar">
                            <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
                            <input type="hidden" name="tipo" value="servicio">
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