<?php include '../views/navbar.php'; ?> <!-- Incluye el navbar aquí -->

</header>

<!--lista de productos-->

<div class="container mt-5" id="proveedor">
    <h2 class="mb-3 text-center">Lista de proveedores</h2>
    <table class="table table-striped" id="tablaProveedores">
        <thead>
            <tr>
                <th>Id</th>
                <th>Documento</th>
                <th>Nombre Completo</th>
                <th>Telefono</th>
                <th>Direccion</th>
                <th>Descripcion</th>
                <th>Botones</th>
            </tr>
        </thead>
        <tbody id="listaProveedores">
            <?php
            include '../config/conexion.php';
            $query = "SELECT * FROM proveedores";
            $result = $conexion->query($query);
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['idproveedores'] . "</td>";
                echo "<td>" . $row['documento'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['telefono'] . "</td>";
                echo "<td>" . $row['direccion'] . "</td>";
                echo "<td>" . $row['descripcion'] . "</td>";
                echo "<td>
                        <button type='button' class='btn btn-primary btn-sm' data-id='" . $row['idproveedores'] . "' data-bs-toggle='modal' data-bs-target='#editarProvedoresModal' onclick='abrirModalEditar(" . $row['idproveedores'] . ")'>Editar</button>
                        <button type='button' class='btn btn-danger btn-sm' data-id='" . $row['idproveedores'] . "' onclick='eliminarProveedores(" . $row['idproveedores'] . ")'>Eliminar</button>
                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../views/footer.php'; ?> <!-- Incluye el footer aquí -->

<script>
    function eliminarProveedores(id) {
        if (confirm('¿Estás seguro de que deseas eliminar este proveedor?')) {
            window.location.href = '../models/eliminarproveedor.php?id=' + id;
        }
    }
</script>