<?php
// debuguear($citas);
?>
<h1 class="titulo">Administración</h1>
<main>
<div class="contenedor">
<div class="busqueda">
<form action="" class="formulario">    
    <div class="campo">        
        <label for="fecha" class="campo__label">Fecha:</label>
        <input type="date" class="campo__input" id="fecha" name="fecha" value="<?php echo $fecha ?>">
    </div>
</form>
</div>

<div id="citas-admin">
    <?php if(count($citas)===0):?>
        <p>No hay citas</p>
    <?php endif;?>
    <table class="lista">
        <thead>
            <tr>
                <th>Hora</th>
                <th>Cliente</th>
                <th>Servicios</th>
                <!-- <th>Servicios:</th> -->
                <th>Total</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <?php 
            $idCita=0;
            foreach ($citas as $key=>$cita):?>                    
            <?php 
                if($idCita !==$cita->id):
                $idCita=$cita->id;
                $total=0;
                $cadena='';
            ?>              
                <tr>                                         
                    <td><?php echo $cita->horaInicio ?></td>
                    <td><?php echo $cita->cliente ?></td>
                    
                <?php endif;?>                                    
                <?php 
                    $cadena .= $cita->servicio . ',';
                    $total=$total+ intval($cita->precio_1);
                ?>                        
            <?php 
            $actual=$cita->id;
            $proximo=$citas[$key+1]->id ?? 0;            
            if(esUltimo($actual,$proximo)):?>
                    <td><?php echo $cadena;?></td>                    
                    <td><?php echo "$".$total . ".00"?></td>            
                    <td>    
                        <div class="dos_columnas">
                            <div class="form_ajustar">
                                <a class="padding" id="asistir" href="/api/asistio<?php echo $cita->id;?>" ><i data-id="<?php echo $cita->id; ?>" class="fa-regular fa-square-check"></i></a>                            
                            </div>
                            <div class="form_ajustar">
                                <form method="POST" class=" posponer" action="/api/eliminar">
                                    <input type="hidden" name="id" value="<?php echo $cita->id;?>">
                                    <!-- <input type="hidden" name="tipo" value="usuario"> -->
                                    <button type="submit" class="" value="" id="eliminar" data-id="<?php echo $cita->id; ?>">
                                        <i data-id="<?php echo $cita->id; ?>" class="fa-regular fa-rectangle-xmark"></i>
                                    </button>
                                </form>
                            </div>                            
                        </div>
                    </td>
                </tr>
            <?php endif?>
        <?php endforeach;?>
    </table>
</div>
</main>
<?php 
    $script="
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='build/js/buscador.js'></script>
    <script src='/build/JS/AccionesCita.js'></script>
    ";
?>
