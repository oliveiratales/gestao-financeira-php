<?php
declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $path, callable|array $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function post(string $path, callable|array $handler): void
    {
        $this->routes['POST'][$path] = $handler;
    }

    public function resolve(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];
        
        // Remove query string e normaliza a URL
        $path = parse_url($uri, PHP_URL_PATH);
        
        // Se path vazio, redireciona para /
        if (empty($path) || $path === '/') {
            $path = '/';
        }
        
        if (isset($this->routes[$method][$path])) {
            $handler = $this->routes[$method][$path];
            
            if (is_array($handler)) {
                [$controller, $methodName] = $handler;
                (new $controller())->$methodName();
            } else {
                $handler();
            }
        } else {
            http_response_code(404);
            require_once __DIR__ . '/../Views/errors/404.php';
        }
    }
}