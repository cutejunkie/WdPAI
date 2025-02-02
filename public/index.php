<?php
require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/controllers/DefaultController.php';
require_once __DIR__ . '/../src/controllers/AuthController.php';
require_once __DIR__ . '/../src/controllers/NoteController.php';
require_once __DIR__ . '/../src/controllers/AdminController.php';

$publicDir = __DIR__;

session_start();


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
$auth_controller = new AuthController();
$note_controller = new NoteController();
$admin_controller = new AdminController();

// Definiowanie tras
$router->add('/', function() use($default_controller) {
    $default_controller->index();
});

$router->add('/dashboard', function() use($note_controller) {
    $note_controller->notes();
});

$router->add('/addperson', function() use($note_controller) {
    $note_controller->addNote();
});

$router->add('/login', function() use($default_controller) {
    $default_controller->index();
});

$router->add('/register', function() use($default_controller) {
    $default_controller->register();
});

$router->add('/api/login', function() use($auth_controller) {
    $auth_controller->login();
});

$router->add('/api/register', function() use($auth_controller) {
    $auth_controller->register();
});

$router->add('/api/logout', function() use($auth_controller) {
    $auth_controller->logout();
});

$router->add('/yourprofile', function() use($default_controller) {
    $default_controller->yourprofile();
});

$router->add('/api/deleteNote', function() use($note_controller) {
    $note_controller->deleteNote();
});

// panel admina
$router->add('/admin', function() use($admin_controller) {
    $admin_controller->users();
});

// Obsługa żądania
$router->dispatch($_SERVER['REQUEST_URI']);