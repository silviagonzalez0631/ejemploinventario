<?php
include '../config/conexion.php'; // Asegúrate de que la conexión a la base de datos esté configurada correctamente
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log para depuración
error_log("Solicitud recibida en registro.php");
error_log("POST data: " . print_r($_POST, true));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y limpiar datos
    $documento = trim($_POST['documento'] ?? '');
    $nombre = trim($_POST['nombre'] ?? '');
    $apellido = trim($_POST['apellido'] ?? '');
    $password_sin_hash = trim($_POST['contrasena'] ?? ''); // Asegúrate de que el nombre del campo coincida con el formulario
    $direccion = trim($_POST['direccion'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $correo = trim($_POST['correo'] ?? '');
    $rol_usuario = trim($_POST['rol_usuario'] ?? '');

    // Validar que los campos no estén vacíos
    if (empty($documento) || empty($nombre) || empty($apellido) || empty($correo) || empty($password_sin_hash) || empty($rol_usuario)) {
        echo json_encode(["success" => false, "message" => "Todos los campos son obligatorios."]);
        exit;
    }

    // Preparar la inserción
    $stmt = $pdo->prepare("INSERT INTO usuarios (documento, nombre, apellido, contrasena, direccion, telefono, correo, rol_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt->execute([$documento, $nombre, $apellido, $password_sin_hash, $direccion, $telefono, $correo, $rol_usuario])) {
        echo json_encode(["success" => true, "message" => "Usuario registrado correctamente."]);
    } else {
        error_log("Error al registrar el usuario: " . implode(", ", $stmt->errorInfo())); // Captura el error
        echo json_encode(["success" => false, "message" => "Error al registrar el usuario."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Método no permitido."]);
}
?>