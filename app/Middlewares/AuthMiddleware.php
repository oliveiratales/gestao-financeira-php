<?php
declare(strict_types=1);

namespace App\Middlewares;

use App\Services\AuthService;

class AuthMiddleware
{
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function handle(): bool
    {
        if (!$this->authService->isAuthenticated()) {
            header('Location: /login');
            exit;
        }

        return true;
    }

    public function getCurrentUser()
    {
        return $this->authService->getCurrentUser();
    }
}