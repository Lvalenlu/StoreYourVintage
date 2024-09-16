document.addEventListener('DOMContentLoaded', () => {
    const users = getUsers();
    const userTableBody = document.getElementById('user-table-body');
    const userModal = document.getElementById('user-modal');
    const confirmDeleteModal = document.getElementById('confirm-delete-modal');
    const modalTitle = document.getElementById('modal-title');
    const saveBtn = document.getElementById('save-btn');
    const addUserBtn = document.getElementById('add-user-btn');
    let editinguser = null;

    function renderTable() {
        userTableBody.innerHTML = '';
        users.forEach((user, index) => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${user.name}</td>
                <td>${user.position}</td>
                <td>${user.state}</td>
                <td>
                    <button class="edit-btn" data-index="${index}">Editar</button>
                    <button class="delete-btn" data-index="${index}">Eliminar</button>
                </td>
            `;
            userTableBody.appendChild(row);
        });

        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', (e) => openEditModal(e.target.dataset.index));
        });

        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', (e) => openDeleteModal(e.target.dataset.index));
        });
    }

    function openEditModal(index) {
        editinguser = index;
        const user = users[index];
        modalTitle.textContent = 'Editar useristrador';
        saveBtn.textContent = 'Guardar';
        userModal.style.display = 'block';
        document.getElementById('name').value = user.name;
        document.getElementById('position').value = user.position;
        document.getElementById('state').value = user.state;
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
        userModal.style.display = 'none';
        confirmDeleteModal.style.display = 'none';
    }

    saveBtn.addEventListener('click', (e) => {
        alert('Funciona aqui para editar o añadir');
        closeModals();
        renderTable();
    });

    addUserBtn.addEventListener('click', () => {
        editingUser = null;
        modalTitle.textContent = 'Añadir administrador';
        saveBtn.textContent = 'Añadir';
        userModal.style.display = 'block';
        document.getElementById('name').value = '';
        document.getElementById('position').value = '';
        document.getElementById('state').value = '';
    });

    document.getElementById('close-modal').addEventListener('click', closeModals);
    document.getElementById('close-delete-modal').addEventListener('click', closeModals);
    document.getElementById('cancel-delete-btn').addEventListener('click', closeModals);

    renderTable();
});
