<?php

include 'conexion.php';
header('Content-Type: application/json');

$documentoRegistro = $_POST['documentoRegistro'] ?? '';
$nombreRegistro = $_POST['nombreRegistro'] ?? '';
$apellidoRegistro = $_POST['apellidoRegistro'] ?? '';
$contraseñaRegistro = $_POST['contraseñaRegistro'] ?? '';
$direccionRegistro = $_POST['direccionRegistro'] ?? '';
$telefonoRegistro = $_POST['telefonoRegistro'] ?? '';
$correoRegistro = $_POST['correoRegistro'] ?? '';
$rolRegistro = $_POST['rolRegistro'] ?? '';

// Depuración: Verificar qué campos están vacíos
$camposVacios = [];
if (empty($documentoRegistro)) $camposVacios[] = 'documentoRegistro';
if (empty($nombreRegistro)) $camposVacios[] = 'nombreRegistro';
if (empty($apellidoRegistro)) $camposVacios[] = 'apellidoRegistro';
if (empty($contraseñaRegistro)) $camposVacios[] = 'contraseñaRegistro';
if (empty($direccionRegistro)) $camposVacios[] = 'direccionRegistro';
if (empty($telefonoRegistro)) $camposVacios[] = 'telefonoRegistro';
if (empty($correoRegistro)) $camposVacios[] = 'correoRegistro';
if (empty($rolRegistro)) $camposVacios[] = 'rolRegistro';

if (!empty($camposVacios)) {
    echo json_encode(['success' => false, 'message' => 'Todos los campos son requeridos', 'camposVacios' => $camposVacios]);
    exit;
}

// Verificar que el rol exista
$queryRol = "SELECT idroles FROM roles WHERE idroles = ?";
$stmtRol = $conexion->prepare($queryRol);
$stmtRol->bind_param("i", $rolRegistro);
$stmtRol->execute();
$resultRol = $stmtRol->get_result();
$rol = $resultRol->fetch_assoc();

if (!$rol) {
    echo json_encode(['success' => false, 'message' => 'El rol seleccionado no existe']);
    exit;
}

// Hash de la contraseña
$contraseñaHash = password_hash($contraseñaRegistro, PASSWORD_BCRYPT);

$query = "INSERT INTO usuarios (documento, nombre, apellido, contrasena, direccion, telefono, correo, IDRol) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conexion->prepare($query);
$stmt->bind_param("issssssi", $documentoRegistro, $nombreRegistro, $apellidoRegistro, $contraseñaHash, $direccionRegistro, $telefonoRegistro, $correoRegistro, $rolRegistro);

try {
    $stmt->execute();
    echo json_encode(['success' => true, 'message' => 'Registro exitoso']);
} catch (mysqli_sql_exception $e) {
    error_log("Error en registro: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Error al registrar el usuario']);
}
?>