cargarProductos();
function cargarProductos() {
    const action = "cargarProductos";
    fetch('../php/producto.php', {
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
                <td>${producto.idproducto}</td>
                <td><img src="${producto.imagen}" alt="${producto.nombre}" width="30"></td>
                <td>${producto.nombre}</td>
                <td>${producto.descripcion}</td>
                <td>${producto.precio}</td>
                <td>${producto.IDCategoria}</td>
                <td>${producto.IDProveedor}</td>
            `;
            tbody.appendChild(tr);
        });
    })
    .catch(error => console.error('Error:', error));
}