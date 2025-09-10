<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - <?= $_ENV['APP_NAME'] ?? 'FinanceApp' ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css?v=2">
</head>
<body class="dashboard-container">
    <div class="dashboard-header">
        <h1><i class="fas fa-chart-line"></i> <?= $_ENV['APP_NAME'] ?? 'FinanceApp' ?></h1>
        <div class="user-info">
            <span>Olá, <?= htmlspecialchars($user->getName()) ?>!</span>
            <a href="/logout" class="btn btn-secondary">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </div>
    </div>

    <div class="dashboard-content">
        <div class="welcome-message">
            <h2>Bem-vindo ao seu Dashboard!</h2>
            <p>Sistema de gestão financeira funcionando perfeitamente.</p>
            <p>Login realizado com sucesso para: <strong><?= htmlspecialchars($user->getEmail()) ?></strong></p>
        </div>
    </div>
</body>
</html>