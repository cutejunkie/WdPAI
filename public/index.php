<?php
require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/repositories/user_repository.php';
require_once __DIR__ . '/../src/controllers/DefaultController.php';


$publicDir = __DIR__;

session_start();

// baza danych test
$new_repo = new UserRepository();

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
$default_controller = new DefaultController();

// Definiowanie tras
$router->add('/', function() use($default_controller) {
    $default_controller->index();
});

$router->add('/dashboard', function() use($default_controller) {
    $default_controller->dashboard();
});

$router->add('/addperson', function() use($default_controller) {
    $default_controller->addperson();
});

$router->add('/login', function() use($default_controller) {
    $default_controller->index();
});

$router->add('/register', function() use($default_controller) {
    $default_controller->register();
});

$router->add('/yourprofile', function() use($default_controller) {
    $default_controller->yourprofile();
});

// Obsługa żądania
$router->dispatch($_SERVER['REQUEST_URI']);