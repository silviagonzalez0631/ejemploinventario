<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../iniciarsesion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="imagenes/gratis-png-flores-rosadas-gratis-flor-morada-removebg-preview.png" type="image/x-icon">
    <title>Inicio de sesión</title>
</head>
<body>
    <div class="form-container sign-in">
        <form id="login-form" class="form">
            <h2>Inicia tú sesión</h2>
            <div class="icons">
                <i class='bx bxl-google'></i>
                <i class='bx bxl-instagram'></i>
                <i class='bx bxl-linkedin'></i>
            </div>
            <p>Usa tu email para ingresar</p>
            
            <label>
                <i class='bx bx-user-circle'></i>
                <input type="text" id="username" name="documento" placeholder="Documento" required>
            </label>

            <label>
                <i class='bx bx-lock-alt'></i>
                <input type="password" id="password" name="contrasena" placeholder="Contraseña" required>
            </label>
        
            <button type="submit">Iniciar Sesión</button>  
            <div id="message" class="message"></div>
        </form>
    </div>

    <!-- Panel superpuesto -->
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h2>Bienvenido</h2>
                <p>¡Increible! Inicia tú sesión con ayuda de tú nueva cuenta :D</p>
                <button class="ghost" id="signIn">Iniciar sesión</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h2>Bienvenido</h2>
                <p> ¿No tienes cuenta? ¡No te preocupes! Puedes crear tú cuenta aquí :O</p>
                <p><a href="registroformulario.php">¿No tengo cuenta?</a></p>
            </div>
        </div>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>