<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Gestão Financeira</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            min-height: 100vh;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header h1 {
            font-size: 1.5rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logout-btn {
            background: rgba(255,255,255,0.2);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .welcome-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        .welcome-card h2 {
            color: #333;
            margin-bottom: 1rem;
        }

        .welcome-card p {
            color: #666;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><i class="fas fa-chart-line"></i> FinanceApp</h1>
        <div class="user-info">
            <span>Olá, <?= htmlspecialchars($user->getName()) ?>!</span>
            <a href="/logout" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </div>
    </div>

    <div class="container">
        <div class="welcome-card">
            <h2>Bem-vindo ao seu Dashboard!</h2>
            <p>Sistema de gestão financeira funcionando perfeitamente.</p>
            <p>Login realizado com sucesso para: <strong><?= htmlspecialchars($user->getEmail()) ?></strong></p>
        </div>
    </div>
</body>
</html>