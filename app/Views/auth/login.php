<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?= $_ENV['APP_NAME'] ?? 'FinanceApp' ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css?v=4">
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1><i class="fas fa-chart-line"></i> <?= $_ENV['APP_NAME'] ?? 'FinanceApp' ?></h1>
            <p>Faça login para acessar sua conta</p>
        </div>

        <?php if (isset($error)): ?>
            <div class="alert alert-error">
                <i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if (isset($success)): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> <?= htmlspecialchars($success) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="/login">
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
                       placeholder="Sua senha">
                <i class="fas fa-eye password-toggle" id="togglePassword" onclick="togglePasswordVisibility('password', 'togglePassword')"></i>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Lembrar meus dados</label>
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-sign-in-alt"></i> Entrar
            </button>
        </form>

        <div class="form-footer">
            <p>Não tem uma conta? <a href="/register">Cadastre-se aqui</a></p>
        </div>
    </div>

    <script src="/js/auth.js?v=1"></script>
</body>
</html>