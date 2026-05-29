<?php

/**
 * PHP built-in server router for clean URL support.
 * Usage: php -S localhost:8000 router.php
 */

declare(strict_types=1);

$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

// Strip trailing slash (except root)
if ($path !== '/' && str_ends_with($path, '/')) {
    $path = rtrim($path, '/');
}

// Map of clean slugs to PHP files
$routes = [
    '/'           => '/index.php',
    '/products'   => '/products.php',
    '/catalogues' => '/catalogues.php',
    '/contact'    => '/contact.php',
];

// Serve static files directly (css, js, images, fonts, etc.)
$filePath = __DIR__ . $path;
if ($path !== '/' && file_exists($filePath) && is_file($filePath)) {
    return false; // let built-in server handle it
}

// Resolve route
if (isset($routes[$path])) {
    $phpFile = __DIR__ . $routes[$path];
    if (file_exists($phpFile)) {
        require $phpFile;
        return true;
    }
}

// Already a .php path? serve it directly
if (str_ends_with($path, '.php') && file_exists(__DIR__ . $path)) {
    require __DIR__ . $path;
    return true;
}

// 404
http_response_code(404);
echo '<!doctype html><title>404 Not Found</title><h1>404 Not Found</h1>';
return true;
