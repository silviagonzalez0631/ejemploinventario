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