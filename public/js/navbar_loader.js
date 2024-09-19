document.addEventListener("DOMContentLoaded", initializeDropdown);

function initializeDropdown() {
  const userIcon = document.getElementById('userIcon');
  const dropdownMenu = document.getElementById('dropdownContent');

  if (userIcon && dropdownMenu) {
    userIcon.addEventListener('click', function(event) {
      toggleDropdown(event, dropdownMenu);
    });
    window.addEventListener('click', function(event) {
      closeDropdown(event, userIcon, dropdownMenu);
    });
  }
}

function toggleDropdown(event, dropdownMenu) {
  event.stopPropagation();
  dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
}

function closeDropdown(event, userIcon, dropdownMenu) {
  if (!userIcon.contains(event.target) && !dropdownMenu.contains(event.target)) {
    dropdownMenu.style.display = 'none';
  }
}
