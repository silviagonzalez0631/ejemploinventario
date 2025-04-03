<?php include '../views/navbar.php'; ?> <!-- Incluye el navbar aquí -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Categorías</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
    <h2 class="mb-3 text-center">Lista de Categorías</h2>
    <table class="table table-striped" id="tablaCategorias">
    <thead>
        <tr>
        <th>Id</th>
        <th>Nombre de la Categoría</th>
        <th>Descripción</th>
        <th>Botones</th>
        </tr>
        </thead>
        <tbody id="listaCategorias">
        <?php
        include '../config/conexion.php';
        $query = "SELECT * FROM categorias";
        $result = $conexion->query($query);
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['idcategoria'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>
                    <button type='button' class='btn btn-primary btn-sm' data-id='" . $row['idcategoria'] . "' data-bs-toggle='modal' data-bs-target='#modalEditar' onclick='abrirModalEditar(" . $row['idcategoria'] . ")'>Editar</button>
                    <button type='button' class='btn btn-danger btn-sm' onclick='eliminarCategoria(" . $row['idcategoria'] . ")'>Eliminar</button>
                </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</div>

    <!-- Modal para editar categorías -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="formularioEditar">

            <input type="hidden" id="idCategoria" name="idCategoria">
            <div class="mb-3">
            <label for="nombreCategoria" class="form-label">Nombre de la Categoría:</label>
            <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria">
            </div>
            <div class="mb-3">
            <label for="descripcionCategoria" class="form-label">Descripción:</label>
            <input type="text" class="form-control" id="descripcionCategoria" name="descripcionCategoria">
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" id="guardarCambios" class="btn btn-primary">Guardar cambios</button>
        </div>
    </div>
    </div>
</div>

    <?php include '../views/footer.php'; ?> <!-- Incluye el footer aquí -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../public/js/categorias.js"></script>
    <script>
        function eliminarCategoria(id) {
            if (confirm('¿Estás seguro de que deseas eliminar esta categoría?')) {
                window.location.href = '../models/eliminarCategorias.php?id=' + id;
            }
        }
    </script>
</body>
</html>