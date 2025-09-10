<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - <?= $_ENV['APP_NAME'] ?? 'FinanceApp' ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/css/style.css?v=3">
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1><i class="fas fa-chart-line"></i> <?= $_ENV['APP_NAME'] ?? 'FinanceApp' ?></h1>
            <p>Crie sua conta para começar</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="/register">
            <div class="form-group">
                <label for="name">Nome Completo</label>
                <i class="fas fa-user"></i>
                <input type="text" id="name" name="name" required 
                       value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                       placeholder="Seu nome completo">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <i class="fas fa-envelope"></i>
                <input type="email" id="email" name="email" required 
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                       placeholder="seu@email.com">
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <i class="fas fa-lock"></i>
                <input type="password" id="password" name="password" required 
                       placeholder="Mínimo 6 caracteres">
                <i class="fas fa-eye password-toggle" id="togglePassword" onclick="togglePasswordVisibility('password', 'togglePassword')"></i>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirmar Senha</label>
                <i class="fas fa-lock"></i>
                <input type="password" id="confirm_password" name="confirm_password" required 
                       placeholder="Confirme sua senha">
                <i class="fas fa-eye password-toggle" id="toggleConfirmPassword" onclick="togglePasswordVisibility('confirm_password', 'toggleConfirmPassword')"></i>
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-user-plus"></i> Criar Conta
            </button>
        </form>

        <div class="form-footer">
            <p>Já tem uma conta? <a href="/login">Faça login aqui</a></p>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(inputId, toggleId) {
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
        }

        // Validação de nome completo
        document.querySelector('form').addEventListener('submit', function(e) {
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
    </script>
</body>
</html>