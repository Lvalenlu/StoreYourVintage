document.addEventListener("DOMContentLoaded", function(){
    fetch('/')
        .then(response => response.text())
        .then(data => {
            document.getElementById('navbar-container').innerHTML = data;
        })
        .catch(error => console.log('Error:', error));
});
