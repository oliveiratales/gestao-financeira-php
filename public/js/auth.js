// Funcionalidades de Autenticação
document.addEventListener('DOMContentLoaded', function() {
    
    // Toggle de visibilidade da senha
    window.togglePasswordVisibility = function(inputId, toggleId) {
        const passwordInput = document.getElementById(inputId);
        const toggleIcon = document.getElementById(toggleId);
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        }
    };
    
    // Funcionalidades específicas da página de login
    if (document.getElementById('email') && document.getElementById('password')) {
        // Carregar dados salvos
        const savedEmail = localStorage.getItem('rememberedEmail');
        const savedPassword = localStorage.getItem('rememberedPassword');
        
        if (savedEmail) {
            document.getElementById('email').value = savedEmail;
            const rememberCheckbox = document.getElementById('remember');
            if (rememberCheckbox) {
                rememberCheckbox.checked = true;
            }
        }
        if (savedPassword) {
            document.getElementById('password').value = savedPassword;
        }
        
        // Salvar dados se checkbox marcado
        const loginForm = document.querySelector('form');
        if (loginForm) {
            loginForm.addEventListener('submit', function() {
                const rememberCheckbox = document.getElementById('remember');
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                
                if (rememberCheckbox && rememberCheckbox.checked) {
                    localStorage.setItem('rememberedEmail', email);
                    localStorage.setItem('rememberedPassword', password);
                } else {
                    localStorage.removeItem('rememberedEmail');
                    localStorage.removeItem('rememberedPassword');
                }
            });
        }
    }
    
    // Validação de nome completo no registro
    const registerForm = document.querySelector('form[action="/register"]');
    if (registerForm) {
        registerForm.addEventListener('submit', function(e) {
            const nameInput = document.getElementById('name');
            const name = nameInput.value.trim();
            
            // Remover mensagem de erro anterior
            const existingError = document.getElementById('js-error');
            if (existingError) {
                existingError.remove();
            }
            
            // Verificar se tem pelo menos nome e sobrenome
            const nameParts = name.split(' ').filter(part => part.length > 0);
            
            if (nameParts.length < 2) {
                e.preventDefault();
                
                // Criar mensagem de erro no padrão do sistema
                const errorDiv = document.createElement('div');
                errorDiv.id = 'js-error';
                errorDiv.className = 'alert alert-error';
                errorDiv.innerHTML = '<i class="fas fa-exclamation-circle"></i> Por favor, informe seu nome completo (nome e sobrenome).';
                
                // Inserir antes do formulário
                const form = document.querySelector('form');
                form.parentNode.insertBefore(errorDiv, form);
                
                nameInput.focus();
                return false;
            }
        });
    }
});