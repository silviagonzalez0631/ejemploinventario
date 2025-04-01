cargarProductos();
function cargarProductos() {
    const action = "cargarProductos";
    fetch('../models/php/producto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({action})
    })
    .then(response => response.json())
    .then(data => {
        let tbody = document.getElementById('listaProductos');
        tbody.innerHTML = '';
        data.forEach(producto => {
            let tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${producto.idproductos}</td>
                <td><img src="../imagenesProductos/${producto.imagen}" alt="${producto.nombre}" width="30"></td>
                <td>${producto.nombre}</td>
                <td>${producto.descripcion}</td>
                <td>${producto.precio}</td>
                <td>${producto.categoria}</td>
                <td>${producto.proveedor}</td>
                <td>
                    <button class="btn btn-primary btn-sm" onclick="abrirModalEditarProducto(${producto.idproductos})">Editar</button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${producto.idproductos})">Eliminar</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    })
    .catch(error => console.error('Error:', error));
}

function abrirModalEditarProducto(id) {
    // Obtener los datos del producto y llenar el formulario del modal
    fetch(`../php/producto.php?id=${id}`)
    .then(response => response.json())
    .then(producto => {
        document.getElementById('editarIdProducto').value = producto.idproductos;
        document.getElementById('editarNombreProducto').value = producto.nombre;
        document.getElementById('editarDescripcionProducto').value = producto.descripcion;
        document.getElementById('editarPrecioProducto').value = producto.precio;
        document.getElementById('editarCategoriaProducto').value = producto.categoria;
        document.getElementById('editarProveedorProducto').value = producto.proveedor;
        // Mostrar el modal
        new bootstrap.Modal(document.getElementById('editarProductoModal')).show();
    })
    .catch(error => console.error('Error:', error));
}

function eliminarProducto(id) {
    if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
        // Realizar una solicitud AJAX para eliminar el producto
        fetch(`../php/producto.php?id=${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Producto eliminado exitosamente');
                // Recargar la página para actualizar la lista de productos
                cargarProductos();
            } else {
                alert('Error al eliminar el producto');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al eliminar el producto');
        });
    }
}

// Manejar el envío del formulario de edición
document.getElementById('editarProductoForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const id = document.getElementById('editarIdProducto').value;
    const nombre = document.getElementById('editarNombreProducto').value;
    const descripcion = document.getElementById('editarDescripcionProducto').value;
    const precio = document.getElementById('editarPrecioProducto').value;
    const categoria = document.getElementById('editarCategoriaProducto').value;
    const proveedor = document.getElementById('editarProveedorProducto').value;

    fetch(`../models/php/editarproducto.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id,
            nombre,
            descripcion,
            precio,
            categoria,
            proveedor
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Producto actualizado exitosamente');
            // Cerrar el modal
            new bootstrap.Modal(document.getElementById('editarProductoModal')).hide();
            // Recargar la lista de productos
            cargarProductos();
        } else {
            alert('Error al actualizar el producto');
        }
    })
    .catch(error => console.error('Error:', error));
});