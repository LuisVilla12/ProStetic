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
    <legend>Datos de domicilio</legend>
    <div class="campo">
            <label class="campo__label" for="domicilio">Domicilio: </label>
            <input class="campo__input" type="text" id="domicilio" required name="usuario[domicilio]" placeholder="Ingrese el domicilio" value="<?php echo sanitizar($usuario->domicilio); ?>">
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
    <div class="dos_campos">
    <div class="campo">
            <label class="campo__label" for="fechaNacimiento">Fecha de nacimiento: </label>
            <input class="campo__input" type="date" id="fechaNacimiento" required name="usuario[fechaNacimiento]" value="<?php echo sanitizar($usuario->fechaNacimiento); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="cargo">Cargo: </label>
            <select name="producto[]" class="campo__input" id="proveedor">
                <option value="0" selected disabled>--Sin seleccionar--</option>
                <option value="jefe" <?php echo $empleado->cargo === $empleado->cargo ? 'selected' : ''; ?>>JEFE</option>
                <option value="estilista" <?php echo $empleado->cargo === $empleado->cargo ? 'selected' : ''; ?>>ESTILISTA</option>
                <option value="recepcionista" <?php echo $empleado->cargo === $empleado->cargo ? 'selected' : ''; ?> >RECEPCIONISTA</option>
        </select>
        </div>
    </div>
</fieldset>    