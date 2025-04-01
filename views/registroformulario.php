<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../public/css/estilillosderegistro.css">
    <link rel="icon" href="../public/imagenes/gratis-png-flores-rosadas-gratis-flor-morada-removebg-preview.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id="video-background">
        <video autoplay muted loop>
            <source src="../public/imagenes/videomorado.mp4" type="video/mp4">
        </video>
    </div>
    <section class="form-register">
            <img src="../public/imagenes/pedido.png" alt="hola">
        </a>
        <h2>¿No tienes cuenta?</h2>
        <h4>¡Registrate para comenzar!</h4>

        <form action="../models/php/registro.php" method="POST">
        
            <label for="documentoRegistro">Documento:</label>
            <input class="controls" type="text" name="documento" id="documentoRegistro" placeholder="Ingrese su documento." required>

            <label for="nombreRegistro">Nombre:</label>
            <input class="controls" type="text" name="nombre" id="nombreRegistro" placeholder="Ingrese su nombre." required>
            
            <label for="apellidoRegistro">Apellido:</label>
            <input class="controls" type="text" name="apellido" id="apellidoRegistro" placeholder="Ingrese su apellido." required>

            <label for="contraseñaRegistro">Contraseña:</label>
            <input class="controls" type="password" name="contrasena" id="contraseñaRegistro" placeholder="Ingrese su contraseña." required>
            
            <label for="correoRegistro">Correo Electrónico:</label>
            <input class="controls" type="email" name="correo" id="correoRegistro" placeholder="Ingrese su correo electrónico." required>
            
            <label for="telefonoRegistro">Telefono:</label>
            <input class="controls" type="text" name="telefono" id="telefonoRegistro" placeholder="Ingrese su telefono." required>

            <label for="direccionRegistro">Dirección:</label>
            <input class="controls" type="text" name="direccion" id="direccionRegistro" placeholder="Ingrese su dirección." required>

            <label for="rolRegistro">Rol:</label>
            <select class="controls" name="rol_usuario" id="rolRegistro" required>
                <option value="">Seleccione su rol </option>
                <option value="administrador">Administrador</option>
                <option value="vendedor">Vendedor</option>
                <option value="comprador">Comprador</option>
            </select>

            <p>Estoy de acuerdo con <a href="#">Términos y condiciones</a></p>

            <button class="botons" type="submit">Registrarse</button>
            <p><a href="../views/iniciarsesionLOGIN.php">¿Ya tengo cuenta?</a></p>
        </form>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>