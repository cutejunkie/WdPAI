<?php
require_once __DIR__ . '/../src/Router.php';

$publicDir = __DIR__;

// Sprawdzenie, czy żądanie dotyczy pliku statycznego
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$filePath = $publicDir . $requestUri;

if (file_exists($filePath) && is_file($filePath)) {
    // Ustawienie odpowiedniego typu Content-Type
    $mimeType = mime_content_type($filePath);
    header("Content-Type: $mimeType");

    // Wyświetlenie zawartości pliku
    readfile($filePath);
    exit;
}

$router = new Router();

// Definiowanie tras
$router->add('/', function() {
    include './html/dashboard.html';
});

$router->add('/dashboard', function() {
    include './html/dashboard.html';
});

$router->add('/addperson', function() {
    include './html/addperson.html';
});

$router->add('/login', function() {
    include './html/login.php';
});

$router->add('/register', function() {
    include './html/register.php';
});

$router->add('/yourprofile', function() {
    include './html/yourprofile.html';
});

// $basePath => 'html/dashboard.html',
// $basePath . 'dashboard' => 'html/dashboard.html',
// $basePath . 'addperson' => 'html/addperson.html',
// $basePath . 'yourprofile' => 'html/yourprofile.html',
// $basePath . 'login' => 'html/login.html',
// $basePath . 'register' => 'html/register.html',

// Obsługa żądania
$router->dispatch($_SERVER['REQUEST_URI']);