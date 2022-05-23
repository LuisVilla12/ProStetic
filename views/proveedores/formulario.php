<fieldset>
    <legend>Información general</legend>
    <div class="dos_campos">
    <div class="campo">
        <label class="campo__label" for="nombre">Nombre: </label>
        <input class="campo__input" type="text" id="nombre" name="proveedor[nombre]" placeholder="Ingrese el nombre del proveedor" value="<?php echo sanitizar($proveedor->nombre); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="RFC">RFC: </label>
        <input class="campo__input" type="text" id="RFC" name="proveedor[RFC]" placeholder="Ingrese el RFC del proveedor" value="<?php echo sanitizar($proveedor->RFC); ?>">
    </div>
    </div>    
</fieldset>
<fieldset>
    <legend>Dirección</legend>
    <div class="dos_campos">
        <div class="campo">
            <label class="campo__label" for="calle">calle: </label>
            <input class="campo__input" type="text" id="calle" name="proveedor[calle]" placeholder="Ingrese una calle" value="<?php echo sanitizar($proveedor->calle); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="colonia">colonia: </label>
            <input class="campo__input" type="text" id="colonia" name="proveedor[colonia]" placeholder="Ingrese una colonia" value="<?php echo sanitizar($proveedor->colonia); ?>">
        </div>
    </div>
    <div class="tres_campos">
        <div class="campo">
            <label class="campo__label" for="numExt">Número Exterior: </label>
            <input class="campo__input" type="number" id="numExt" name="proveedor[numExt]" placeholder="Ingrese el número exterior" value="<?php echo sanitizar($proveedor->numExt); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="numInt">Número Interior: </label>
            <input class="campo__input" type="number" id="numInt" name="proveedor[numInt]" placeholder="Ingrese el número Interior" value="<?php echo sanitizar($proveedor->numInt); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="CP">CP: </label>
            <input class="campo__input" type="number" id="CP" name="proveedor[CP]" placeholder="Ingrese el CP" value="<?php echo sanitizar($proveedor->CP); ?>">
        </div>
    </div>
    <div class="dos_campos">
        <div class="campo">
            <label class="campo__label" for="ciudad">Ciudad: </label>
            <input class="campo__input" type="text" id="ciudad" name="proveedor[ciudad]" placeholder="Ingrese la ciudad" value="<?php echo sanitizar($proveedor->ciudad); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="estado">Estado: </label>
            <input class="campo__input" type="text" id="estado" name="proveedor[estado]" placeholder="Ingrese el estado" value="<?php echo sanitizar($proveedor->estado); ?>">
        </div>
    </div>
</fieldset>    
<fieldset>
    <legend>Información de contacto</legend>
    <div class="dos_campos">
        <div class="campo">
            <label class="campo__label" for="telefono">Teléfono: </label>
            <input class="campo__input" type="number" id="telefono" placeholder="Ingrese el n° teléfonico" min="1" name="proveedor[telefono]" value="<?php echo sanitizar($proveedor->telefono); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="correo">Correo electrónico: </label>
            <input class="campo__input" type="email" id="correo" placeholder="Ingrese el correo electrónico" name="proveedor[correo]" value="<?php echo sanitizar($proveedor->correo); ?>">
        </div>
    </div>
    <div class="campo">
        <label>Método de pago</label>
        <select name="proveedor[MetodoDePago]" class="campo__input" id="vendedor">
            <option value="0" selected disabled>--Sin seleccionar--</option>
            <option value="EFECTIVO" <?php echo $proveedor->MetodoDePago === 'EFECTIVO' ? 'selected' : ''; ?>>Efectivo</option>
            <option value="TARJETA" <?php echo $proveedor->MetodoDePago === 'TARJETA' ? 'selected' : ''; ?>>Tarjeta</option>
        </select>
    </div>
</fieldset>