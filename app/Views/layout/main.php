<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_ENV['APP_NAME'] ?? 'FinanceApp' ?> - <?= $title ?? '' ?></title>
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css?v=2">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="dashboard-container">

    <!-- Header -->
    <header class="dashboard-header">
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
                <a href="#" class="dropdown-item"><i class="fas fa-user"></i> Perfil</a>
                <a href="#" class="dropdown-item"><i class="fas fa-cog"></i> Preferências</a>
                <a href="/logout" class="dropdown-item logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
            </div>
        </div>
    </header>

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

    <div class="sidebar-overlay"></div>

    <!-- Conteúdo principal da página -->
    <main class="main-content" id="mainContent">
        <?= $content ?? '' ?>
    </main>

    <script src="/js/dashboard.js?v=1"></script>
    <?= $scripts ?? '' ?>
</body>

</html>