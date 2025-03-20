document.querySelectorAll('.dropdown-submenu .dropdown-toggle').forEach(item => {
    item.addEventListener('click', function(e) {
        e.stopPropagation();
        let submenu = this.nextElementSibling;
        submenu.classList.toggle('show');

        // Закрываем остальные открытые подменю
        document.querySelectorAll('.dropdown-submenu .dropdown-menu').forEach(menu => {
            if (menu !== submenu) menu.classList.remove('show');
        });
    });
});

// Закрытие всех подменю при клике вне
document.addEventListener('click', function(e) {
    document.querySelectorAll('.dropdown-submenu .dropdown-menu').forEach(menu => {
        menu.classList.remove('show');
    });
});