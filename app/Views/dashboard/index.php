<?php
$title = "Dashboard Financeiro";
$activePage = 'dashboard';
ob_start();
?>

<!-- Cards de Resumo -->
<div class="stats-grid">
    <div class="stat-card balance">
        <div class="stat-icon">
            <i class="fas fa-wallet"></i>
        </div>
        <div class="stat-content">
            <h3>Saldo Atual</h3>
            <p class="stat-value">R$ 12.450,00</p>
            <span class="stat-change positive">+5.2% este mês</span>
        </div>
    </div>

    <div class="stat-card income">
        <div class="stat-icon">
            <i class="fas fa-arrow-up"></i>
        </div>
        <div class="stat-content">
            <h3>Receitas</h3>
            <p class="stat-value">R$ 8.200,00</p>
            <span class="stat-change positive">+12.3% este mês</span>
        </div>
    </div>

    <div class="stat-card expense">
        <div class="stat-icon">
            <i class="fas fa-arrow-down"></i>
        </div>
        <div class="stat-content">
            <h3>Despesas</h3>
            <p class="stat-value">R$ 5.750,00</p>
            <span class="stat-change negative">+8.1% este mês</span>
        </div>
    </div>

    <div class="stat-card savings">
        <div class="stat-icon">
            <i class="fas fa-piggy-bank"></i>
        </div>
        <div class="stat-content">
            <h3>Economia</h3>
            <p class="stat-value">R$ 2.450,00</p>
            <span class="stat-change positive">+18.5% este mês</span>
        </div>
    </div>
</div>

<!-- Seção Principal -->
<div class="dashboard-grid">
    <!-- Gráfico Principal -->
    <div class="dashboard-card chart-card">
        <div class="card-header">
            <h3>Evolução Financeira</h3>
            <div class="card-actions">
                <button class="btn-icon"><i class="fas fa-expand"></i></button>
            </div>
        </div>
        <div class="chart-container">
            <canvas id="mainChart"></canvas>
        </div>
    </div>

    <!-- Últimas Transações -->
    <div class="dashboard-card transactions-card">
        <div class="card-header">
            <h3>Últimas Transações</h3>
            <a href="#" class="btn-link">Ver todas</a>
        </div>
        <div class="transactions-list">
            <div class="transaction-item">
                <div class="transaction-icon income">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="transaction-details">
                    <span class="transaction-title">Salário</span>
                    <span class="transaction-date">Hoje</span>
                </div>
                <span class="transaction-amount positive">+R$ 5.000,00</span>
            </div>
            <div class="transaction-item">
                <div class="transaction-icon expense">
                    <i class="fas fa-minus"></i>
                </div>
                <div class="transaction-details">
                    <span class="transaction-title">Supermercado</span>
                    <span class="transaction-date">Ontem</span>
                </div>
                <span class="transaction-amount negative">-R$ 280,50</span>
            </div>
            <div class="transaction-item">
                <div class="transaction-icon expense">
                    <i class="fas fa-minus"></i>
                </div>
                <div class="transaction-details">
                    <span class="transaction-title">Conta de Luz</span>
                    <span class="transaction-date">2 dias atrás</span>
                </div>
                <span class="transaction-amount negative">-R$ 150,00</span>
            </div>
            <div class="transaction-item">
                <div class="transaction-icon income">
                    <i class="fas fa-plus"></i>
                </div>
                <div class="transaction-details">
                    <span class="transaction-title">Freelance</span>
                    <span class="transaction-date">3 dias atrás</span>
                </div>
                <span class="transaction-amount positive">+R$ 800,00</span>
            </div>
        </div>
    </div>

    <!-- Categorias de Gastos -->
    <div class="dashboard-card categories-card">
        <div class="card-header">
            <h3>Gastos por Categoria</h3>
            <div class="card-actions">
                <button class="btn-icon"><i class="fas fa-chart-pie"></i></button>
            </div>
        </div>
        <div class="categories-list">
            <div class="category-item">
                <div class="category-info">
                    <span class="category-name">Alimentação</span>
                    <span class="category-amount">R$ 1.200,00</span>
                </div>
                <div class="category-bar">
                    <div class="category-progress" style="width: 60%"></div>
                </div>
            </div>
            <div class="category-item">
                <div class="category-info">
                    <span class="category-name">Transporte</span>
                    <span class="category-amount">R$ 800,00</span>
                </div>
                <div class="category-bar">
                    <div class="category-progress" style="width: 40%"></div>
                </div>
            </div>
            <div class="category-item">
                <div class="category-info">
                    <span class="category-name">Lazer</span>
                    <span class="category-amount">R$ 600,00</span>
                </div>
                <div class="category-bar">
                    <div class="category-progress" style="width: 30%"></div>
                </div>
            </div>
            <div class="category-item">
                <div class="category-info">
                    <span class="category-name">Saúde</span>
                    <span class="category-amount">R$ 400,00</span>
                </div>
                <div class="category-bar">
                    <div class="category-progress" style="width: 20%"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contas a Pagar -->
    <div class="dashboard-card bills-card">
        <div class="card-header">
            <h3>Contas a Pagar</h3>
            <a href="#" class="btn-link">Gerenciar</a>
        </div>
        <div class="bills-list">
            <div class="bill-item urgent">
                <div class="bill-info">
                    <span class="bill-name">Cartão de Crédito</span>
                    <span class="bill-due">Vence em 2 dias</span>
                </div>
                <span class="bill-amount">R$ 1.250,00</span>
            </div>
            <div class="bill-item warning">
                <div class="bill-info">
                    <span class="bill-name">Internet</span>
                    <span class="bill-due">Vence em 5 dias</span>
                </div>
                <span class="bill-amount">R$ 89,90</span>
            </div>
            <div class="bill-item normal">
                <div class="bill-info">
                    <span class="bill-name">Aluguel</span>
                    <span class="bill-due">Vence em 15 dias</span>
                </div>
                <span class="bill-amount">R$ 1.800,00</span>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

$scripts = <<<JS
<script>
const ctx = document.getElementById('mainChart')?.getContext('2d');
if(ctx){
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
            datasets: [{
                label: 'Receitas',
                data: [6500, 7200, 6800, 8200, 7500, 8200],
                borderColor: '#10B981',
                backgroundColor: 'rgba(16, 185, 129, 0.1)',
                tension: 0.4,
                fill: true
            }, {
                label: 'Despesas',
                data: [4200, 4800, 5100, 4900, 5200, 5750],
                borderColor: '#F87171',
                backgroundColor: 'rgba(248, 113, 113, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'top' } },
            scales: {
                y: { beginAtZero: true, ticks: { callback: v => 'R$ ' + v.toLocaleString('pt-BR') } }
            }
        }
    });
}
</script>
JS;

include __DIR__ . '/../layout/main.php';