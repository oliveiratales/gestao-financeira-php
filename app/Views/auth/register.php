<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Gestão Financeira</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1><i class="fas fa-chart-line"></i> FinanceApp</h1>
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
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirmar Senha</label>
                <i class="fas fa-lock"></i>
                <input type="password" id="confirm_password" name="confirm_password" required 
                       placeholder="Confirme sua senha">
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-user-plus"></i> Criar Conta
            </button>
        </form>

        <div class="form-footer">
            <p>Já tem uma conta? <a href="/login">Faça login aqui</a></p>
        </div>
    </div>
</body>
</html>