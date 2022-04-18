<fieldset>
    <legend>Informacion general</legend>
    <div class="campo">
        <label class="campo__label" for="nombre">Nombre: </label>
        <input class="campo__input" type="text" id="nombre" name="producto[nombre]" placeholder="Ingrese su nombre(s)" required value="<?php echo sanitizar($producto->nombre);?>">
    </div>
    <div class="dos_campos">
    <div class="campo">
        <label class="campo__label" for="proveedor">Proveedor: </label>
        <select name="producto[idProveedor]" class="campo__input" id="proveedor">
            <option value="0" selected disabled>--Sin seleccionar--</option>
            <?php foreach ($proveedores as $proveedor):?>
                <option 
                    <?php echo $producto->idProveedor === $proveedor->id ? 'selected' : ''; ?>
                    value="<?php echo $proveedor->id; ?>"><?php echo $proveedor->nombre?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="campo">
        <label class="campo__label" for="marca">Marca: </label>
        <input class="campo__input" type="text" id="marca" name="producto[marca]"  required placeholder="Ingrese su apellido materno" value="<?php echo sanitizar($producto->marca); ?>">
    </div>
    </div>
    
</fieldset>
<fieldset>
    <legend>Datos interesantes</legend>
    <div class="tres_campos">
        <div class="campo">
            <label class="campo__label" for="precioVenta">Precio Venta: </label>
            <input class="campo__input" type="text" id="precioVenta" required name="producto[precioVenta]" placeholder="Ingrese la precioVenta" value="<?php echo sanitizar($producto->precioVenta); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="precioCompra">Precio Compra: </label>
            <input class="campo__input" type="text" id="precioCompra" required name="producto[precioCompra]" placeholder="Ingrese la precioCompra" value="<?php echo sanitizar($producto->precioCompra); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="cantidad">Cantidad: </label>
            <input class="campo__input" type="number" id="cantidad" required name="producto[cantidad]" placeholder="Ingrese la cantidad" value="<?php echo sanitizar($producto->cantidad); ?>">
        </div>
    </div>
    <div class="campo">
        <label class="campo__label" for="descripcion">Descripcion: </label>
        <textarea name="producto[descripcion]" id="descripcion"><?php echo $producto->descripcion; ?></textarea>
    </div>
    
</fieldset>    