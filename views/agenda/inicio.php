<h1 class="titulo">Administracion</h1>
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
    <div class="agenda">
        <?php 
            $idCita=0;
            foreach ($citas as $key=>$cita):
        ?>        
            <?php 
                if($idCita !==$cita->id):
                $idCita=$cita->id;
                $total=0;
            ?>                            
                <div class="agenda__cita">                                        
                    <p class="agenda__nombre">Cliente: <span> <?php echo $cita->cliente?></span></p>
                    <div class="agenda__datos">
                        <p class="agenda__hora">Hora: <span> <?php echo $cita->hora?></span></p>
                        <p class="agenda__telefono">Telefono: <span> <?php echo $cita->telefono?></span></p>                    
                    </div>
                    <p class="agenda__titulo">Servicios:</p>
            <?php endif;?>    
            <p class="agenda__servicio_nombre"><?php echo $cita->servicio . ',';?></p>            
            <?php $total=$total+ intval($cita->precio_1); ?>            
            
            <?php 
            $actual=$cita->id;
            $proximo=$citas[$key+1]->id ?? 0;            
            if(esUltimo($actual,$proximo)):?>
            <p class="agenda__total">Total: <span>$<?php echo $total?>.00</span></p>
            </div>
            <?php endif?>
        <?php endforeach;?>
    </div>
</div>
</main>
<?php 
    $script="<script src='build/js/buscador.js'></script>";
?>
