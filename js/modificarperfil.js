// Función para cargar datos del perfil
async function cargarDatosPerfil() {
    try {
        const response = await fetch('../php/verperfil.php');
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
        const response = await fetch('../php/actualizarperfil.php', {
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

// Función para mostrar los datos del perfil en el modal
async function mostrarPerfil() {
    const perfilModal = new bootstrap.Modal(document.getElementById('verPerfilModal'));
    const datosPerfil = await cargarDatosPerfil();

    if (datosPerfil.success) {
        document.getElementById('perfilNombre').textContent = datosPerfil.data.nombre;
        document.getElementById('perfilEmail').textContent = datosPerfil.data.correo;
        document.getElementById('perfilCelular').textContent = datosPerfil.data.telefono;
        document.getElementById('perfilDireccion').textContent = datosPerfil.data.direccion;
        perfilModal.show();
    } else {
        alert(datosPerfil.message);
    }
}

// Evento para cargar el perfil cuando se abre el modal
document.getElementById('verPerfilModal').addEventListener('show.bs.modal', mostrarPerfil);