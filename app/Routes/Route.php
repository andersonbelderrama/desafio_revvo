<?php

namespace App\Routes;

class Route
{
    protected static $routes = [];

    public static function get($uri, $action)
    {
        self::addRoute('GET', $uri, $action);
    }

    public static function post($uri, $action)
    {
        self::addRoute('POST', $uri, $action);
    }
    
    public static function put($uri, $action)
    {
        self::addRoute('PUT', $uri, $action);
    }

    public static function delete($uri, $action)
    {
        self::addRoute('DELETE', $uri, $action);
    }

    public static function patch($uri, $action)
    {
        self::addRoute('PATCH', $uri, $action);
    }
    
    protected static function addRoute($method, $uri, $action)
    {
        self::$routes[] = [$method, $uri, $action];
    }

    public static function dispatch($uri)
    {
        foreach (self::$routes as $route) {
            list($method, $pattern, $action) = $route;
    
            if ($_SERVER['REQUEST_METHOD'] === $method && preg_match("#^{$pattern}$#", $uri)) {
                if (is_callable($action)) {
                    $action();
                    return;
                }
    
                if (is_array($action) && count($action) === 2) {
                    [$controllerClass, $method] = $action;
                    $controller = new $controllerClass();
                    $controller->$method();
                    return;
                }
    
                echo 'Ação inválida na rota';
                return;
            }
        }
    
        echo 'Página não encontrada';
    }
}