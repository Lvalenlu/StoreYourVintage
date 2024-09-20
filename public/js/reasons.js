document.addEventListener("DOMContentLoaded", initializeDropdown);

function openReasonsModal(id) {
    document.getElementById('reasonsModal'+id).style.display = 'flex';
}

function closeReasonsModal(id) {
    document.getElementById('reasonsModal'+id).style.display = 'none';
}


function confirmReasons() {
    document.getElementById('logout-form').submit();
}
