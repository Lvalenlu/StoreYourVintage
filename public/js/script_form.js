const inputs = document.querySelectorAll('.input-contenedor input');

    inputs.forEach(input => {
        input.addEventListener('input', function () {
            if (this.value.trim() !== '') {
                this.classList.add('not-empty');
            } else {
                this.classList.remove('not-empty');
            }
        });
    });