<!-- Modal para editar categoria -->
<div class="modal fade" id="editarCategoriaModal" tabindex="-1" aria-labelledby="editarCategoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarCategoriaModalLabel">Editar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarCategoriaForm">
                    <input type="hidden" id="editarIdCategoria">
                    <div class="mb-3">
                        <label for="editarNombreCategoria" class="form-label">Nombre Categoria</label>
                        <input type="text" class="form-control" id="editarNombreCategoria" required>
                    </div>

                    <div class="mb-3">
                        <label for="editarDescripcionCategoria" class="form-label">Descripcion</label>
                        <input type="text" class="form-control" id="editarDescripcionCategoria" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>