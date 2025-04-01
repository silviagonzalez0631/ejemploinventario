<?php
include '../../config/conexion.php'; // Asegúrate de que la conexión a la base de datos esté configurada correctamente
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

    // Preparar la inserción con manejo de errores mejorado
    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (documento, nombre, apellido, contrasena, direccion, telefono, correo, rol_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt->execute([$documento, $nombre, $apellido, $password_sin_hash, $direccion, $telefono, $correo, $rol_usuario])) {
            echo json_encode(["success" => true, "message" => "Usuario registrado correctamente."]);
        } else {
            $errorInfo = $stmt->errorInfo();
            error_log("Error al registrar el usuario: " . implode(", ", $errorInfo));
            
            // Mensaje más específico según el tipo de error
            if ($errorInfo[1] == 1452) {
                echo json_encode(["success" => false, "message" => "Error: El rol de usuario no existe en el sistema."]);
            } else {
                echo json_encode(["success" => false, "message" => "Error al registrar el usuario: " . $errorInfo[2]]);
            }
        }
    } catch (PDOException $e) {
        error_log("PDOException en registro: " . $e->getMessage());
        
        if ($e->getCode() == '23000') {
            echo json_encode(["success" => false, "message" => "Error: Verifica que el rol de usuario exista en el sistema."]);
        } else {
            echo json_encode(["success" => false, "message" => "Error en la base de datos: " . $e->getMessage()]);
        }
    }
} else {
    echo json_encode(["success" => false, "message" => "Método no permitido."]);
}
?>