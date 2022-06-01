    <main class="servicios">        
        <h2 class="servicios__titulo">Nuestros servicios</h2>
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
    <div class="centrar contenedor">
            <a href="/servicios" class="btn primario">Ver más...</a>
        </div>

    <article class="tramitar">
        <div class="tramitar__contenido">
            <h2 class="tramitar__titulo">Tramita tu cita</h2>
            <p>Reserva tu cita ahora mismo, conoce nuestros servicios de excelente calidad, garantizada tu satisfacción, ¡te esperamos!</p>
            <div class="tramitar__botones">
                <a href="/cita" class="btn primario">Tramitar cita</a>
            </div>
        </div>
    </article>
    <article class="galeria">
        <div class="galeria__grid">

        </div>
    </article>
    <article class="testimoniales">
        <h2 class="testimoniales__titulo">Testimoniales</h2>
        <div class="testimoniales__grid contenedor">
            <div class="testimonial">
                <div class="testimonial__contenido">
                    <h4>Nancy Elizabeth</h4>
                    <p>Fué mi primera vez, y quedé encantada!! Desde  la atención en local como telefónico muy rápido!!! Mis uñas quedaron hermosas 👌❤️</p>
                </div>
            </div>
            <div class="testimonial">
                <div class="testimonial__contenido">
                    <h4>Karla Espindola</h4>
                    <p>Es mi lugar favorita para hacerme las uñas, también me han trabajado nanoplastia. Tienen mucha variedad en su trabajo de belleza.</p>
                </div>
            </div>
            <div class="testimonial">
                <div class="testimonial__contenido">
                    <h4>Paola Lopez</h4>
                    <p>Excelente servicio y atención, ambiente muy agradable. El lugar es pequeño pero se organizan muy bien para que no se llene demasiado y tienen todas las medidas necesarias de prevención</p>
                </div>
            </div>
        </div>
    </article>