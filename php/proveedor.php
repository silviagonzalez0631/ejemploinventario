<?php
// conexion a la base de datos
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