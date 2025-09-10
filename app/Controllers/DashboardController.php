<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Services\AuthService;

class DashboardController
{
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function index(): void
    {
        if (!$this->authService->isAuthenticated()) {
            header('Location: /login');
            exit;
        }

        $user = $this->authService->getCurrentUser();
        require_once __DIR__ . '/../Views/dashboard/index.php';
    }
}