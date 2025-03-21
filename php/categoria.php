<?php
// filepath: c:\xampp\htdocs\ejemploinventario\php\categoria.php
require_once 'conexion.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nombreCategoria'])) {
        // Crear categoria
        $nombre = $_POST['nombreCategoria'];
        $descripcion = $_POST['descripcionCategoria'];

        $query = "INSERT INTO categorias (nombre, descripcion) VALUES (?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("ss", $nombre, $descripcion);

        $response = [];
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Categoria creada exitosamente";
        } else {
            $response['success'] = false;
            $response['message'] = "Error al crear la categoria: " . $stmt->error;
        }

        echo json_encode($response);

        $stmt->close();
        $conexion->close();
    }
} else {
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

        $stmt->close();
        $conexion->close();
    } else {
        $query = "SELECT * FROM categorias";
        $result = mysqli_query($conexion, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['idcategoria'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['descripcion'] . "</td>";
            echo "<td>";
            echo "<button class='btn btn-warning btn-sm' onclick='editarCategoria(" . $row['idcategoria'] . ")'>Editar</button>";
            echo "<button class='btn btn-danger btn-sm' onclick='eliminarCategoria(" . $row['idcategoria'] . ")'>Eliminar</button>";
            echo "</td>";
            echo "</tr>";
        }
    }
}
?>