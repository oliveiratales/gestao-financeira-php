<?php
declare(strict_types=1);

namespace App\Core;

class Router
{
    private array $routes = [];
    private array $groupMiddleware = [];

    public function get(string $path, callable|array $handler, array $middleware = []): void
    {
        $this->routes['GET'][$path] = ['handler' => $handler, 'middleware' => array_merge($this->groupMiddleware, $middleware)];
    }

    public function post(string $path, callable|array $handler, array $middleware = []): void
    {
        $this->routes['POST'][$path] = ['handler' => $handler, 'middleware' => array_merge($this->groupMiddleware, $middleware)];
    }

    public function group(array $middleware, callable $callback): void
    {
        $previousMiddleware = $this->groupMiddleware;
        $this->groupMiddleware = array_merge($this->groupMiddleware, $middleware);
        
        $callback($this);
        
        $this->groupMiddleware = $previousMiddleware;
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
            $route = $this->routes[$method][$path];
            $handler = $route['handler'];
            $middleware = $route['middleware'] ?? [];
            
            // Executar middlewares
            foreach ($middleware as $middlewareClass) {
                $middlewareInstance = new $middlewareClass();
                if (!$middlewareInstance->handle()) {
                    return;
                }
            }
            
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