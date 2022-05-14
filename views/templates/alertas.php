<?php 
// Iterara sobre el arreglo para encotrar['error']
foreach($alertas as $key =>$mensajes):
    // Iterara sobre el arreglo error para encontrar sus valores
        foreach($mensajes as $mensaje):
?>    
    <div class="alerta <?php echo $key?>">
        <p><?php echo $mensaje ?></p>
    </div>

<?php 
    endforeach;
endforeach;
?>