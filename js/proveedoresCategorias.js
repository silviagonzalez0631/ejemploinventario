
proveedoresCategorias();
function proveedoresCategorias() {
    const action = "cargarProveedoresCategorias";
    fetch('../php/producto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({action})
    })
    .then(response => response.json())
    .then(data => {
        console.log(data); // Agrega esto para ver la respuesta del servidor
        // Llenar el select de categorías
        let categoriaSelect = document.getElementById('categoriaProducto');
        data.categorias.forEach(categoria => {
            let option = document.createElement('option');
            option.value = categoria.idcategoria;
            option.textContent = categoria.nombre;
            categoriaSelect.appendChild(option);
        });

        // Llenar el select de proveedores
        let proveedorSelect = document.getElementById('proveedorProducto');
        data.proveedores.forEach(proveedor => {
            let option = document.createElement('option');
            option.value = proveedor.idproveedor;
            option.textContent = proveedor.nombre;
            proveedorSelect.appendChild(option);
        });
    })
    .catch(error => console.error('Error:', error));
}