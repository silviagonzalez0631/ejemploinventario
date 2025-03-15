<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['success' => false, 'message' => 'No has iniciado sesión']);
    exit;
}

require_once 'conexion.php';

try {
    $id_usuario = $_SESSION['usuario_id'];
    
    // Agregar un log para depuración
    error_log("Buscando usuario con ID: " . $id_usuario);
    
    $stmt = $pdo->prepare("SELECT documento, nombre, correo, telefono, direccion FROM usuarios WHERE idusuario = ?");
    $stmt->execute([$id_usuario]);
    $usuario = $stmt->fetch();

    if ($usuario) {
        error_log("Usuario encontrado: " . json_encode($usuario));
        echo json_encode([
            'success' => true,
            'data' => [
                'documento' => $usuario['documento'],
                'nombre' => $usuario['nombre'],
                'correo' => $usuario['correo'],
                'telefono' => $usuario['telefono'],
                'direccion' => $usuario['direccion']
            ]
        ]);
    } else {
        error_log("Usuario no encontrado para ID: " . $id_usuario);
        echo json_encode(['success' => false, 'message' => 'Usuario no encontrado']);
    }
} catch(PDOException $e) {
    error_log("Error en verperfil.php: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Error al obtener datos del perfil']);
}
?>