cargarCategorias();
function cargarCategorias() {
    const action = "cargarCategorias";
    fetch('../models/php/categoria.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ action })
    })
    .then(response => response.json())
    .then(data => {
        let tbody = document.getElementById('listaCategorias');
        tbody.innerHTML = '';
        data.forEach(categoria => {
            let tr = document.createElement('tr');
            tr.setAttribute('data-id', categoria.idcategoria); // Añade el data-id aquí
            tr.innerHTML = `
                <td>${categoria.idcategoria}</td>
                <td>${categoria.nombre}</td>
                <td>${categoria.descripcion}</td>
                <td>
                    <button class="btn btn-primary btn-sm" onclick="abrirModalEditar(${categoria.idcategoria})">Editar</button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarCategoria(${categoria.idcategoria})">Eliminar</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    })
    .catch(error => console.error('Error:', error));
}

function abrirModalEditar(id) {
    // Obtener los datos de la categoría y llenar el formulario del modal
    fetch(`../php/categoria.php?id=${id}`)
    .then(response => response.json())
    .then(categoria => {
        document.getElementById('idCategoria').value = categoria.idcategoria;
        document.getElementById('nombreCategoria').value = categoria.nombre;
        document.getElementById('descripcionCategoria').value = categoria.descripcion;
        // Mostrar el modal
        new bootstrap.Modal(document.getElementById('modalEditar')).show();
    })
    .catch(error => console.error('Error:', error));
}

function eliminarCategoria(id) {
    if (confirm('¿Estás seguro de que deseas eliminar esta categoría?')) {
        // Realizar una solicitud AJAX para eliminar la categoría
        fetch(`../models/php/eliminarcategorias.php?id=${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Categoría eliminada exitosamente');
                // Recargar la página para actualizar la lista de categorías
                cargarCategorias();
            } else {
                alert('Error al eliminar la categoría');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error al eliminar la categoría');
        });
    }
}

// Manejar el envío del formulario de edición
document.getElementById('formularioEditar').addEventListener('submit', function(e) {
    e.preventDefault();
    const id = document.getElementById('idCategoria').value;
    const nombre = document.getElementById('nombreCategoria').value;
    const descripcion = document.getElementById('descripcionCategoria').value;

    fetch(`..models/php/editarcategorias.php`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            id,
            nombre,
            descripcion
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Categoría actualizada exitosamente');
            // Cerrar el modal
            new bootstrap.Modal(document.getElementById('modalEditar')).hide();
            // Recargar la lista de categorías
            cargarCategorias();
        } else {
            alert('Error al actualizar la categoría');
        }
    })
    .catch(error => console.error('Error:', error));
});