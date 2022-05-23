<?php 
$total=0;
?>
<main class="contenedor">   
    <h1 class="admin__titulo">Nueva venta</h1>
    <p>Seleccionar cita:</p>
    <select name="id_citas" id="id_citas" class="campo__input">                
        <option value="" selected>--Sin seleccionar--</option>
        <?php 
            foreach($citas as $cita):?>
            <option value="<?php echo $cita->id?>"><?php echo $cita->cliente ?></option>                    
        <?php endforeach?>
    </select>      
    <!-- <?php 
        $total=$total+ intval($cita->precio_1);
    ?> -->
    <p>Cliente:<?php echo $cita->nombre?></p>
    <p>Servicios:<?php echo $cita->servicio?></p>
    <p>Cobro:<?php echo $cita->total?></p>
    
</main>
<?php 
    $script="<script src='/build/js/ventas.js'></script>";
?>