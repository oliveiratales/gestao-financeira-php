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
                <a href="#" class="dropdown-item"><i class="fas fa-bell"></i> Notificações</a>
                <a href="/logout" class="dropdown-item logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-menu">
            <div class="sidebar-content">
                <!-- Principal -->
                <div class="menu-section">
                    <div class="menu-section-title">Principal</div>
                    <a href="/dashboard" class="menu-item <?= ($activePage ?? '') === 'dashboard' ? 'active' : '' ?>">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </div>

                <!-- Financeiro -->
                <div class="menu-section">
                    <div class="menu-section-title">Financeiro</div>
                    <a href="/entradas" class="menu-item <?= ($activePage ?? '') === 'entradas' ? 'active' : '' ?>">
                        <i class="fas fa-arrow-down"></i>
                        <span>Entradas</span>
                    </a>
                    <a href="/saidas" class="menu-item <?= ($activePage ?? '') === 'saidas' ? 'active' : '' ?>">
                        <i class="fas fa-arrow-up"></i>
                        <span>Saídas</span>
                    </a>
                    <a href="/categorias" class="menu-item <?= ($activePage ?? '') === 'categorias' ? 'active' : '' ?>">
                        <i class="fas fa-tags"></i>
                        <span>Categorias</span>
                    </a>
                    <a href="/metas" class="menu-item <?= ($activePage ?? '') === 'metas' ? 'active' : '' ?>">
                        <i class="fas fa-bullseye"></i>
                        <span>Metas</span>
                    </a>
                    <a href="/dividas" class="menu-item <?= ($activePage ?? '') === 'dividas' ? 'active' : '' ?>">
                        <i class="fas fa-credit-card"></i>
                        <span>Dívidas</span>
                    </a>
                    <a href="/orcamento-mensal"
                        class="menu-item <?= ($activePage ?? '') === 'orcamento-mensal' ? 'active' : '' ?>">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Orçamento Mensal</span>
                    </a>
                    <a href="/investimentos"
                        class="menu-item <?= ($activePage ?? '') === 'investimentos' ? 'active' : '' ?>">
                        <i class="fas fa-chart-line"></i>
                        <span>Investimentos</span>
                    </a>
                    <a href="/limites" class="menu-item <?= ($activePage ?? '') === 'limites' ? 'active' : '' ?>">
                        <i class="fas fa-sliders-h"></i>
                        <span>Limites</span>
                    </a>
                </div>

                <!-- Relatórios -->
                <div class="menu-section">
                    <div class="menu-section-title">Relatórios</div>
                    <a href="/relatorios" class="menu-item <?= ($activePage ?? '') === 'relatorios' ? 'active' : '' ?>">
                        <i class="fas fa-file-alt"></i>
                        <span>Relatórios</span>
                    </a>
                </div>
            </div>

            <!-- Footer da sidebar -->
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