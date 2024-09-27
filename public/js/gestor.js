document.addEventListener('DOMContentLoaded', () => {
    // Obtiene los datos de los usuarios
    const users = getUsers();

    const userTableBody = document.getElementById('user-table-body');
    const userModal = document.getElementById('user-modal');
    const confirmDeleteModal = document.getElementById('confirm-delete-modal');
    const modalTitle = document.getElementById('modal-title');
    const saveBtn = document.getElementById('save-btn');
    const addUserBtn = document.getElementById('add-user-btn');

    let editinguser = null;

    // Renderiza la tabla con los datos de los usuarios
    function renderTable() {
        userTableBody.innerHTML = '';

        // Recorre los usuarios y crea filas en la tabla
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

        // Agrega eventos a los botones de editar
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', (e) => openEditModal(e.target.dataset.index));
        });

        // Agrega eventos a los botones de eliminar
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', (e) => openDeleteModal(e.target.dataset.index));
        });
    }

    // Abre el modal de edición de usuario
    function openEditModal(index) {
        editinguser = index;
        const user = users[index];
        modalTitle.textContent = 'Editar administrador';
        saveBtn.textContent = 'Guardar';
        userModal.style.display = 'block';

        // Rellena el formulario con los datos del usuario
        document.getElementById('name').value = user.name;
        document.getElementById('position').value = user.position;
        document.getElementById('state').value = user.state;
    }

    // Abre el modal de confirmación para eliminar usuario
    function openDeleteModal(index) {
        confirmDeleteModal.style.display = 'block';

        document.getElementById('confirm-delete-btn').onclick = function () {
            alert('Aquí se elimina');
            confirmDeleteModal.style.display = 'none';
            renderTable();
        };
    }

    // Cierra ambos modales (de edición y confirmación)
    function closeModals() {
        userModal.style.display = 'none';
        confirmDeleteModal.style.display = 'none';

    // Acción al guardar cambios (añadir o editar usuario)
    saveBtn.addEventListener('click', (e) => {
        alert('Funciona aquí para editar o añadir');
        closeModals();
        renderTable();
    });

    // Acción al hacer clic en "Añadir usuario"
    addUserBtn.addEventListener('click', () => {
        editingUser = null;
        modalTitle.textContent = 'Añadir administrador';
        saveBtn.textContent = 'Añadir';
        userModal.style.display = 'block';

        // Resetea los campos del formulario para agregar un nuevo usuario
        document.getElementById('name').value = '';
        document.getElementById('position').value = '';
        document.getElementById('state').value = '';
    });

    // Cerrar los modales
    document.getElementById('close-modal').addEventListener('click', closeModals);
    document.getElementById('close-delete-modal').addEventListener('click', closeModals);
    document.getElementById('cancel-delete-btn').addEventListener('click', closeModals);

    // Renderiza la tabla por primera vez
    renderTable();
});
