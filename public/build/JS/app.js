let paso = 1;
console.log(paso);
let pasoInicial = 1;
let pasoFinal = 3;
const cita = {
    nombre: '',
    fecha: '',
    hora: '',
    servicios: []
}
document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

function iniciarApp() {
    tabs(); // Cambia la sección cuando se presionen los tabs
    mostrarSeccion(); //Muestra la seccion dependiendo del tab
    botonesPaginador(); //Muestro o oculta los botones dependiendo de los tabs
    paginaSiguiente();
    paginaAnterior();
    consultarAPI();
}

function tabs() {
    const botones = document.querySelectorAll('.tabs button');
    // Itera por el arreglo de botones
    botones.forEach((boton) => {
        // el evento click
        boton.addEventListener('click', (e) => {
            paso = parseInt(e.target.dataset.paso);
            mostrarSeccion();
            botonesPaginador();
        })

    })
}

function mostrarSeccion() {
    // ocultar seccion con clase mostrar
    const seccionAnterior = document.querySelector('.mostrar');
    if (seccionAnterior) {
        seccionAnterior.classList.remove('mostrar');
    }
    // selecciona la seccion con el paso
    const seccionActual = document.querySelector(`#paso-${paso}`);
    seccionActual.classList.add('mostrar');

    //ocultar tap con clase actual
    const tabAnterior = document.querySelector('.actual');
    if (tabAnterior) {
        tabAnterior.classList.remove('actual');
    }
    const tabActual = document.querySelector(`[data-paso="${paso}"]`);
    tabActual.classList.add('actual');
}

function botonesPaginador() {
    const btnAnterior = document.querySelector('#anterior');
    const btnSiguiente = document.querySelector('#siguiente');
    if (paso === 1) {
        btnAnterior.classList.add('ocultar_btn');
        btnSiguiente.classList.remove('ocultar_btn');
    } else if (paso === 3) {
        btnAnterior.classList.remove('ocultar_btn');
        btnSiguiente.classList.add('ocultar_btn');
    } else {
        btnAnterior.classList.remove('ocultar_btn');
        btnSiguiente.classList.remove('ocultar_btn');
    }
    mostrarSeccion();
}

function paginaAnterior() {
    const paginaAnterior = document.querySelector('#anterior');
    paginaAnterior.addEventListener('click', e => {
        if (paso <= pasoInicial) return;
        paso--;
        botonesPaginador();
    })
}

function paginaSiguiente() {
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click', e => {
        if (paso >= pasoFinal) return;
        paso++;
        botonesPaginador();
    })
}
//await hace un tiempo de espera para que realize la petición
async function consultarAPI() {
    try {
        const url = 'http://localhost:3000/api/servicios';
        // Hace la peticion a la url
        const resultado = await fetch(url);
        // Hace un tipo json
        const servicios = await resultado.json();
        mostrarServicios(servicios);
    } catch (error) {
        console.log(error);
    }
}

function mostrarServicios(servicios) {
    const listadoservicios = document.querySelector('#servicios');

    servicios.forEach(servicio => {
        const { id, nombre, precio } = servicio;
        const nombreServicio = document.createElement('P');
        nombreServicio.textContent = nombre;
        nombreServicio.classList.add('servicio__nombre');

        const precioServicio = document.createElement('P');
        precioServicio.textContent = `$ ${precio}`;
        precioServicio.classList.add('servicio__precio');

        const servicioDIV = document.createElement('DIV');
        servicioDIV.classList.add('servicio');
        servicioDIV.dataset.idServicio = id;

        servicioDIV.appendChild(nombreServicio);
        servicioDIV.appendChild(precioServicio);
        servicioDIV.onclick = function() {
            seleccionarServicio(servicio);
        };
        // console.log(servicioDIV);
        listadoservicios.appendChild(servicioDIV);
    });
    // listadoservicios.appendChild(servicioDIV);
}

function seleccionarServicio(servicio) {
    const { servicios } = cita;
    const divServicio = document.querySelector(`[data-id-servicio="${paso}"]`)
    cita.servicios = [...servicios, servicio];
    console.log(cita);
}