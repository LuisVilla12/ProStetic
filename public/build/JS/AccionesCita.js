const btnsEliminar = document.querySelectorAll('#eliminar');
const enlacesAsistir = document.querySelectorAll('#asistir');

document.addEventListener('DOMContentLoaded', function() {
    eliminar();
    validarAsistencia();
});
function validarAsistencia() {
    // console.log(enlacesAsistir);
    enlacesAsistir.forEach(enlace => {
        enlace.addEventListener('click', (e) => {
            e.preventDefault();
            const id =  e.target.dataset.id;
            // console.log(id); 
            confirmarAsistencia(id); 
        });
    });
}
function confirmarAsistencia(id) {
    Swal.fire({
        title: '¿Desea confirmar la asistencia a esta cita?',
        text: "No podras revertir esta accion",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, asistió'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Exito!',
                'Cita ha sido confirmada',
                'success'
            )
            confirmarAsistencia_dos(id)
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        }
    })
}
async function confirmarAsistencia_dos(id) {
    // const datos = new FormData();
    // datos.append('id', id);
    try {
        const url = "http://localhost:3000/api/asistio?id=" + id;
        const respuesta = await fetch(url, {
            method: 'GET'
        });
        const resultado = await respuesta.json();
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Cita no puedo ser cancelada',
            // footer: '<a href="">Why do I have this issue?</a>'
            button: 'OK'
        }).then(() => {
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        })
    }
}
// ELIMINAR
function eliminar() {
    // console.log(btnsEliminar);
    btnsEliminar.forEach(btnEliminar => {
        btnEliminar.addEventListener('click', (e) => {
            e.preventDefault();
            const id =  e.target.dataset.id;
            // console.log(id); 
            confirmarEliminar(id); 
        });
    });
}

function confirmarEliminar(id) {
    Swal.fire({
        title: '¿Seguro que lo desea cancelar esta cita?',
        text: "No podras revertir esta accion",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Eliminado!',
                'Cita ha sido cancelada',
                'success'
            )
            confirmar_dos(id)
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        }
    })
}



async function confirmar_dos(id) {
    // console.log(id);
    const datos = new FormData();
    datos.append('id', id);
    try {
        const url = "http://localhost:3000/api/eliminar";
        const respuesta = await fetch(url, {
            method: 'POST',
            // body cuerpo de la peticion
            body: datos
        });
        const resultado = await respuesta.json();
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Cita no puedo ser cancelada',
            // footer: '<a href="">Why do I have this issue?</a>'
            button: 'OK'
        }).then(() => {
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        })
    }
}