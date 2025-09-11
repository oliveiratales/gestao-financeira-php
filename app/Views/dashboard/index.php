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
    <!-- Header -->
    <div class="dashboard-header">
        <div class="header-left">
            <button class="menu-toggle" id="menuToggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1><i class="fas fa-chart-line"></i> <?= $_ENV['APP_NAME'] ?? 'FinanceApp' ?></h1>
        </div>
        <div class="user-info">
            <button class="user-dropdown" id="userDropdown">
                <i class="fas fa-user-circle"></i>
                <span><?= htmlspecialchars(explode(' ', $user->getName())[0]) ?></span>
                <i class="fas fa-chevron-down"></i>
            </button>
            <div class="user-dropdown-menu" id="userDropdownMenu">
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user"></i>
                    <span>Perfil</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-cog"></i>
                    <span>Preferências</span>
                </a>
                <a href="/logout" class="dropdown-item logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sair</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Layout Principal -->
    <div class="dashboard-layout">
        <!-- Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-menu">
                <div class="sidebar-content">
                    <div class="menu-section">
                    <div class="menu-section-title">Principal</div>
                    <a href="/dashboard" class="menu-item active">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
                
                <div class="menu-section">
                    <div class="menu-section-title">Financeiro</div>
                    <a href="#" class="menu-item">
                        <i class="fas fa-wallet"></i>
                        <span>Contas</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="fas fa-exchange-alt"></i>
                        <span>Transações</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="fas fa-chart-pie"></i>
                        <span>Categorias</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Orçamentos</span>
                    </a>
                </div>
                
                <div class="menu-section">
                    <div class="menu-section-title">Relatórios</div>
                    <a href="#" class="menu-item">
                        <i class="fas fa-chart-bar"></i>
                        <span>Fluxo de Caixa</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="fas fa-chart-line"></i>
                        <span>Evolução Patrimonial</span>
                    </a>
                    <a href="#" class="menu-item">
                        <i class="fas fa-file-alt"></i>
                        <span>Relatórios Gerais</span>
                    </a>
                </div>
                </div>
                
                <div class="sidebar-footer">
                    <div class="app-info">
                        <div class="app-name"><?= $_ENV['APP_NAME'] ?? 'FinanceApp' ?></div>
                        <div class="app-version">v<?= $_ENV['APP_VERSION'] ?? '1.0.0' ?> • <?= date('Y') ?></div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Overlay para mobile -->
        <div class="sidebar-overlay"></div>

        <!-- Conteúdo Principal -->
        <main class="main-content" id="mainContent">
            <div class="welcome-message">
                <h2>Bem-vindo ao seu Dashboard!</h2>
                <p>Sistema de gestão financeira funcionando perfeitamente.</p>
                <p>Login realizado com sucesso para: <strong><?= htmlspecialchars($user->getEmail()) ?></strong></p>
            </div>
        </main>
    </div>

    <script src="/js/dashboard.js?v=1"></script>
</body>
</html>