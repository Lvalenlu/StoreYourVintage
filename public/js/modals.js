document.addEventListener("DOMContentLoaded", initializeDropdown);

function openReasonsModal(id) {
    document.getElementById('reasonsModal'+id).style.display = 'flex';
}

function closeReasonsModal(id) {
    document.getElementById('reasonsModal'+id).style.display = 'none';
}


function confirmReasons() {
    document.getElementById('logout-form').submit();
}

function openDeleteModal(id) {
    document.getElementById('deleteModal'+id).style.display = 'flex';
}

function closeDeleteModal(id) {
    document.getElementById('deleteModal'+id).style.display = 'none';
}


function confirmDelete() {
    document.getElementById('logout-form').submit();
}
function openEditModal(userId, name, email, document, charge) {
    // Rellenar los campos del modal con los valores proporcionados
    document.getElementById('editName').value = name;
    document.getElementById('editEmail').value = email;
    document.getElementById('editDocument').value = document;
    document.getElementById('editCharge').value = charge;

    // Configurar el formulario para apuntar a la URL correcta
    const form = document.getElementById('formularioEditarUsuario');
    form.action = `/users/${userId}`; // Asegúrate de que esta es la ruta correcta para actualizar

    // Mostrar el modal
    document.getElementById('editModal').style.display = 'block';
}

function closeEditModal() {
    // Ocultar el modal
    document.getElementById('editModal').style.display = 'none';
}

// Cerrar el modal cuando se hace clic fuera de él
window.onclick = function(event) {
    const modal = document.getElementById('editModal');
    if (event.target == modal) {
        closeEditModal();
    }
}


function confirmEdit() {
    document.getElementById('logout-form').submit();
}
