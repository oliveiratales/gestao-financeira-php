<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Config\Database;
use PDO;

class UserRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function findByEmail(string $email): ?User
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ? AND is_active = 1");
        $stmt->execute([$email]);
        $userData = $stmt->fetch();

        if (!$userData) {
            return null;
        }

        return new User(
            $userData['id'],
            $userData['name'],
            $userData['email'],
            $userData['password'],
            new \DateTime($userData['created_at']),
            $userData['last_login'] ? new \DateTime($userData['last_login']) : null,
            (bool)$userData['is_first_access'],
            (bool)$userData['is_active']
        );
    }

    public function create(User $user): bool
    {
        $stmt = $this->db->prepare("
            INSERT INTO users (name, email, password, created_at) 
            VALUES (?, ?, ?, NOW())
        ");
        
        return $stmt->execute([
            $user->getName(),
            $user->getEmail(),
            $user->getPassword()
        ]);
    }

    public function emailExists(string $email): bool
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM users WHERE email = ? AND is_active = 1");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    public function updateLastLogin(int $userId): bool
    {
        $stmt = $this->db->prepare("
            UPDATE users 
            SET last_login = NOW(), is_first_access = FALSE 
            WHERE id = ?
        ");
        return $stmt->execute([$userId]);
    }

    public function deactivateUser(int $userId): bool
    {
        $stmt = $this->db->prepare("UPDATE users SET is_active = FALSE WHERE id = ?");
        return $stmt->execute([$userId]);
    }
}