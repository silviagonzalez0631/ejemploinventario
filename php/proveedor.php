<?php
require_once 'conexion.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['documentoProveedor'])) {
        // Crear proveedor
        $documento = $_POST['documentoProveedor'];
        $nombre = $_POST['nombreProveedor'];
        $telefono = $_POST['telefonoProveedor'];
        $direccion = $_POST['direccionProveedor'];
        $descripcion = $_POST['descripcionProveedor'];

        $query = "INSERT INTO proveedores (documento, nombre, telefono, direccion, descripcion) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("sssss", $documento, $nombre, $telefono, $direccion, $descripcion);

        $response = [];
        if ($stmt->execute()) {
            $response['success'] = true;
            $response['message'] = "Proveedor creado exitosamente";
        } else {
            $response['success'] = false;
            $response['message'] = "Error al crear el proveedor: " . $stmt->error;
        }

        echo json_encode($response);

        $stmt->close();
        $conexion->close();
    }

include 'conexion.php';
header('Content-Type: application/json');

$action = json_decode(file_get_contents('php://input'), true)['action'] ?? '';

if ($action === 'cargarProveedores') {
    $sql = "SELECT idproveedores, documento, nombre, telefono, direccion, descripcion FROM proveedores";
    $result = $conexion->query($sql);

    $proveedor = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $proveedor[] = $row;
        }
    }

    echo json_encode($proveedor);

    $conexion->close();
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM proveedores WHERE idproveedores = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $proveedor = $result->fetch_assoc();
    echo json_encode($proveedor);

    $conexion->close();
}
}