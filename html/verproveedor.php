<?php include '../html/navbar.php'; ?> <!-- Incluye el navbar aquí -->

</header>

<!--lista de productos-->

<div class="container mt-5" id="productos">
    <h2 class="mb-3">Lista de productos</h2>
    <table class="table table-striped" id="tablaProductos">
        <thead>
            <tr>
                <th>Id</th>
                <th>Documento</th>
                <th>Nombre Completo</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Descripcion</th>
                <th>Acciones
                </th>
                
            </tr>
        </thead>
        <tbody id="listaProveedores">
        </tbody>
    </table>
</div>

<!-- Modal para editar proveedor -->
<div class="modal fade" id="editarProveedorModal" tabindex="-1" aria-labelledby="editarProveedorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarProveedorModalLabel">Editar Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarProveedorForm">
                    <input type="hidden" id="editarIdProveedor">
                    <div class="mb-3">
                        <label for="editarDocumentoProveedor" class="form-label">Documento</label>
                        <input type="text" class="form-control" id="editarDocumentoProveedor" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarNombreProveedor" class="form-label">Nombre Completo</label>
                        <input type="text" class="form-control" id="editarNombreProveedor" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarTelefonoProveedor" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="editarTelefonoProveedor" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarDireccionProveedor" class="form-label">Direccion</label>
                        <input type="text" class="form-control" id="editarDireccionProveedor" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarDescripcionProveedor" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="editarDescripcionProveedor" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../html/footer.php'; ?> <!-- Incluye el footer aquí -->
<?php include '../html/modaleditar.php'; ?> <!-- Incluye el modal aquí -->