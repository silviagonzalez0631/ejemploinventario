<?php include '../html/navbar.php'; ?> <!-- Incluye el navbar aquí -->

</header>

<!--lista de categorias-->

<div class="container mt-5">
    <h2 class="mb-3 text-center">Lista de Categorías</h2>
    <table class="table table-striped" id="tablaCategorias">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Botones</th>
            </tr>
        </thead>
        <tbody id="listaCategorias">
            <?php
            include '../php/conexion.php';
            $query = "SELECT * FROM categorias";
            $result = $conexion->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['idcategoria'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "<td>
                        <button type='button' class='btn btn-primary btn-sm' data-id='" . $row['idcategoria'] . "' data-bs-toggle='modal' data-bs-target='#editarCategoriaModal' onclick='abrirModalEditar(" . $row['idcategoria'] . ")'>Editar</button>
                        <button type='button' class='btn btn-danger btn-sm' data-id='" . $row['idcategoria'] . "' onclick='eliminarCategoria(" . $row['idcategoria'] . ")'>Eliminar</button>
                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../html/footer.php'; ?> <!-- Incluye el footer aquí -->
<?php include '../html/modaleditarcategoria.php'; ?> <!-- Incluye el modal aquí -->