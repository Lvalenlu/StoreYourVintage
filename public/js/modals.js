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

function openEditModal(userId, name, email, document, charge) {
    // Rellenar los campos del modal con los valores proporcionados
    document.getElementById('editName').value = name;
    document.getElementById('editEmail').value = email;
    document.getElementById('editDocument').value = document;
    document.getElementById('editCharge').value = charge;

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
