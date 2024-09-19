document.addEventListener("DOMContentLoaded", function() {
    fetch('/')
        .then(response => response.text())
        .then(data => {
            document.getElementById('navbar-container').innerHTML = data;
            // Llama a la función para inicializar el menú desplegable
            initializeDropdown();
        })
        .catch(error => console.log('Error:', error));
});

function initializeDropdown() {
    const userIcon = document.getElementById('user-icon');
    const dropdownMenu = document.getElementById('dropdown-menu');

    if (userIcon && dropdownMenu) {
        userIcon.addEventListener('click', function () {
            if (dropdownMenu.style.display === 'block') {
                dropdownMenu.style.display = 'none';
            } else {
                dropdownMenu.style.display = 'block';
            }
        });

        window.addEventListener('click', function (event) {
            if (!userIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.style.display = 'none';
            }
        });
    }
}
