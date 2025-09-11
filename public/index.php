<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use App\Core\Router;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;
use App\Middlewares\AuthMiddleware;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$router = new Router();

// Rotas públicas
$router->get('/login', [AuthController::class, 'showLogin']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'showRegister']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);

// Rotas protegidas (com middleware de autenticação)
$router->group([AuthMiddleware::class], function($router) {
    $router->get('/dashboard', [DashboardController::class, 'index']);
});

// Rota raiz redireciona para login
$router->get('/', function() {
    header('Location: /login');
    exit;
});

$router->resolve();
