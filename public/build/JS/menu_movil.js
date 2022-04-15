document.addEventListener('DOMContentLoaded', function() {
    MenuDesplegable();
    botones();
});
//FIXME: .hero era la clase
const hero = document.querySelector('.menu__hidden');
const body = document.querySelector('body');

function MenuDesplegable() {
    const menu = document.querySelector('.menu');
    const divMenuDeslizable = document.createElement('DIV');
    menu.onclick = function() {
        if (body.classList.contains('fijarbody')) {
            limpiarBotones();
            return;
        }

        divMenuDeslizable.classList.add('contenedor-menu');
        const opcion1 = document.createElement('A');
        const opcion2 = document.createElement('A');
        const opcion3 = document.createElement('A');
        const opcion4 = document.createElement('A');
        const opcion5 = document.createElement('A');

        opcion1.href = "#.html";
        opcion2.href = "#.html";
        opcion3.href = "#.html";
        opcion4.href = "#.html";
        opcion5.href = "#.html";

        opcion1.innerHTML = '<i class="fa-solid fa-users"></i>Nosotros';
        opcion2.innerHTML = '<i class="fa-solid fa-scissors"></i>Servicios';
        opcion3.innerHTML = '<i class="fa-solid fa-images"></i>Galeria';
        opcion4.innerHTML = '<i class="fa-solid fa-calendar-days"></i>Citas';
        opcion5.innerHTML = '<i class="fa-solid fa-user"></i>Iniciar sesion';

        divMenuDeslizable.appendChild(opcion1);
        divMenuDeslizable.appendChild(opcion2);
        divMenuDeslizable.appendChild(opcion3);
        divMenuDeslizable.appendChild(opcion4);
        divMenuDeslizable.appendChild(opcion5);

        hero.appendChild(divMenuDeslizable);
        body.classList.add('fijarbody');
    }
    divMenuDeslizable.onclick = function() {
        limpiarBotones();
    }
}

function limpiarBotones() {
    const divMenuDeslizable = document.querySelector('.contenedor-menu');
    const enlaces = document.querySelectorAll('.contenedor-menu a');
    // quitar la clase de fijar body
    body.classList.remove('fijarbody');
    // seleccionar y eliminar todos los enlaces del menu
    enlaces.forEach(enlace => {
        divMenuDeslizable.removeChild(enlace);
    });
    // quitar el overlay del menu
    hero.removeChild(divMenuDeslizable);
}