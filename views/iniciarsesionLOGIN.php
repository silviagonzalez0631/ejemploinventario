<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../public/css/estilitosdeinicio.css">
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
        <a href="principal.html">
            <img src="../public/imagenes/pedido.png" alt="hola">
        </a>
        <h2>Inicia tu sesion</h2>
            <form id="login-form">
                <label for="documento">Documento:</label>
                <input class="controls" type="text" name="documento" id="documento" placeholder="Ingrese su documento." required>
                
                <label for="contraseña">Contraseña:</label>
                <input class="controls" type="password" name="contrasena" id="contrasena" placeholder="Ingrese su contraseña." required>
                
                <input class="botons" type="submit" value="Iniciar sesión">
                <p><a href="../views/registroformulario.php">¿No tengo cuenta?</a></p>
            </form>
            <!-- Elemento para mostrar mensajes del sistema -->
            <div id="loginMessage"></div>
            <div id="iniciarsesionMessage"></div>
        </div>
    </section> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../public/js/script.js"></script>
</body>