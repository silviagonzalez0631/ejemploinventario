let intentosRestantes = 3;

// Elementos del DOM para la transición
const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('login');

// Verificar si los elementos existen antes de añadir eventos
if (registerBtn && container) {
    registerBtn.addEventListener('click', (e) => {
        e.preventDefault();
        container.classList.add('right-panel-active');
    });
}

if (loginBtn && container) {
    loginBtn.addEventListener('click', (e) => {
        e.preventDefault();
        container.classList.remove('right-panel-active');
        // Limpiar los campos del formulario de registro
        const registerForm = document.getElementById('register-form');
        if (registerForm) {
            registerForm.reset();
        }
    });
}

// Función de verificación de login
async function verificarLogin() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let mensaje = document.getElementById("message");

    try {
        const response = await fetch('../php/iniciarsesion.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'documento': username,
                'contrasena': password
            })
        });

        const result = await response.json();

        if (result.success) {
            mensaje.style.color = "blue";
            mensaje.textContent = "¡Inicio de sesión exitoso!";
            window.location.href = "../html/index.php";
        } else {
            intentosRestantes--;
            mensaje.style.color = "red";
            mensaje.textContent = `Usuario o contraseña incorrectos. Intentos restantes: ${intentosRestantes}`;
            
            if (intentosRestantes === 0) {
                mensaje.textContent = "Cuenta bloqueada. Intenta más tarde";
                document.getElementById("username").disabled = true;
                document.getElementById("password").disabled = true;
            }
        }
    } catch (error) {
        console.error('Error:', error);
        mensaje.style.color = "red";
        mensaje.textContent = "Error al procesar el inicio de sesión. Por favor, intenta nuevamente.";
    }
}

// Manejador del formulario de inicio de sesión
const loginForm = document.getElementById("login-form");
if (loginForm) {
    loginForm.addEventListener("submit", function(e) {
        e.preventDefault();
        verificarLogin();
    });
}

// Manejador del formulario de registro mejorado
const registerForm = document.getElementById("register-form");
if (registerForm) {
    registerForm.addEventListener("submit", async function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const signupMessage = document.getElementById("signupMessage");

        try {
            const response = await fetch('../php/registro.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if(result.success) {
                signupMessage.style.color = "green";
                signupMessage.textContent = "¡Registro exitoso! Ya puedes iniciar sesión";
                setTimeout(() => {
                    container.classList.remove('right-panel-active');
                    this.reset(); // Limpiar el formulario
                }, 1500);
            } else {
                signupMessage.style.color = "red";
                if(result.message.includes("correo o documento")) {
                    signupMessage.textContent = "Este correo o documento ya está registrado. Por favor, usa datos diferentes.";
                } else {
                    signupMessage.textContent = result.message;
                }
            }
        } catch (error) {
            console.error('Error:', error);
            signupMessage.style.color = "red";
            signupMessage.textContent = "Error al procesar el registro. Por favor, intenta nuevamente.";
        }
    });
}