<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Middlewares\AuthMiddleware;

class DashboardController
{
    public function index(): void
    {
        // Middleware já validou autenticação
        $authMiddleware = new AuthMiddleware();
        $user = $authMiddleware->getCurrentUser();
        
        require_once __DIR__ . '/../Views/dashboard/index.php';
    }
}