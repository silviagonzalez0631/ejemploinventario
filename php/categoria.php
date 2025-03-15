<?php
include 'conexion.php';
header('Content-Type: application/json');

$action = json_decode(file_get_contents('php://input'), true)['action'] ?? '';

if ($action === 'cargarCategorias') {
    $sql = "SELECT idcategoria, nombre, descripcion FROM categorias";
    $result = $conexion->query($sql);

    $categorias = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $categorias[] = $row;
        }
    }

    echo json_encode($categorias);

    $conexion->close();
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM categorias WHERE idcategoria = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $categoria = $result->fetch_assoc();
    echo json_encode($categoria);

    $conexion->close();
}

$query = "SELECT * FROM categorias";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" . $row['descripcion'] . "</td>";
    echo "<td>";
    echo "<button class='btn btn-warning btn-sm' onclick='editarCategoria(" . $row['id'] . ")'>Editar</button>";
    echo "<button class='btn btn-danger btn-sm' onclick='eliminarCategoria(" . $row['id'] . ")'>Eliminar</button>";
    echo "</td>";
    echo "</tr>";
}

?>