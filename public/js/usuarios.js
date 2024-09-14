document.addEventListener('DOMContentLoaded', () => {
    const tableContainer = document.getElementById('contendor-tabla');
    const switchBtn = document.getElementById('switch');
    const restrictModal = document.getElementById('restricion-modal');
    const closeModal = document.getElementById('cerrar-modal');
    const confirmRestrict = document.getElementById('confirmar-restricion');
    const cancelRestrict = document.getElementById('cancelar-restricion');
    const restrictMessage = document.getElementById('mensaje');

    let currentView = 'users';

    // Renderizar tablas usuarios
    function renderUsers() {
        const users = getUsers();
        let tableHTML = '<table><tr><th>Usuario</th><th>Número de ventas</th><th>Número de compras</th><th>Total de likes</th><th>Acciones</th></tr>';
        users.forEach(user => {
            tableHTML += `
                <tr>
                    <td>${user.name}</td>
                    <td>${user.sales}</td>
                    <td>${user.purchases}</td>
                    <td>${user.likes}</td>
                    <td><button class="restriccion" data-username="${user.name}">Restringir</button></td>
                </tr>`;
        });
        tableHTML += '</table>';
        tableContainer.innerHTML = tableHTML;

        document.querySelectorAll('.restriccion').forEach(button => {
            button.addEventListener('click', () => {
                const username = button.getAttribute('data-username');
                restrictMessage.textContent = `¿Estas seguro que deseas restringir al usuario ${username}?`;
                restrictModal.style.display = 'block';
            });
        });
    }

    // Renderizar tablas vendedores
    function renderSellers() {
        const sellers = getSellers();
        let tableHTML = '<table><tr><th>Vendedor</th><th>Producto</th><th>Modificación</th><th>Fecha de modificación</th></tr>';
        sellers.forEach(seller => {
            tableHTML += `
                <tr>
                    <td>${seller.name}</td>
                    <td>${seller.product}</td>
                    <td>${seller.modification}</td>
                    <td>${seller.modificationDate}</td>
                </tr>`;
        });
        tableHTML += '</table>';
        tableContainer.innerHTML = tableHTML;
    }

    renderUsers();

    // Switch
    switchBtn.addEventListener('click', () => {
        if (currentView === 'users') {
            currentView = 'sellers';
            renderSellers();
            switchBtn.textContent = 'Cambiar a usuarios';
        } else {
            currentView = 'users';
            renderUsers();
            switchBtn.textContent = 'Cambiar a modificaciones';
        }
    });

    // Cerrar Modal
    closeModal.addEventListener('click', () => {
        restrictModal.style.display = 'none';
    });

    // Confirmacion de restriccion
    confirmRestrict.addEventListener('click', () => {
        restrictModal.style.display = 'none';
        alert('Usuario restringido');
    });

    // Cancelacion de restriccion
    cancelRestrict.addEventListener('click', () => {
        restrictModal.style.display = 'none';
    });
});
