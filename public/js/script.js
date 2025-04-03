console.log('script.js cargado correctamente');
// Función para mostrar mensajes
function mostrarMensaje(elementId, mensaje, color) {
    const elemento = document.getElementById(elementId);
    if (elemento) {
        elemento.textContent = mensaje;
        elemento.style.color = color;
        elemento.style.display = mensaje ? 'block' : 'none';
    }
}

// Función para iniciar sesión
async function iniciarSesion(formData) {
    try {
        mostrarMensaje("iniciarsesionMessage", "Procesando inicio de sesión...", "blue");
        
        const response = await fetch('../models/iniciarsesion.php', {
            method: 'POST',
            body: formData
        });
        
        const resultado = await response.json();
        
        if (resultado.success) {
            mostrarMensaje("loginMessage", "¡Inicio de sesión exitoso! Redirigiendo...", "green");
            setTimeout(() => {
                window.location.href = "../views/index.php";
            }, 2000);
        } else {
            mostrarMensaje("loginMessage", resultado.message || "Error en el inicio de sesión", "red");
        }
    } catch (error) {
        console.error('Error:', error);
        mostrarMensaje("loginMessage", "Error al procesar el inicio de sesión", "red");
    }
}

// Función para cargar datos del perfil
async function cargarDatosPerfil() {
    try {
        const response = await fetch('../models/verperfil.php');
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error al cargar el perfil:', error);
        return { success: false, message: 'Error al cargar los datos del perfil' };
    }
}

// Función para actualizar perfil
async function actualizarPerfil(datos) {
    try {
        const response = await fetch('../models/actualizarperfil.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(datos)
        });
        
        const result = await response.json();
        return result;
    } catch (error) {
        console.error('Error al actualizar el perfil:', error);
        return { success: false, message: 'Error al actualizar el perfil' };
    }
}

// Formulario de inicio de sesión
const loginForm = document.getElementById("login-form");
if (loginForm) {
    loginForm.onsubmit = function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        iniciarSesion(formData);
    };
}

// Exportar funciones necesarias para el perfil
window.cargarDatosPerfil = cargarDatosPerfil;
window.actualizarPerfil = actualizarPerfil;

async function guardarCambios() {
    try {
        const inputs = document.querySelectorAll('.modal-body input.form-control');
        const datos = {
            nombres: inputs[0].value,
            apellidos: inputs[1].value,
            correo: inputs[2].value,
            celular: inputs[3].value
        };

        const resultado = await actualizarPerfil(datos);
        
        if (resultado.success) {
            alert(resultado.message);
            const modalElement = document.getElementById('perfilModal');
            const modal = bootstrap.Modal.getInstance(modalElement);
            modal.hide();
            window.location.reload();
        } else {
            alert(resultado.message || 'Error al actualizar el perfil');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error al guardar los cambios');
    }
}

// Agregar esta función para habilitar la edición
function habilitarEdicion() {
    const campos = ['perfilNombre', 'perfilApellido', 'perfilCorreo', 'perfilTelefono'];
    
    campos.forEach(campo => {
        const elemento = document.getElementById(campo);
        const valor = elemento.textContent;
        elemento.innerHTML = `<input type="text" class="form-control" value="${valor}">`;
    });

    document.getElementById('btnEditar').style.display = 'none';
    document.getElementById('btnGuardar').style.display = 'inline';
}