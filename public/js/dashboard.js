// Dashboard Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const overlay = document.querySelector('.sidebar-overlay');
    
    function toggleSidebar() {
        if (window.innerWidth <= 768) {
            sidebar.classList.toggle('show');
            if (overlay) {
                overlay.classList.toggle('show');
            }
        } else {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        }
    }
    
    function closeSidebar() {
        sidebar.classList.remove('show');
        if (overlay) {
            overlay.classList.remove('show');
        }
    }
    
    if (menuToggle) {
        menuToggle.addEventListener('click', toggleSidebar);
    }
    
    // Fechar sidebar ao clicar no overlay
    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }
    
    // Fechar sidebar no mobile ao clicar em um item
    if (window.innerWidth <= 768) {
        document.querySelectorAll('.menu-item').forEach(item => {
            item.addEventListener('click', closeSidebar);
        });
    }
    
    // Controle da scrollbar do sidebar
    if (sidebar) {
        sidebar.addEventListener('mouseenter', function() {
            sidebar.classList.add('show-scrollbar');
        });
        
        sidebar.addEventListener('mouseleave', function() {
            sidebar.classList.remove('show-scrollbar');
        });
    }
    
    // Controle do dropdown de usuário
    const userDropdown = document.getElementById('userDropdown');
    const userDropdownMenu = document.getElementById('userDropdownMenu');
    
    if (userDropdown && userDropdownMenu) {
        userDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
            userDropdownMenu.classList.toggle('show');
        });
        
        // Fechar dropdown ao clicar fora
        document.addEventListener('click', function() {
            userDropdownMenu.classList.remove('show');
        });
        
        // Prevenir fechamento ao clicar no menu
        userDropdownMenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }
});