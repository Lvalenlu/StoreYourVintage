document.addEventListener("DOMContentLoaded", initializeDropdown);

function initializeDropdown() {
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function () {
            this.classList.toggle('is-active');
        });
    });
}

function openReasonsModal(id) {
    document.getElementById('reasonsModal' + id).style.display = 'flex';
}

function closeReasonsModal(id) {
    document.getElementById('reasonsModal' + id).style.display = 'none';
}

function openEditModal(userId) {

    // Mostrar el modal
    document.getElementById('editModal'+userId).style.display = 'block';
}

function closeEditModal(userId) {
    // Ocultar el modal
    document.getElementById('editModal'+userId).style.display = 'none';
}

// Cerrar el modal cuando se hace clic fuera de él
window.onclick = function(event) {
    const modal = document.getElementById('editModal');
    if (event.target == modal) {
        closeEditModal();
    }
}
