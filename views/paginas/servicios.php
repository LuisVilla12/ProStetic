<h2 class="servicios__titulo">Nuestros servicios</h2>
<main>
    <div class="servicios__grid contenedor">
    <?php foreach ($servicios as $servicio):?>
        <div class="servicio">
            <div class="servicio__mask">
                <img loading="lazy" src="<?php echo '/build/img/'.$servicio->url?>" alt="servicio1" class="servicio__img">                    
            </div>
            <div class="servicio__contenido">
                <p class="servicio__nombre"><?php echo $servicio->nombre?></p>
                <p class="servicio__precio">$ <span><?php echo $servicio->precio_1?></span></p>
            </div>
        </div>
<?php endforeach;?>
</main>