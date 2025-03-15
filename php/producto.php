<?php

include 'conexion.php';
header('Content-Type: application/json');

$action = json_decode(file_get_contents('php://input'), true)['action'] ?? '';

if ($action === 'cargarProductos') {
    $sql = "SELECT idproducto, nombre, descripcion, precio, imagen, idproveedores AS IDProveedor, idcategoria AS IDCategoria FROM productos";
    $result = $conexion->query($sql);

    $productos = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }
    }

    echo json_encode($productos);

    $conexion->close();
} elseif ($action === 'cargarProveedoresCategorias') {
    $categorias = [];
    $proveedores = [];

    // Obtener categorías
    $sqlCategorias = "SELECT idcategoria, nombre FROM categorias";
    $resultCategorias = $conexion->query($sqlCategorias);
    if ($resultCategorias->num_rows > 0) {
        while($row = $resultCategorias->fetch_assoc()) {
            $categorias[] = $row;
        }
    }

    // Obtener proveedores
    $sqlProveedores = "SELECT idproveedores, nombre FROM proveedores";
    $resultProveedores = $conexion->query($sqlProveedores);
    if ($resultProveedores->num_rows > 0) {
        while($row = $resultProveedores->fetch_assoc()) {
            $proveedores[] = $row;
        }
    }

    echo json_encode(['categorias' => $categorias, 'proveedores' => $proveedores]);

    $conexion->close();
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreProducto = $_POST['nombreProducto'] ?? '';
    $descripcionProducto = $_POST['descripcionProducto'] ?? '';
    $precioProducto = $_POST['precioProducto'] ?? '';
    $categoriaProducto = $_POST['categoriaProducto'] ?? '';
    $proveedorProducto = $_POST['proveedorProducto'] ?? '';
    $imagenProducto = $_FILES['imagenProducto'] ?? null;

    if ($nombreProducto && $descripcionProducto && $precioProducto && $categoriaProducto && $proveedorProducto && $imagenProducto) {
        $target_dir = "../imagenesProductos/";
        $target_file = $target_dir . basename($imagenProducto["name"]);
        move_uploaded_file($imagenProducto["tmp_name"], $target_file);

        $sql = "INSERT INTO productos (nombre, descripcion, precio, imagen, idcategoria, idproveedores) VALUES ('$nombreProducto', '$descripcionProducto', '$precioProducto', '$target_file', '$categoriaProducto', '$proveedorProducto')";

        if ($conexion->query($sql) === TRUE) {
            echo json_encode(["success" => true, "message" => "Producto creado exitosamente"]);
        } else {
            echo json_encode(["success" => false, "message" => "Error: " . $sql . "<br>" . $conexion->error]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "Todos los campos son obligatorios."]);
    }

    $conexion->close();
}
?>