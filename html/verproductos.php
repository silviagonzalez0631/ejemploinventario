<?php include '../html/navbar.php'; ?> <!-- Incluye el navbar aquí -->

</header>

<!--lista de productos-->

<div class="container mt-5" id="productos">
    <h2 class="mb-3">Lista de productos</h2>
    <table class="table table-striped" id="tablaProductos">
        <thead>
            <tr>
                <th>Id</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Proveedor</th>
            </tr>
        </thead>
        <tbody id="listaProductos">
        </tbody>
    </table>
</div>

<?php include '../html/footer.php'; ?> <!-- Incluye el footer aquí -->