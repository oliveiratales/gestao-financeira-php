<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Services\AuthService;

class AuthController
{
    private AuthService $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function showLogin(): void
    {
        if ($this->authService->isAuthenticated()) {
            header('Location: /dashboard');
            exit;
        }
        
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    public function login(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'] ?? '';

        if (!$email || empty($password)) {
            $error = 'Email e senha são obrigatórios';
            require_once __DIR__ . '/../Views/auth/login.php';
            return;
        }

        if ($this->authService->login($email, $password)) {
            header('Location: /dashboard');
            exit;
        }

        $error = 'Email ou senha inválidos';
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    public function showRegister(): void
    {
        if ($this->authService->isAuthenticated()) {
            header('Location: /dashboard');
            exit;
        }
        
        require_once __DIR__ . '/../Views/auth/register.php';
    }

    public function register(): void
    {
        $name = trim($_POST['name'] ?? '');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if (empty($name) || !$email || empty($password)) {
            $error = 'Todos os campos são obrigatórios';
            require_once __DIR__ . '/../Views/auth/register.php';
            return;
        }

        // Validar nome completo (nome + sobrenome)
        $nameParts = array_filter(explode(' ', $name), fn($part) => !empty(trim($part)));
        if (count($nameParts) < 2) {
            $error = 'Por favor, informe seu nome completo (nome e sobrenome)';
            require_once __DIR__ . '/../Views/auth/register.php';
            return;
        }

        if ($password !== $confirmPassword) {
            $error = 'Senhas não coincidem';
            require_once __DIR__ . '/../Views/auth/register.php';
            return;
        }

        if (strlen($password) < 6) {
            $error = 'Senha deve ter pelo menos 6 caracteres';
            require_once __DIR__ . '/../Views/auth/register.php';
            return;
        }

        $result = $this->authService->register($name, $email, $password);
        
        if ($result['success']) {
            $success = $result['message'];
            require_once __DIR__ . '/../Views/auth/login.php';
        } else {
            $error = $result['message'];
            require_once __DIR__ . '/../Views/auth/register.php';
        }
    }

    public function logout(): void
    {
        $this->authService->logout();
        header('Location: /login');
        exit;
    }
}