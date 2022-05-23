
<fieldset>
    <legend>Información general</legend>
    <div class="dos_campos">
    <div class="campo">
        <label class="campo__label" for="nombre">Nombre del servicio: </label>
        <input class="campo__input" type="text" id="nombre" name="servicio[nombre]" placeholder="Ingrese el nombre del servicio" value="<?php echo sanitizar($servicio->nombre); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="duracion">Duración: </label>
        <input class="campo__input" type="number" id="duracion" name="servicio[duracion]" step="0.01" placeholder="Ingrese la duración aproximada del servicio" value="<?php echo sanitizar($servicio->duracion); ?>">
    </div>
    </div>
    <div class="dos_campos">
    <div class="campo">
        <label class="campo__label" for="precio_1">Precio: </label>
        <input class="campo__input" type="number" id="precio_1" name="servicio[precio_1]" step="0.01" placeholder="Ingrese el precio normal del servicio" value="<?php echo sanitizar($servicio->precio_1); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="precio_2">Precio: </label>
        <input class="campo__input" type="number" id="precio_2" name="servicio[precio_2]" step="0.01" placeholder="Ingrese el precio condicional del servicio" value="<?php echo sanitizar($servicio->precio_2); ?>">
    </div>
    </div>    
</fieldset>