<?php
require __DIR__ . '/vendor/autoload.php';

use Config\Database;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

try {
    $db = Database::getConnection();
    
    $sql = file_get_contents(__DIR__ . '/database/users.sql');
    $db->exec($sql);
    
    echo "✅ Tabela 'users' criada com sucesso!\n";
    echo "🚀 Sistema pronto para uso!\n";
    echo "\nAcesse: http://localhost/gestao-financeira-php/public/\n";
    
} catch (Exception $e) {
    echo "❌ Erro ao configurar banco: " . $e->getMessage() . "\n";
}