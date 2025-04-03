// Función para cargar datos del perfil
async function cargarDatosPerfil() {
    try {
        const response = await fetch('../models/verperfil.php');
        const datos = await response.json();
        return datos;
    } catch (error) {
        console.error('Error al cargar datos del perfil:', error);
        return { success: false, message: 'Error al cargar datos del perfil' };
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
        console.error('Error al mostrar perfil:', datosPerfil.message);
    }
}

// Evento para cargar el perfil cuando se abre el modal
document.getElementById('verPerfilModal').addEventListener('show.bs.modal', mostrarPerfil);