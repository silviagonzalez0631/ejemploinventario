document.addEventListener('DOMContentLoaded', cargarCategorias);

function cargarCategorias() {
    const action = "cargarCategorias";
    fetch('../php/categoria.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({action})
    })
    .then(response => response.json())
    .then(data => {
        let tbody = document.getElementById('listaCategorias');
        tbody.innerHTML = '';
        data.forEach(categoria => {
            let tr = document.createElement('tr');
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
        document.getElementById('editarIdCategoria').value = categoria.idcategoria;
        document.getElementById('editarNombreCategoria').value = categoria.nombre;
        document.getElementById('editarDescripcionCategoria').value = categoria.descripcion;
        // Mostrar el modal
        new bootstrap.Modal(document.getElementById('editarCategoriaModal')).show();
    })
    .catch(error => console.error('Error:', error));
}

function eliminarCategoria(id) {
    if (confirm('¿Estás seguro de que deseas eliminar esta categoría?')) {
        // Realizar una solicitud AJAX para eliminar la categoría
        fetch(`../php/eliminarcategoria.php?id=${id}`, {
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
document.getElementById('editarCategoriaForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const id = document.getElementById('editarIdCategoria').value;
    const nombre = document.getElementById('editarNombreCategoria').value;
    const descripcion = document.getElementById('editarDescripcionCategoria').value;

    fetch(`../php/editarcategoria.php`, {
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
            new bootstrap.Modal(document.getElementById('editarCategoriaModal')).hide();
            // Recargar la lista de categorías
            cargarCategorias();
        } else {
            alert('Error al actualizar la categoría');
        }
    })
    .catch(error => console.error('Error:', error));
});