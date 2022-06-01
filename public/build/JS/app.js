let paso = 1;
let pasoInicial = 1;
let pasoFinal = 3;
let numServicio = 1;
let total = 0;
let horario = '';
const cita = {
    id: '',
    nombre: '',
    fecha: '',
    id_horario: '',
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
    // consulta a traves de una api los datos de PHP
    consultarAPI();
    idCliente();
    nombreCliente();
    seleccionarFecha();
    seleccionarHora();
    mostrarResumen();
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
            // if (paso === 3) {
            //     mostrarResumen();
            // }
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
        mostrarResumen();
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
        const { id, nombre, precio_1, duracion } = servicio;
        const nombreServicio = document.createElement('P');
        nombreServicio.textContent = nombre;
        nombreServicio.classList.add('servicio__nombre');

        const detallesServicio = document.createElement('DIV');
        detallesServicio.classList.add('servicio__detalles');

        const precioServicio = document.createElement('P');
        precioServicio.textContent = `$ ${precio_1}`;
        precioServicio.classList.add('servicio__precio');

        const duracionServicio = document.createElement('P');
        duracionServicio.innerHTML = `<span><i class="fa-solid fa-clock"></i></span> ${duracion}min`;
        duracionServicio.classList.add('servicio__duracion');

        const servicioDIV = document.createElement('DIV');
        servicioDIV.classList.add('servicio');
        servicioDIV.dataset.idServicio = id;

        detallesServicio.appendChild(precioServicio);
        detallesServicio.appendChild(duracionServicio);


        servicioDIV.appendChild(nombreServicio);
        servicioDIV.appendChild(detallesServicio);
        servicioDIV.onclick = function() {
                seleccionarServicio(servicio);      
        };
        listadoservicios.appendChild(servicioDIV);
    });
}

function seleccionarServicio(servicio) {
    const { id } = servicio;
    const { servicios } = cita;
    const divServicio = document.querySelector(`[data-id-servicio="${id}"]`)
    // console.log(servicios.length);
    if(servicios.length<=2){
        // Comprobar si el servicio ya fue agregado
        if (servicios.some(agregado => agregado.id === id)) {
            // Servicio ya agregado        
            cita.servicios = servicios.filter(agregado => agregado.id !== id);
            divServicio.classList.remove('seleccionado');
        } else {
            // Servicio nuevo
            cita.servicios = [...servicios, servicio];
            divServicio.classList.add('seleccionado');
        }
    }else{
         Swal.fire({
             icon: 'error',
             title: 'Error!',
             text: 'Maximo de tres servicios por cita',
             button: 'OK'
         }).then(() => {
            setTimeout(() => {
                window.location.reload();
            }, 500);
        })
     };
    
    // console.log(servicios);
}

function nombreCliente() {
    const nombreCliente = document.querySelector('#nombre').value;
    cita.nombre = nombreCliente;
}

function idCliente() {
    const clienteID = document.querySelector('#id').value;
    cita.id = clienteID;
}

function seleccionarFecha() {
    const inputFecha = document.querySelector('#fecha');
    inputFecha.addEventListener('input', (e) => {
        const dia = new Date(e.target.value).getUTCDay();
        // 0 es domingo,1 lunes,2 martes... 6 sabado
        if ([6, 0].includes(dia)) {
            e.target.value = '';
            mostrarAlerta('Fines de semana no abrimos', 'error', '.formulario');
        } else {
            cita.fecha = e.target.value;
        }
    });
}

function seleccionarHora() {
    const inputHora = document.querySelector('#hora');
    inputHora.addEventListener('input', (e) => {
        cita.id_horario = e.target.value;
        // horario = e.target.text;
        // console.log(cita);
    });
}

function mostrarAlerta(mensaje, tipo, elemento, desaparece = true) {
    // Si ya existe una alerta
    const alertaAnterior = document.querySelector('.alerta');
    if (alertaAnterior) {
        alertaAnterior.remove();
    };
    const alerta = document.createElement('DIV');
    const mensajeAlerta = document.createElement('P');
    mensajeAlerta.textContent = mensaje;
    alerta.classList.add('alerta');
    alerta.classList.add(tipo);
    alerta.appendChild(mensajeAlerta);
    const formulario = document.querySelector(elemento);
    formulario.appendChild(alerta);
    if (desaparece) {
        setTimeout(() => {
            alerta.remove();
        }, 3000);
    }

}

