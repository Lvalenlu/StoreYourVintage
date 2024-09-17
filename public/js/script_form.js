const inputs = document.querySelectorAll('.input-contenedor input');

inputs.forEach(input => {
    // Verifica si el campo ya tiene valor al cargar la página
    if (input.value.trim() !== '') {
        input.classList.add('not-empty');
    }

    // Escucha cuando el usuario escribe o borra texto
    input.addEventListener('input', function () {
        if (this.value.trim() !== '') {
            this.classList.add('not-empty');
        } else {
            this.classList.remove('not-empty');
        }
    });
});
