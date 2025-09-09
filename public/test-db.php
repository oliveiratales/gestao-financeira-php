<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Config\Database;

try {
    $pdo = Database::getConnection();
    echo "Conexão com o banco de dados realizada com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao conectar: " . $e->getMessage();
}
