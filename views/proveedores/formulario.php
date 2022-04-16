<fieldset>
    <legend>Informacion general</legend>
    <div class="campo">
        <label class="campo__label" for="nombre">Nombre: </label>
        <input class="campo__input" type="text" id="nombre" name="proveedor[nombre]" placeholder="Ingrese el nombre del proveedor" value="<?php echo sanitizar($proveedor->nombre); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="RFC">RFC: </label>
        <input class="campo__input" type="text" id="RFC" name="proveedor[RFC]" placeholder="Ingrese el RFC del proveedor" value="<?php echo sanitizar($proveedor->RFC); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="direccion">Direccion: </label>
        <input class="campo__input" type="text" id="direccion" name="proveedor[direccion]" placeholder="Ingrese la dirección" value="<?php echo sanitizar($proveedor->direccion); ?>">
    </div>
</fieldset>
<fieldset>
    <legend>Información de contacto</legend>
    <div class="campo">
        <label class="campo__label" for="telefono">Telefono: </label>
        <input class="campo__input" type="number" id="telefono" placeholder="Ingrese el n° telefonico" min="1" name="proveedor[telefono]" value="<?php echo sanitizar($proveedor->telefono); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="correo">Correo electronico: </label>
        <input class="campo__input" type="email" id="correo" placeholder="Ingrese el correo electronico" name="proveedor[correo]" value="<?php echo sanitizar($proveedor->correo); ?>">
    </div>
    <div class="campo">
        <label>Metodo de pago</label>
        <div class="campo__radios">
            <div class="campo__radio">
                <label class="campo__label" for="efectivo">Efectivo:</label>
                <input name="proveedor[metodoDePago]" type="radio" value="Efectivo" id="efectivo">
            </div>
            <div class="campo__radio">
                <label class="campo__label" for="tarjeta">Tarjeta:</label>
                <input name="proveedor[MetodoDePago]" type="radio" value="Transferencia" id="tarjeta">
            </div>
        </div>
    </div>
</fieldset>