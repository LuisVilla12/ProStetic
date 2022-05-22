<?php 
$nombre=$_SESSION['nombre'] ?? '';
$id=$_SESSION['id'];       
?>
<h1 class="titulo">Registrar nueva cita</h1>
<main class="contenedor">
    <nav class="tabs">
        <button type="button" data-paso="1" class="actual">Servicios</button>
        <button type="button" data-paso="2">Informacion cita</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>
    <div id="paso-1" class="seccion">
        <h2>Servicios</h2>
        <p class="text-center">Elige tus servicios a continuación</p>
        <div id="servicios" class="listado-servicios"></div>
    </div>
    <div id="paso-2" class="seccion">
        <h2>Tus datos y cita</h2>
        <p class="text-center">Coloca tus datos y fecha de tu cita</p>
        <form class="formulario">
            <div class="tres_campos">
            <div class="campo">
                <label class="campo__label" for="nombre">Nombre:</label>
                <input class="campo__input" type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre" 
                value="<?php echo $nombre?>" disabled>
            </div>
            <div class="campo">
                <label class="campo__label" for="fecha">Fecha:</label>
                <input class="campo__input" type="date" name="fecha" id="fecha" min=<?php echo date('Y-m-d'
                ,strtotime('+1 day'))?>>
            </div>
            <div class="campo">
                <label class="campo__label" for="hora">Hora:</label>
                <!-- <input class="campo__input" type="time" name="hora" id="hora"> -->
                <!--TODO: CHECAR-->
                <select name="id_horario" id="hora" class="campo__input">
                    <?php foreach($horarios as $horario):?>
                        <option value="<?php echo $horario->id?>"><?php echo $horario->horaInicio ."-". $horario->horaFin ?></option>                    
                    <?php endforeach?>
                </select>      
            </div>
            </div>
            <div class="campo">
                <input type="hidden" name="id" id="id" value="<?php echo $id?>">
            </div>
        </form>
    </div>
    <div id="paso-3" class="seccion  contenido_resumen">
        <h2>Resumen</h2>        
    </div>
    <div class="paginacion">
        <button id="anterior" class="btn">&laquo;Anterior</button>
        <button id="siguiente" class="btn" > Siguiente&raquo;</button>
    </div>
</main>

<?php 
    $script="
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='../build/JS/app.js'></script>
    "
?>

