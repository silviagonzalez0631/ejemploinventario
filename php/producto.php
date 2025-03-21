<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = json_decode(file_get_contents('php://input'), true)['action'] ?? '';

    if ($action === 'cargarProductos') {
        $sql = "SELECT p.idproductos, p.nombre, p.descripcion, p.precio, c.nombre AS categoria, pr.nombre AS proveedor, p.imagen 
                FROM productos p 
                JOIN categorias c ON p.IDCategoria = c.idcategoria 
                JOIN proveedores pr ON p.IDProveedor = pr.idproveedores";
        $result = $conexion->query($sql);

        $productos = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }

        echo json_encode($productos);
        $conexion->close();
    } elseif (isset($_POST['nombreProducto'])) {
        // Crear producto
        $nombre = $_POST['nombreProducto'];
        $descripcion = $_POST['descripcionProducto'];
        $precio = $_POST['precioProducto'];
        $categoria = $_POST['categoriaProducto'];
        $proveedor = $_POST['proveedorProducto'];
        $imagen = $_FILES['imagenProducto']['name'];

        // Mover la imagen a la carpeta de imágenes
        $rutaImagen = "../imagenesProductos/" . basename($imagen);

        $query = "INSERT INTO productos (nombre, descripcion, precio, IDCategoria, IDProveedor, imagen) VALUES (?, ?, ?, ?, ?, ?)";
    }
}