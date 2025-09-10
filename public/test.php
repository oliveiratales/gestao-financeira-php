<?php
echo "PHP funcionando!<br>";
echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "<br>";
echo "PATH_INFO: " . ($_SERVER['PATH_INFO'] ?? 'não definido') . "<br>";
echo "SCRIPT_NAME: " . $_SERVER['SCRIPT_NAME'] . "<br>";

// Teste do autoload
require __DIR__ . '/../vendor/autoload.php';
echo "Autoload funcionando!<br>";

// Teste da conexão com banco
use Config\Database;

try {
    $db = Database::getConnection();
    echo "Conexão com banco funcionando!<br>";
} catch (Exception $e) {
    echo "Erro no banco: " . $e->getMessage() . "<br>";
}