document.addEventListener('DOMContentLoaded', function() {
    eliminar();
});

function eliminar() {
    const btnEliminar = document.querySelector('#eliminar');
    console.log(btnEliminar);
    btnEliminar.addEventListener('click', (e) => {
        e.preventDefault();
        // confirmar_dos(e);
    });
}

function confirmar(e) {
    Swal.fire({
        title: '¿Seguro que lo deseas eliminar un producto?',
        text: "No podras revertir esta accion",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                    'Eliminado!',
                    'Producto ha sido eliminado',
                    'success'
                )
                // setTimeout(() => {
                //     window.location.reload();
                // }, 1000);
        }
    })
}

async function confirmar_dos(e) {
    const inputValue = document.querySelector('#idEliminar');
    const id = inputValue.textContent;
    const datos = new FormData();
    datos.append('id', id);
    const url = "http://localhost:3000/inventario/eliminar";
    const respuesta = await fetch(url, {
        method: 'POST',
        // body cuerpo de la peticion
        body: datos
    });
    const resultado = await respuesta.json();
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
}