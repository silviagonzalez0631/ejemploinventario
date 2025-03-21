cargarProveedores();
function cargarProveedores() {
    const action = "cargarProveedores";
    fetch('../php/proveedor.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({action})
    })
    .then(response => response.json())
    .then(data => {
        let tbody = document.getElementById('listaProveedores');
        tbody.innerHTML = '';
        data.forEach(proveedor => {
            let tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${proveedor.idproveedores}</td>
                <td>${proveedor.documento}</td>
                <td>${proveedor.nombre}</td>
                <td>${proveedor.telefono}</td>
                <td>${proveedor.direccion}</td>
                <td>${proveedor.descripcion}</td>
                <td>
                    <button class="btn btn-primary btn-sm" onclick="abrirModalEditar(${proveedor.idproveedores})">Editar</button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarProveedor(${proveedor.idproveedores})">Eliminar</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    })
    .catch(error => console.error('Error:', error));
}

function abrirModalEditar(id) {
    // Obtener los datos del proveedor y llenar el formulario del modal
    fetch(`../php/proveedor.php?id=${id}`)
    .then(response => response.json())
    .then(proveedor => {
        document.getElementById('editarIdProveedor').value = proveedor.idproveedores;
        document.getElementById('editarDocumentoProveedor').value = proveedor.documento;
        document.getElementById('editarNombreProveedor').value = proveedor.nombre;
        document.getElementById('editarTelefonoProveedor').value = proveedor.telefono;
        document.getElementById('editarDireccionProveedor').value = proveedor.direccion;
        document.getElementById('editarDescripcionProveedor').value = proveedor.descripcion;
        // Mostrar el modal
        new bootstrap.Modal(document.getElementById('editarProveedorModal')).show();
    })
    .catch(error => console.error('Error:', error));
}

function eliminarProveedor(id) {
    if (confirm('¿Estás seguro de que deseas eliminar este proveedor?')) {
        // Realizar una solicitud AJAX para eliminar el proveedor
        fetch(`../php/eliminarproveedor.php?id=${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Proveedor eliminado exitosamente');
                // Recargar la lista de proveedores
                cargarProveedores();
            } else {
                alert('Error al eliminar el proveedor');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al eliminar el proveedor');
        });
    }
}

// Manejar el envío del formulario de edición
document.getElementById('editarProveedorForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const id = document.getElementById('editarIdProveedor').value;
    const documento = document.getElementById('editarDocumentoProveedor').value;
    const nombre = document.getElementById('editarNombreProveedor').value;
    const telefono = document.getElementById('editarTelefonoProveedor').value;
    const direccion = document.getElementById('editarDireccionProveedor').value;
    const descripcion = document.getElementById('editarDescripcionProveedor').value;

    fetch(`../php/editarproveedor.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id,
            documento,
            nombre,
            telefono,
            direccion,
            descripcion
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Proveedor actualizado exitosamente');
            // Cerrar el modal
            new bootstrap.Modal(document.getElementById('editarProveedorModal')).hide();
            // Recargar la lista de proveedores
            cargarProveedores();
        } else {
            alert('Error al actualizar el proveedor');
        }
    })
    .catch(error => console.error('Error:', error));
});