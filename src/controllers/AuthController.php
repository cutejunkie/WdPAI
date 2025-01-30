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

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        $user = $this->user_repository->getUser($email);

        // if (!$user || !password_verify($password, $user->get_password())) {
        //     return $this->render('login');
        // }
        var_dump($user);

        if (!$user) {
            return $this->render('login');
        }

        $_SESSION['user'] = [
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

        $email = $_POST['email'] ?? '';
        $password = $_POST['passw'] ?? '';
        $name = $_POST['name'] ?? '';

        if ($this->user_repository->getUser($email)) {
            return $this->render('login');
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User($email, $hashedPassword, $name);
        
        $this->user_repository->addUser($user);

        return $this->render('login');
    }

    public function logout() {
        session_unset();
        header("Location: /login");
        exit();
    }
}