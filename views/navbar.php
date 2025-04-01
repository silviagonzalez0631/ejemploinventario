<?php
session_start();
$rol = $_SESSION['rol_usuario'] ?? null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="../public/imagenes/imagen_2024-11-08_105645304-removebg-preview.png" type="image/x-icon">
</head>
<body>
<!--barra de navegación-->
<nav class="navbar navbar-expand-lg body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="../views/index.php">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <?php if ($rol == 'administrador' || $rol == 'vendedor' || $rol == 'comprador'): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Proveedor
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($rol == 'vendedor' || $rol == 'administrador'): ?>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#crearProveedorModal">Crear proveedor</a></li>
                            <?php endif; ?>
                            <?php if ($rol == 'administrador'): ?>
                                <li><a class="dropdown-item" href="../views/verproveedor.php">Listar Proveedor</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($rol == 'vendedor' || $rol == 'administrador'): ?>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#crearCategoriaModal">Crear categoria</a></li>
                            <?php endif; ?>
                            <?php if ($rol == 'administrador'): ?>
                                <li><a class="dropdown-item" href="../views/verCategorias.php">Listar categoria</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Productos
                        </a>
                        <ul class="dropdown-menu">
                            <?php if ($rol == 'vendedor' || $rol == 'administrador'): ?>
                                <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#crearProductoModal">Crear Producto</a></li>
                            <?php endif; ?>
                            <?php if ($rol == 'administrador' || $rol == 'comprador'): ?>
                                <li><a class="dropdown-item" href="../views/verproductos.php">Listar Productos</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#verPerfilModal">
                        Ver perfil
                    </button>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="../models/php/cerrarsesion.php">Cerrar Sesión</a>
                </li>
            </ul>
            <!-- Mostrar el tipo de usuario en la barra de navegación -->
            <label class="text-black mb-3 p-2">
                <?php echo $_SESSION['rol_usuario'] ?? 'Invitado'; ?>
            </label>
        </div>
    </div>
</nav>

<!-- Modal Ver Perfil -->
<div class="modal fade" id="verPerfilModal" tabindex="-1" aria-labelledby="verPerfilModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verPerfilModalLabel">Mi Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="text-center mb-4">
                    <img src="../public/imagenes/imagen1.jpg" class="rounded-circle" alt="Foto de perfil" style="width: 150px; height: 150px; object-fit: cover;">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p><strong>Nombre:</strong> <span id="perfilNombre" class="dato-perfil"></span></p>
                        <p><strong>Correo:</strong> <span id="perfilEmail" class="dato-perfil"></span></p>
                        <p><strong>Celular:</strong> <span id="perfilCelular" class="dato-perfil"></span></p>
                        <p><strong>Dirección:</strong> <span id="perfilDireccion" class="dato-perfil"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnEditar" onclick="habilitarEdicion()">Editar</button>
                <button type="button" class="btn btn-success" id="btnGuardar" onclick="guardarCambios()" style="display: none;">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Crear Categoría -->
<div class="modal fade" id="crearCategoriaModal" tabindex="-1" aria-labelledby="crearCategoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearCategoriaModalLabel">Crear Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../models/php/categoria.php" method="POST">
                    <label for="nombreCategoria">Nombre de la Categoría:</label>
                    <input class="controls" type="text" name="nombreCategoria" id="nombreCategoria" placeholder="Ingrese el nombre de la categoría." required>
                    
                    <label for="descripcionCategoria">Descripción de la Categoría:</label>
                    <input class="controls" type="text" name="descripcionCategoria" id="descripcionCategoria" placeholder="Ingrese la descripcion de la categoría." required>
                    <br>
                    <br>
                    <button class="btn btn-primary" type="submit">Crear Categoría</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Crear Proveedor -->
<div class="modal fade" id="crearProveedorModal" tabindex="-1" aria-labelledby="crearProveedorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearProveedorModalLabel">Crear Proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../models/php/proveedor.php" method="POST">
                    <label for="documentoProveedor">Documento:</label>
                    <input class="controls" type="number" name="documentoProveedor" id="documentoProveedor" placeholder="Ingrese el documento del proveedor." required>

                    <label for="nombreProveedor">Nombre Completo:</label>
                    <input class="controls" type="text" name="nombreProveedor" id="nombreProveedor" placeholder="Ingrese el nombre del proveedor." required>

                    <label for="telefonoProveedor">Telefono:</label>
                    <input class="controls" type="number" name="telefonoProveedor" id="telefonoProveedor" placeholder="Ingrese el telefono del proveedor." required>

                    <label for="direccionProveedor">Direccion:</label>
                    <input class="controls" type="text" name="direccionProveedor" id="direccionProveedor" placeholder="Ingrese la direccion del proveedor." required>

                    <label for="descripcionProveedor">Descripción del proveedor:</label>
                    <input class="controls" type="text" name="descripcionProveedor" id="descripcionProveedor" placeholder="Ingrese la descripcion del proveedor." required>
                    <br>
                    <br>
                    <button class="btn btn-primary" type="submit">Crear proveedor</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Crear Producto -->
<div class="modal fade" id="crearProductoModal" tabindex="-1" aria-labelledby="crearProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="crearProductoModalLabel">Crear Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../models/php/producto.php" method="POST" enctype="multipart/form-data">
                    <label for="nombreProducto">Nombre del Producto:</label>
                    <input class="controls" type="text" name="nombreProducto" id="nombreProducto" placeholder="Ingrese el nombre del producto." required>
                    
                    <label for="descripcionProducto">Descripción del Producto:</label>
                    <input class="controls" type="text" name="descripcionProducto" id="descripcionProducto" placeholder="Ingrese la descripción del producto." required>
                    
                    <label for="precioProducto">Precio del Producto:</label>
                    <input class="controls" type="number" name="precioProducto" id="precioProducto" placeholder="Ingrese el precio del producto." required>
                    
                    <label for="categoriaProducto">Categoría del Producto:</label>
                    <select class="controls" name="categoriaProducto" id="categoriaProducto" required>
                        <option value="">Seleccione una categoría</option>
                        <?php
                        include '../config/conexion.php';
                        $query = "SELECT idcategoria, nombre FROM categorias";
                        $result = $conexion->query($query);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['idcategoria'] . "'>" . $row['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                    
                    <label for="proveedorProducto">Proveedor del Producto:</label>
                    <select class="controls" name="proveedorProducto" id="proveedorProducto" required>
                        <option value="">Seleccione un proveedor</option>
                        <?php
                        $query = "SELECT idproveedores, nombre FROM proveedores";
                        $result = $conexion->query($query);
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['idproveedores'] . "'>" . $row['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                    
                    <label for="imagenProducto">Imagen del Producto:</label>
                    <input class="controls" type="file" name="imagenProducto" id="imagenProducto" required>
                    <br>
                    <br>
                    <button class="btn btn-primary" type="submit">Crear Producto</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>