<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página não encontrada</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .error-container {
            text-align: center;
            padding: 2rem;
            max-width: 600px;
        }

        .error-code {
            font-size: 8rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            animation: bounce 2s infinite;
        }

        .error-message {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            opacity: 0.9;
        }

        .error-description {
            font-size: 1rem;
            margin-bottom: 2rem;
            opacity: 0.8;
            line-height: 1.6;
        }

        .btn-home {
            display: inline-block;
            padding: 12px 30px;
            background: rgba(255,255,255,0.2);
            color: white;
            text-decoration: none;
            border-radius: 25px;
            border: 2px solid rgba(255,255,255,0.3);
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-home:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        .icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.7;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        @media (max-width: 768px) {
            .error-code {
                font-size: 5rem;
            }
            .error-message {
                font-size: 1.2rem;
            }
            .error-container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="icon">
            <i class="fas fa-exclamation-triangle"></i>
        </div>
        <div class="error-code">404</div>
        <div class="error-message">Oops! Página não encontrada</div>
        <div class="error-description">
            A página que você está procurando não existe ou foi movida para outro local.
        </div>
        <a href="/" class="btn-home">
            <i class="fas fa-home"></i> Voltar ao Início
        </a>
    </div>
</body>
</html>