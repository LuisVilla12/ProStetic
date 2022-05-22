<?php
// Validar si la sessione esta iniciada

// $tipo=1;
if (!isset($_SESSION)) {
    session_start();
    
}

$nombre=$_SESSION['nombre']??'';
$login=$_SESSION['correo']??'';
$autenticar=$_SESSION['login']??'';
$tipo=$_SESSION['tipo'] ?? 1;    
// debuguear($tipo);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProStetic</title>
    <!-- Meta Datos -->
    <!-- Meta -->
    <meta name="keywords" content="Estica,servicios,citas,agenda,empleados,salud,belleza,imagens">
    <meta name="description" content="Sistema de agenda para la validación y registro de citas">
    <meta name="author" content="Luis Villa">
    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- Preload -->
    <link rel="preload" href="../build/css/app.css" as="style">
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>
    <header class="header">
        <div class="header__barra contenedor">
            <a href="/">
                <h3 class="header__titulo">ProStetic</h3>
            </a>
            <nav class="nav">
                <?php if ($tipo=='1'):?>
                    <a href="#" class="nav__a"><i class="fa-solid fa-users" ></i>Nosotros</a>
                    <a href="#" class="nav__a"><i class="fa-solid fa-scissors"></i>Servicios</a>
                    <a href="#" class="nav__a"><i class="fa-solid fa-images" id="#galeria"></i>Galería</a>
                    <a href="#" class="nav__a"><i class="fa-solid fa-calendar-days"></i>Citas</a>                    
                    <?php if(!$autenticar):?>
                        <a class="nav__a" href="/login"><i class="fa-solid fa-user"></i>Iniciar sesión</a>
                    <?php else: ?>
                        <a class="nav__a" href="/logout"><i class="fa-solid fa-user"></i><?php echo $nombre?></a>
                    <?php endif;?>                    
                <?php endif?>
                <?php if($tipo=='2') :?>
                    <a href="/admin" class="nav__a"><i class="fa-solid fa-home"></i>Menú</a>
                    <a href="/agenda" class="nav__a"><i class="fa-solid fa-calendar"></i>Agenda</a>
                    <a href="/proveedores/admin" class="nav__a"><i class="fa-solid fa-truck-field"></i>Proveedores</a>
                    <a href="/inventario/admin" class="nav__a"><i class="fa-solid fa-boxes-stacked"></i>Inventario</a>
                    <!-- <a href="/usuarios/admin" class="nav__a"><i class="fa-solid fa-users"></i>Usuarios</a> -->
                    <a class="nav__a" href="/logout"><i class="fa-solid fa-user"></i><?php echo $nombre?></a>
                    <?php endif?>
            </nav>
            <div class="menu">
                <a href="#">
                    <i class="fas fa-bars"></i>
                </a>
            </div>
        </div>
        <?php if($inicio):?>
            <div class="header__contenido contenedor">
                <h2 class="header__frase">No lo dejes para despues, si quieres un cambio hazlo ya!</h2>
            </div>
        <?php endif;?>
    </header>
    <div class="menu__hidden"></div>
    <?php echo $contenido; ?>
    <footer class="footer">
        <p class="footer__copy">&copy; Todos los derechos reservados</p>
    </footer>
    <script src="../build/JS/menu_movil.js"></script>
    <!-- <script src="../build/JS/imagenes.js"></script> -->
    <script src="https://kit.fontawesome.com/d2c5d4b6e4.js" crossorigin="anonymous"></script>
</body>

<?php echo $script?? '';?>
</html>