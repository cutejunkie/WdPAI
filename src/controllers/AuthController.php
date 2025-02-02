<?php

require_once 'AppController.php';
require_once __DIR__.'/../repositories/user_repository.php';
require_once __DIR__ . '/../models/User.php';

class AuthController extends AppController {

    private $user_repository;

    public function __construct()
    {
        parent::__construct();
        $this->user_repository = new UserRepository();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';
        
        $user = $this->user_repository->getUser($email);

        if (!$user || !password_verify($password, $user->get_password())) {
            return $this->render('login');
        }

        if (!$user) {
            return $this->render('login');
        }

        $_SESSION['user'] = [
            'user_id' => $user->get_id(),
            'email' => $user->get_email(),
            'user_name' => $user->get_name(),
            'creation_date' => $user->get_creation_date(),
            'user_role' => $user->get_role()
        ];

        header("Location: /dashboard");
        exit();
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $json = file_get_contents('php://input');
        $data = json_decode($json, true);

        $email = $data['email'] ?? '';
        $password = $data['password'] ?? '';
        $name = $data['user_name'] ?? '';

        if ($this->user_repository->getUser($email)) {
            header("Location: /login");
            exit();
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User($email, $hashedPassword, $name);
        
        $this->user_repository->addUser($user);

        header("Location: /login");
        exit();
    }

    public function logout() {
        session_unset();
        header("Location: /login");
        exit();
    }
}