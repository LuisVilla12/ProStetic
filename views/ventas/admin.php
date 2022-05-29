<?php
// debuguear($citas)
?>
<main class="contenedor">   
    <h1 class="admin__titulo">Nueva venta</h1>
    <p>Seleccionar cita:</p>
    <select name="id_citas" id="id_citas" class="campo__input">
    <?php if(!$citas): ?>
        <option>No hay citas</option> 
    <?php else:?>               
    <option value="" selected>--Sin seleccionar--</option>
    <?php $idCita=0;
    foreach ($citas as $key=>$cita):?>                    
    <?php if($idCita !==$cita->id):
            $idCita=$cita->id;
            $total=0;
            $cadena='';
    ?>
    <option value="<?php echo $cita->id?>"><?php echo $cita->cliente ?></option>
    <?php endif;?>
    <?php endforeach;?>
    <?php endif;?>
    </select>
    
    <?php if($id==''):?>
        <p>Por favor seleccione una cita</p>
    <?php else:?>
        <?php $idCita=0;
        foreach ($citas as $key=>$cita):?>
            <?php if($id==$cita->id):?>                  
                <?php if($idCita !==$cita->id):
                    $idCita=$cita->id;
                    $total=0;
                    $cadena='';
                ?>                                                      
                    <p><?php echo $cita->horaInicio ?></p>
                    <p><?php echo $cita->cliente ?></p>    
                <?php endif;?>                                    
                <?php 
                    $cadena .= $cita->servicio . ',';
                    $total=$total+ intval($cita->precio_1);
                ?>                        
                <?php 
                    $actual=$cita->id;
                    $proximo=$citas[$key+1]->id ?? 0;            
                    if(esUltimo($actual,$proximo)):?>
                        <p><?php echo $cadena;?></p>                    
                        <p><?php echo "$".$total . ".00"?></p>                
                    <?php endif?>
            <?php endif?>
        <?php endforeach;?>
    <!-- Cierra si selecciono una cita -->
    <?php endif;?>
</main>
<?php 
    $script="<script src='/build/js/ventas.js'></script>";
?>