<?php 
debuguear($_POST);
?>
<fieldset>
    <legend>Informacion general</legend>
    <div class="tres_campos">
    <div class="campo">
        <label class="campo__label" for="nombre">Nombre: </label>
        <input class="campo__input" type="text" id="nombre" name="usuario[nombre]" placeholder="Ingrese su nombre(s)"   value="<?php echo sanitizar($usuario->nombre);?>">
    </div>    
    <div class="campo">
        <label class="campo__label" for="apellidoPat">Apellido Paterno: </label>
        <input class="campo__input"   type="text" id="apellidoPat" name="usuario[apellidoPat]" placeholder="Ingrese su apellido paterno" value="<?php echo sanitizar($usuario->apellidoPat); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="apellidoMat">Apellido Materno: </label>
        <input class="campo__input" type="text" id="apellidoMat" name="usuario[apellidoMat]"    placeholder="Ingrese su apellido materno" value="<?php echo sanitizar($usuario->apellidoMat); ?>">
    </div>
    </div>
    
</fieldset>
<fieldset>
    <legend>Datos de domicilio</legend>
    <div class="tres_campos">
    <div class="campo">
        <label class="campo__label" for="calle">Calle: </label>
        <input class="campo__input" type="text" id="calle"   name="domicilio[calle]" placeholder="Ingrese la calle" value="<?php echo sanitizar($domicilio->calle); ?>">
        <?php //echo sanitizar($usuario->calle); ?>
    </div>
    <div class="campo">
        <label class="campo__label" for="colonia">Colonia: </label>
        <input class="campo__input" type="text" id="colonia"   name="domicilio[colonia]" placeholder="Ingrese la colonia" value="<?php echo sanitizar($domicilio->colonia); ?>">
        <?php //echo sanitizar($usuario->colonia); ?>
    </div>
    <div class="campo">
        <label class="campo__label" for="CP">CP: </label>
        <input class="campo__input" type="number" id="CP"   name="domicilio[CP]" placeholder="Ingrese el CP" value="<?php echo sanitizar($domicilio->CP); ?>">
        <?php //echo sanitizar($usuario->CP); ?>
    </div>
    </div>
    
</fieldset>

<fieldset>
    <legend>Datos de contacto</legend>
    <div class="dos_campos">
        <div class="campo">
            <label class="campo__label" for="correo">Correo electronico: </label>
            <input class="campo__input" type="text" id="correo"   name="usuario[correo]" placeholder="Ingrese la correo" value="<?php echo sanitizar($usuario->correo); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="telefono">Telefono: </label>
            <input class="campo__input" type="text" id="telefono"   name="usuario[telefono]" placeholder="Ingrese la telefono" value="<?php echo sanitizar($usuario->telefono); ?>">
        </div>
    </div>
    
    <div class="dos_campos">
        <div class="campo">
            <label class="campo__label" for="contraseña">Contraseña: </label>
            <input class="campo__input" type="password" id="contraseña"   name="usuario[contraseña]" placeholder="Ingrese la contraseña" value="">
        </div>
        <div class="campo">
            <label class="campo__label" for="confirmar_contraseña">Repetir contraseña: </label>
            <input class="campo__input" type="password" id="confirmar_contraseña"   name="usuario[confirmar_contraseña]" placeholder="Confirme la contraseña" value="">
        </div>
    </div>
    <div class="dos_campos">
    <div class="campo">
            <label class="campo__label" for="fechaNacimiento">Fecha de nacimiento: </label>
            <input class="campo__input" type="date" id="fechaNacimiento"   name="usuario[fechaNacimiento]" value="<?php echo sanitizar($usuario->fechaNacimiento); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="cargo">Cargo: </label>
            <select name="" class="campo__input" id="proveedor">               
        </select>
        </div>
    </div>
</fieldset>    