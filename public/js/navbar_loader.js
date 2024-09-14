document.addEventListener("DOMContentLoaded", function(){
    fetch('/navbar')
        .then(response => response.text())
        .then(data => {
            document.getElementById('navbar-container').innerHTML = data;
        })
        .catch(error => console.log('Error:', error));
});