const proveedor = {
    id: '',
    nombre: '',
    telefono: '',
    correo: '',
    RFC: '',
    MetodoDePago: '',
    calle: '',
    colonia: '',
    numExt: '',
    numInt: '',
    CP: '',
    ciudad: '',
    estado: ''
}

const btnCrear = document.querySelector('#crearProveedor');
btnCrear.onclick = crearProveedor;


async function crearProveedor() {
    const { id, nombre, telefono, correo, RFC, MetodoDePago, calle, colonia, numExt, numInt, CP, ciudad, estado } = proveedor;

    const datos = new FormData();
    const url = "http://localhost:3000/proveedores/crear";
    const respuesta = await fetch(url, {
        method: 'POST',
        body: datos
    });
    const resultado = await respuesta.json();
    console.log(resultado.resultado);

}