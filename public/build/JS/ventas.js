document.addEventListener('DOMContentLoaded', function() {
    buscarVentas();
});
const inputCita = document.querySelector('#id_citas');

function buscarVentas() {
    inputCita.addEventListener('input', e => {
        const idCita = e.target.value;
        console.log(idCita);
        window.location = `?id=${idCita}`
    });
}