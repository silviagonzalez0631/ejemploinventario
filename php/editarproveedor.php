<?php
require_once 'conexion.php';

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['id'], $data['documento'], $data['nombre'], $data['telefono'], $data['direccion'], $data['descripcion'])) {
    $id = $data['id'];
    $documento = $data['documento'];
    $nombre = $data['nombre'];
    $telefono = $data['telefono'];
    $direccion = $data['direccion'];
    $descripcion = $data['descripcion'];

    $query = "UPDATE proveedores SET documento = ?, nombre = ?, telefono = ?, direccion = ?, descripcion = ? WHERE idproveedores = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("sssssi", $documento, $nombre, $telefono, $direccion, $descripcion, $id);

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