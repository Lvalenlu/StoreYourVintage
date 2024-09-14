document.addEventListener('DOMContentLoaded', () => {
    const admins = getAdmins();
    const adminTableBody = document.getElementById('admin-table-body');
    const adminModal = document.getElementById('admin-modal');
    const confirmDeleteModal = document.getElementById('confirm-delete-modal');
    const modalTitle = document.getElementById('modal-title');
    const saveBtn = document.getElementById('save-btn');
    const addAdminBtn = document.getElementById('add-admin-btn');
    let editingAdmin = null;

    function renderTable() {
        adminTableBody.innerHTML = '';
        admins.forEach((admin, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${admin.name}</td>
                <td>${admin.position}</td>
                <td>${admin.state}</td>
                <td>
                    <button class="edit-btn" data-index="${index}">Editar</button>
                    <button class="delete-btn" data-index="${index}">Eliminar</button>
                </td>
            `;
            adminTableBody.appendChild(row);
        });

        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', (e) => openEditModal(e.target.dataset.index));
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', (e) => openDeleteModal(e.target.dataset.index));
        });
    }

    function openEditModal(index) {
        editingAdmin = index;
        const admin = admins[index];
        modalTitle.textContent = 'Editar Administrador';
        saveBtn.textContent = 'Guardar';
        adminModal.style.display = 'block';
        document.getElementById('name').value = admin.name;
        document.getElementById('position').value = admin.position;
        document.getElementById('state').value = admin.state;
    }

    function openDeleteModal(index) {
        confirmDeleteModal.style.display = 'block';
        document.getElementById('confirm-delete-btn').onclick = function () {
            alert('Aqui se elimina');
            confirmDeleteModal.style.display = 'none';
            renderTable();
        };
    }

    function closeModals() {
        adminModal.style.display = 'none';
        confirmDeleteModal.style.display = 'none';
    }

    saveBtn.addEventListener('click', (e) => {
        alert('Funciona aqui para editar o añadir');
        closeModals();
        renderTable();
    });

    addAdminBtn.addEventListener('click', () => {
        editingAdmin = null;
        modalTitle.textContent = 'Añadir Administrador';
        saveBtn.textContent = 'Añadir';
        adminModal.style.display = 'block';
        document.getElementById('name').value = '';
        document.getElementById('position').value = '';
        document.getElementById('state').value = '';
    });

    document.getElementById('close-modal').addEventListener('click', closeModals);
    document.getElementById('close-delete-modal').addEventListener('click', closeModals);
    document.getElementById('cancel-delete-btn').addEventListener('click', closeModals);

    renderTable();
});