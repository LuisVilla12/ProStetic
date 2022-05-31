const inputCrear = document.querySelector('#crear');
document.addEventListener('DOMContentLoaded', function() {
   crear();
});

function crear(){
    console.log(inputCrear);
    inputCrear.addEventListener('click', (e) => {
         
    });
}

async function crear_dos() {
    // const datos = new FormData();
    // datos.append('id', id);
    const url = "http://localhost:3000/inventario/crear";
    const respuesta = await fetch(url, {
        method: 'POST'
    });
    const resultado = await respuesta.json();
    console.log(resultado); 
}
