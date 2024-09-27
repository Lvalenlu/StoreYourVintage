document.addEventListener("DOMContentLoaded", initializeDropdown);

// Inicializa los dropdowns una vez que el contenido del DOM se ha cargado
function initializeDropdown() {
    const dropdowns = document.querySelectorAll('.dropdown');

    // Para cada dropdown, añade un evento 'click' que alterna la clase 'is-active'
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function () {
            this.classList.toggle('is-active');
        });
    });
}

// Abre el modal de razones (reasonsModal) basado en el id dado
function openReasonsModal(id) {
    document.getElementById('reasonsModal' + id).style.display = 'flex';
}

// Cierra el modal de razones (reasonsModal) basado en el id dado
function closeReasonsModal(id) {
    document.getElementById('reasonsModal' + id).style.display = 'none';
}

// Abre el modal de edición y rellena los campos con los datos proporcionados
function openEditModal(userId, name, email, document, charge) {
    document.getElementById('editName').value = name;
    document.getElementById('editEmail').value = email;
    document.getElementById('editDocument').value = document;
    document.getElementById('editCharge').value = charge;

    document.getElementById('editModal').style.display = 'block';
}

// Cierra el modal de edición
function closeEditModal() {
    document.getElementById('editModal').style.display = 'none';
}

// Detecta si se hace clic fuera del modal y lo cierra
window.onclick = function(event) {
    const modal = document.getElementById('editModal');
    if (event.target == modal) {
        closeEditModal(); 
    }
}
