// Abre el modal y rellena la información
function openReasonsModal(customerId, customerName, customerDocument) {
    const modal = document.getElementById('reasonsModal');
    const modalUserName = document.getElementById('modalUserName');
    const modalUserDoc = document.getElementById('modalUserDoc');
    const reasonsForm = document.getElementById('reasonsForm');

    modalUserName.textContent = customerName;
    modalUserDoc.textContent = customerDocument;

    // Actualiza la acción del formulario para el usuario específico
    reasonsForm.action = `/customers/${customerId}`;

    modal.style.display = 'block';
}

// Cierra el modal
function closeReasonsModal() {
    const modal = document.getElementById('reasonsModal');
    modal.style.display = 'none';
}
