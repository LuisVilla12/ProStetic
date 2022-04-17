<fieldset>
    <legend>Informacion general</legend>
    <div class="campo">
        <label class="campo__label" for="nombre">Nombre: </label>
        <input class="campo__input" type="text" id="nombre" name="usuario[nombre]" placeholder="Ingrese su nombre(s)" required value="<?php echo sanitizar($usuario->nombre);?>">
    </div>
    <div class="dos_campos">
    <div class="campo">
        <label class="campo__label" for="apellidoPat">Apellido Paterno: </label>
        <input class="campo__input" required type="text" id="apellidoPat" name="usuario[apellidoPat]" placeholder="Ingrese su apellido paterno" value="<?php echo sanitizar($usuario->apellidoPat); ?>">
    </div>
    <div class="campo">
        <label class="campo__label" for="apellidoMat">Apellido Materno: </label>
        <input class="campo__input" type="text" id="apellidoMat" name="usuario[apellidoMat]"  required placeholder="Ingrese su apellido materno" value="<?php echo sanitizar($usuario->apellidoMat); ?>">
    </div>
    </div>
    
</fieldset>
<fieldset>
    <legend>Datos de contacto</legend>
    <div class="dos_campos">
        <div class="campo">
            <label class="campo__label" for="correo">Correo electronico: </label>
            <input class="campo__input" type="text" id="correo" required name="usuario[correo]" placeholder="Ingrese la correo" value="<?php echo sanitizar($usuario->correo); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="telefono">Telefono: </label>
            <input class="campo__input" type="text" id="telefono" required name="usuario[telefono]" placeholder="Ingrese la telefono" value="<?php echo sanitizar($usuario->telefono); ?>">
        </div>
    </div>
    
    <div class="dos_campos">
        <div class="campo">
            <label class="campo__label" for="contraseña">Contraseña: </label>
            <input class="campo__input" type="password" id="contraseña" required name="usuario[contraseña]" placeholder="Ingrese la contraseña" value="<?php echo sanitizar($usuario->contraseña); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="confirmar_contraseña">Repetir contraseña: </label>
            <input class="campo__input" type="password" id="confirmar_contraseña" required name="usuario[confirmar_contraseña]" placeholder="Confirme la contraseña" value="<?php echo sanitizar($usuario->contraseña); ?>">
        </div>
    </div>
</fieldset>    