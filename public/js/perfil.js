// Referencia a los elementos del DOM
const modalEditarPerfil = document.getElementById('modalEditarPerfil');
const editarPerfilBtn = document.getElementById('editarPerfilBtn');
const cerrarModal = document.querySelector('.cerrar-modal');

// Abre el modal al hacer clic en el botón "Editar Perfil"
editarPerfilBtn.onclick = function() {
    modalEditarPerfil.style.display = "block";
}

// Cierra el modal al hacer clic en el botón de cerrar
cerrarModal.onclick = function() {
    modalEditarPerfil.style.display = "none";
}

// Cierra el modal al hacer clic fuera de él
window.onclick = function(event) {
    if (event.target == modalEditarPerfil) {
        modalEditarPerfil.style.display = "none";
    }
}
