<?php
// filepath: c:\xampp\htdocs\ejemploinventario\php\editarcategoria.php
require_once 'conexion.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'], $data['nombre'], $data['descripcion'])) {
    $id = $data['id'];
    $nombre = $data['nombre'];
    $descripcion = $data['descripcion'];

    $query = "UPDATE categorias SET nombre = ?, descripcion = ? WHERE idcategoria = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssi", $nombre, $descripcion, $id);

    $response = [];
    if ($stmt->execute()) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
    }
} else {
    $response = ['success' => false, 'message' => 'Datos incompletos'];
}

echo json_encode($response);

$conexion->close();
?>