function mostrarResumen() {
    numServicio = 1;
    total = 0;
    const contenidoResumen = document.querySelector('.contenido_resumen');
    while (contenidoResumen.firstChild) {
        contenidoResumen.removeChild(contenidoResumen.firstChild);
    }
    if (Object.values(cita).includes('') || cita.servicios.length === 0) {
        // console.log('HAcen falta datos');
        mostrarAlerta('Hacen falta datos', 'error', '.contenido_resumen', false);
        return
    }
    const { nombre, fecha, id_horario, servicios } = cita;
    const nombreCliente = document.createElement('P');
    nombreCliente.innerHTML = `<span>Nombre: </span> ${nombre}`;
    nombreCliente.classList.add('detalles__cliente');
    // formatear la fecha
    const fechaObj = new Date(fecha);
    const mes = fechaObj.getMonth();
    const dia = fechaObj.getDate() + 2;
    const año = fechaObj.getFullYear();

    const fechaUTC = new Date(Date.UTC(año, mes, dia));
    const opciones = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' }
    const fechaFormateada = fechaUTC.toLocaleDateString('es-MX', opciones);


    const contenedorFechaHora = document.createElement('DIV');
    contenedorFechaHora.classList.add('detalles__fecha_hora');

    const fechaCita = document.createElement('P');
    fechaCita.innerHTML = `<span>Fecha: </span> ${fechaFormateada}`;

    const horaCita = document.createElement('P');
    // horaCita.innerHTML = `<span>Hora: </span> ${id_horario}`;

    contenedorFechaHora.appendChild(fechaCita);
    contenedorFechaHora.appendChild(horaCita);

    const textServicios = document.createElement('P');
    textServicios.textContent = "Servicios:";
    textServicios.classList.add('detalles__txt');

    contenidoResumen.appendChild(nombreCliente);
    contenidoResumen.appendChild(contenedorFechaHora);
    contenidoResumen.appendChild(textServicios);

    servicios.forEach(servicio => {
        const { id, nombre, precio_1, duracion } = servicio;
        const contenedorServicio = document.createElement('DIV');
        contenedorServicio.classList.add('detalles__contenido');

        const nombreServicio = document.createElement('P');
        nombreServicio.innerHTML = `${numServicio}.-<span></span> ${nombre}`;

        const precioServicio = document.createElement('P');
        precioServicio.innerHTML = `<span>$</span> ${precio_1}`;
        total = total + parseInt(precio_1);



        contenedorServicio.appendChild(nombreServicio);
        contenedorServicio.appendChild(precioServicio);

        contenidoResumen.appendChild(contenedorServicio);
        numServicio++;
    })
    const totaltxt = document.createElement('P');
    totaltxt.innerHTML = `<span>Total: </span> $${total}.00`;
    totaltxt.classList.add('detalles__total');
    contenidoResumen.appendChild(totaltxt);

    const contenedorRegistrarCita = document.createElement('DIV');
    contenedorRegistrarCita.classList.add('centrar');

    const btnRegistrarCita = document.createElement('BUTTON');
    btnRegistrarCita.classList.add('btn');

    btnRegistrarCita.textContent = 'Reservar cita';
    btnRegistrarCita.onclick = reservarCita;

    contenedorRegistrarCita.appendChild(btnRegistrarCita);
    contenidoResumen.appendChild(contenedorRegistrarCita);
}
async function reservarCita() {

    const { id, fecha, id_horario, servicios } = cita;
    const idServicio = servicios.map(servicio => servicio.id);

    const datos = new FormData();
    datos.append('idUsuario', id);
    datos.append('fecha', fecha);
    datos.append('id_horario', id_horario);
    datos.append('servicios', idServicio);
    try {
        const url = "http://localhost:3000/api/citas";
        const respuesta = await fetch(url, {
            method: 'POST',
            // body cuerpo de la peticion
            body: datos
        });
        const resultado = await respuesta.json();
        console.log(resultado.resultado);
        if (resultado.resultado) {
            Swal.fire({
                icon: 'success',
                title: 'Cita registrada',
                text: 'Tu cita fue registrada correctamente',
                // footer: '<a href="">Why do I have this issue?</a>'
                button: 'OK'
            }).then(() => {
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
            })
        };
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Tu cita no fue registrada',
            // footer: '<a href="">Why do I have this issue?</a>'
            button: 'OK'
        }).then(() => {
            setTimeout(() => {
                window.location.reload();
            }, 3000);
        })
    }

    // console.log([...datos]);

}