<fieldset>
    <legend>Información general</legend>
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
    <legend>Datos de contacto</legend>
    <div class="dos_campos">
        <div class="campo">
            <label class="campo__label" for="correo">Correo electrónico: </label>
            <input class="campo__input" type="text" id="correo"   name="usuario[correo]" placeholder="Ingrese el correo electrónico" value="<?php echo sanitizar($usuario->correo); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="telefono">Teléfono: </label>
            <input class="campo__input" type="number" id="telefono"   name="usuario[telefono]" placeholder="Ingrese el teléfono" value="<?php echo sanitizar($usuario->telefono); ?>">
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
</fieldset>    