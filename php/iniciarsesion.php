<?php
session_start();
header('Content-Type: application/json');

require_once 'conexion.php';

try {
    // Obtener datos del formulario
    $documento = $_POST['documento'];
    $contrasena = $_POST['contrasena'];

    // Validar que todos los campos estén presentes
    if (empty($documento) || empty($contrasena)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son requeridos']);
        exit;
    }

    // Buscar usuario por documento
    $query = "SELECT * FROM usuarios WHERE documento = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $documento); // Cambié "i" a "s" porque documento es un string
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    if ($usuario) {
        // Depuración: Verificar la contraseña recuperada y la ingresada
        error_log("Contraseña ingresada: " . $contrasena);
        error_log("Contraseña almacenada: " . $usuario['contrasena']);

        // Verificar la contraseña
        if (password_verify($contrasena, $usuario['contrasena'])) {
            // Iniciar sesión
            $_SESSION['usuario_id'] = $usuario['idusuario'];
            $_SESSION['documento'] = $usuario['documento'];
            $_SESSION['nombre'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];

            echo json_encode([
                'success' => true,
                'message' => 'Inicio de sesión exitoso'
            ]);
        } else {
            error_log("Contraseña incorrecta");
            echo json_encode([
                'success' => false, 
                'message' => 'Contraseña incorrecta'
            ]);
        }
    } else {
        error_log("No existe un usuario con ese documento");
        echo json_encode([
            'success' => false, 
            'message' => 'No existe un usuario con ese documento'
        ]);
    }
} catch (mysqli_sql_exception $e) {
    error_log("Error en login: " . $e->getMessage());
    echo json_encode([
        'success' => false, 
        'message' => 'Error al procesar el inicio de sesión'
    ]);
}
?>