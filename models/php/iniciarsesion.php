<?php
session_start();
header('Content-Type: application/json');

include_once 'conexion.php';

try {
    // Obtener los datos del formulario
    $documento = $_POST['documento'];
    $password_usuario = $_POST['contrasena'];

    if (empty($documento) || empty($password_usuario)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son requeridos']);
        exit;
    }

    // Buscar usuario por documento
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE documento = ?");
    $stmt->execute([$documento]);
    $usuario = $stmt->fetch();

    if ($usuario) {
        // Log para depuración
        error_log("Usuario encontrado: " . print_r($usuario, true));

        // Verificar la contraseña
        if ($password_usuario === $usuario['contrasena']) {
            // Log para depuración
            error_log("Contraseña verificada correctamente para el usuario: " . $usuario['documento']);

            // Iniciar sesión
            $_SESSION['usuario_id'] = $usuario['idusuario'];
            $_SESSION['documento'] = $usuario['documento'];
            $_SESSION['rol_usuario'] = $usuario['rol_usuario']; 
            echo json_encode([
                'success' => true,
                'message' => 'Inicio de sesión exitoso'
            ]);
            
        } else {
            // Log para depuración
            error_log("Contraseña incorrecta para el usuario: " . $usuario['documento']);
            error_log("Contraseña ingresada: " . $password_usuario);
            error_log("Contraseña almacenada: " . $usuario['contrasena']);
            echo json_encode([
                'success' => false, 
                'message' => 'Contraseña incorrecta'
            ]);
        }
    } else {
        echo json_encode([
            'success' => false, 
            'message' => 'No existe un usuario con ese documento'
        ]);
    }
} catch(PDOException $e) {
    error_log("Error en login: " . $e->getMessage());
    echo json_encode([
        'success' => false, 
        'message' => 'Error al procesar el inicio de sesión'
    ]);
}
?>