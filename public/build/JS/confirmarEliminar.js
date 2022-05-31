document.addEventListener('DOMContentLoaded', function() {
    eliminar();
});



function eliminar() {
    const btnsEliminar = document.querySelectorAll('#eliminar');
    const inputsValue = document.querySelectorAll('#idEliminar');
    // console.log(id);
    // inputsValue.forEach(inputValue => {
    //     console.log(inputValue);
    // });
    btnsEliminar.forEach(btnEliminar => {
        btnEliminar.addEventListener('click', (e) => {
            e.preventDefault();
        });
    });

    // btnEliminar.addEventListener('click', (e) => {
    //     const id = inputsValue[contBtns].value;
    //     e.preventDefault();
    //     confirmar(id);
    // });


}

function confirmar(id) {
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
    datos.append('tipo', 'producto');
    try {
        const url = "http://localhost:3000/inventario/eliminar";
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
            text: 'Producto no pudo ser eliminado',
            // footer: '<a href="">Why do I have this issue?</a>'
            button: 'OK'
        }).then(() => {
            setTimeout(() => {
                window.location.reload();
            }, 1000);
        })
    }
}