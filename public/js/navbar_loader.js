document.addEventListener("DOMContentLoaded", function() {
    // Referencias a los elementos del DOM
    const userIcon = document.getElementById('userIcon');
    const productIcon = document.getElementById('productIcon');
    const userLink = document.getElementById('userLink');
    const managerIcon = document.getElementById('managerIcon');

    const userDropdown = document.getElementById('dropdownContent');
    const productDropdown = document.getElementById('productDropdownContent');
    const userMenu = document.getElementById('userDropdownContent');
    const managerMenu = document.getElementById('managerDropdownContent');

    // Listado de eventos para abrir los dropdowns
    if (userIcon && userDropdown) {
        userIcon.addEventListener('click', (event) => toggleDropdown(event, userDropdown));
    }

    if (productIcon && productDropdown) {
        productIcon.addEventListener('click', (event) => toggleDropdown(event, productDropdown));
    }

    if (userLink && userMenu) {
        userLink.addEventListener('click', (event) => toggleDropdown(event, userMenu));
    }

    if (managerIcon && managerMenu) {
        managerIcon.addEventListener('click', (event) => toggleDropdown(event, managerMenu));
    }

    // Cerrar dropdowns al hacer clic fuera de los elementos
    window.addEventListener('click', function(event) {
        closeDropdownIfClickedOutside(event, userIcon, userDropdown);
        closeDropdownIfClickedOutside(event, productIcon, productDropdown);
        closeDropdownIfClickedOutside(event, userLink, userMenu);
        closeDropdownIfClickedOutside(event, managerIcon, managerMenu);
    });

    // Funcionalidad del modal de logout
    const logoutModal = document.getElementById('logoutModal');
    const logoutForm = document.getElementById('logout-form');

    const logoutButton = document.querySelector('[onclick="openLogoutModal()"]');
    if (logoutButton) {
        logoutButton.addEventListener('click', openLogoutModal);
    }

    const closeModalButton = document.querySelector('[onclick="closeLogoutModal()"]');
    if (closeModalButton) {
        closeModalButton.addEventListener('click', closeLogoutModal);
    }

    const confirmLogoutButton = document.querySelector('.btn-eliminar');
    if (confirmLogoutButton) {
        confirmLogoutButton.addEventListener('click', confirmLogout);
    }

    function openLogoutModal() {
        logoutModal.style.display = 'flex';
    }

    function closeLogoutModal() {
        logoutModal.style.display = 'none';
    }

    function confirmLogout() {
        logoutForm.submit();
    }
});

// Función para alternar la visibilidad del dropdown
function toggleDropdown(event, dropdownMenu) {
    event.stopPropagation();  // Evita que el clic se propague al window
    dropdownMenu.style.display = (dropdownMenu.style.display === 'block') ? 'none' : 'block';
}

// Función para cerrar el dropdown si se hace clic fuera de él
function closeDropdownIfClickedOutside(event, triggerElement, dropdownMenu) {
    if (triggerElement && dropdownMenu && !triggerElement.contains(event.target) && !dropdownMenu.contains(event.target)) {
        dropdownMenu.style.display = 'none';
    }
}
