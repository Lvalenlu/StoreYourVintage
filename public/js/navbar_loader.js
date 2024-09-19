document.addEventListener("DOMContentLoaded", initializeDropdown);

function initializeDropdown() {
  const userIcon = document.getElementById('userIcon');
  const userDropdown = document.getElementById('dropdownContent');

  const productMenu = document.getElementById('productDropdownContent');
  const productIcon = document.getElementById('productIcon');

  const userMenu = document.getElementById('userDropdownContent');
  const userIconLink = document.getElementById('userLink');

  const managerMenu = document.getElementById('managerDropdownContent');
  const managerIcon = document.getElementById('managerIcon');

  if (userIcon && userDropdown) {
    userIcon.addEventListener('click', function(event) {
      toggleDropdown(event, userDropdown);
    });
  }

  if (productIcon && productMenu) {
    productIcon.addEventListener('click', function(event) {
      toggleDropdown(event, productMenu);
    });
  }

  if (userIconLink && userMenu) {
    userIconLink.addEventListener('click', function(event) {
      toggleDropdown(event, userMenu);
    });
  }

  if (managerIcon && managerMenu) {
    managerIcon.addEventListener('click', function(event) {
      toggleDropdown(event, managerMenu);
    });
  }

  window.addEventListener('click', function(event) {
    closeDropdown(event, userIcon, userDropdown);
    closeDropdown(event, productIcon, productMenu);
    closeDropdown(event, userIconLink, userMenu);
    closeDropdown(event, managerIcon, managerMenu);
  });
}

function toggleDropdown(event, dropdownMenu) {
  event.stopPropagation();
  dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
}

function closeDropdown(event, triggerElement, dropdownMenu) {
  if (!triggerElement.contains(event.target) && !dropdownMenu.contains(event.target)) {
    dropdownMenu.style.display = 'none';
  }
}
