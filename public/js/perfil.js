const modalEditarPerfil = document.getElementById('modalEditarPerfil');
const editarPerfilBtn = document.getElementById('editarPerfilBtn');
const cerrarModal = document.querySelector('.cerrar-modal');

editarPerfilBtn.onclick = function() {
    modalEditarPerfil.style.display = "block";
}


cerrarModal.onclick = function() {
    modalEditarPerfil.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modalEditarPerfil) {
        modalEditarPerfil.style.display = "none";
    }
}
