<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class AuthService
{
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function login(string $email, string $password): bool
    {
        $user = $this->userRepository->findByEmail($email);
        
        if (!$user || !$user->verifyPassword($password)) {
            return false;
        }

        $this->userRepository->updateLastLogin($user->getId());
        $this->startSession($user);
        return true;
    }

    public function register(string $name, string $email, string $password): array
    {
        if ($this->userRepository->emailExists($email)) {
            return ['success' => false, 'message' => 'Email já cadastrado'];
        }

        $user = new User();
        $user->setName($name);
        $user->setEmail($email);
        $user->setPassword($password);

        if ($this->userRepository->create($user)) {
            return ['success' => true, 'message' => 'Usuário criado com sucesso'];
        }

        return ['success' => false, 'message' => 'Erro ao criar usuário'];
    }

    public function logout(): void
    {
        session_destroy();
    }

    public function isAuthenticated(): bool
    {
        return isset($_SESSION['user_id']);
    }

    public function getCurrentUser(): ?User
    {
        if (!$this->isAuthenticated()) {
            return null;
        }

        return $this->userRepository->findByEmail($_SESSION['user_email']);
    }

    private function startSession(User $user): void
    {
        session_start();
        $_SESSION['user_id'] = $user->getId();
        $_SESSION['user_email'] = $user->getEmail();
        $_SESSION['user_name'] = $user->getName();
        $_SESSION['is_first_access'] = $user->isFirstAccess();
    }
}