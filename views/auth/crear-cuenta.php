<h1 class="titulo">Crear cuenta</h1>
<p class="descripcion">Ingresa tus datos</p>
    
<main class="contenedor">    
    <?php
        include_once __DIR__ . '/../templates/alertas.php';
    ?>
    <form action="" class="formulario" method="POST">
    <fieldset>
        <legend>Informacion general</legend>
        <div class="tres_campos">
        <div class="campo">
            <label class="campo__label" for="nombre">Nombre: </label>
            <input class="campo__input" type="text" id="nombre" name="usuario[nombre]" placeholder="Ingrese su nombre(s)" required value="<?php echo sanitizar($usuario->nombre);?>">
        </div>        
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
    <div class="tres_campos">
        <div class="campo">
            <label class="campo__label" for="correo">Correo electronico: </label>
            <input class="campo__input" type="text" id="correo" required name="usuario[correo]" placeholder="Ingrese la correo" value="<?php echo sanitizar($usuario->correo); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="telefono">Telefono: </label>
            <input class="campo__input" type="number" id="telefono" required name="usuario[telefono]" placeholder="Ingrese la telefono" value="<?php echo sanitizar($usuario->telefono); ?>">
        </div>
        <div class="campo">
            <label class="campo__label" for="fechaN">Fecha de nacimiento: </label>
            <input class="campo__input" type="date" id="fechaN" name="usuario[fechaN]" value="<?php echo sanitizar($usuario->fechaN); ?>">
        </div>
    </div>
    <div class="dos_campos">
        <div class="campo">
            <label class="campo__label" for="contrase??a">Contrase??a: </label>
            <input class="campo__input" type="password" id="contrase??a" required name="usuario[contrase??a]" placeholder="Ingrese la contrase??a" >
        </div>
        <div class="campo">
            <label class="campo__label" for="confirmar_contrase??a">Repetir contrase??a: </label>
            <input class="campo__input" type="password" id="confirmar_contrase??a" required name="usuario[confirmar_contrase??a]" placeholder="Confirme la contrase??a" >
        </div>
    </div>
    </fieldset>    
    <div class="centrar_campos">
            <input type="submit" value="Crear cuenta" class="btn-enviar txt-center">
    </div>
    </form>
    <div class="space_between">
        <p class="text-center">
            <a href="/login">??Ya tienes una cuenta? 
                <span>Inicia sesi??n aqu??</span></a></p>
        <p class="text-center">
            <a href="/olvide">??Olvidaste tu contrase??a?</a></p>
    </div>
</main>