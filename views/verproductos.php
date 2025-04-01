<?php include '../views/navbar.php'; ?> <!-- Incluye el navbar aquí -->

<!--lista de productos-->

<div class="container mt-5" id="productos">
    <h2 class="mb-3 ">Lista de productos</h2>
    <table class="table table-striped" id="tablaProductos">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>categoria</th>
                <th>proveedor</th>
                <th>imagenesProductos</th>
                <th>Botones
                </th>
                
            </tr>
        </thead>
        <tbody id="listaProductos">
        </tbody>
    </table>
</div>

<!-- Modal para editar producto -->
<div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="editarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarProductoModalLabel">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarProductoForm">
                    <input type="hidden" id="editarIdProducto">
                    <div class="mb-3">
                        <label for="editarDocumentoProducto" class="form-label">Documento</label>
                        <input type="text" class="form-control" id="editarDocumentoProducto" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarNombreProducto" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="editarNombreProducto" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarTelefonoProducto" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="editarTelefonoProducto" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarDireccionProducto" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="editarDireccionProducto" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarDescripcionProducto" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="editarDescripcionProducto" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../views/footer.php'; ?> <!-- Incluye el footer aquí -->