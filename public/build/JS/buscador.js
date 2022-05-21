document.addEventListener('DOMContentLoaded', function() {
    buscarFechas();
});
const inputfecha = document.querySelector('#fecha');

function buscarFechas() {
    inputfecha.addEventListener('input', e => {
        const fechaSeleccionada = e.target.value;
        window.location = `?fecha=${fechaSeleccionada}`
    });
}