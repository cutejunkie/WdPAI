<?php

require_once 'AppController.php';
require_once __DIR__.'/../repositories/user_repository.php';
require_once __DIR__ . '/../models/User.php'

class AuthController extends AppController {

    private $user_repository;
    private $user;

    public function __construct()
    {
        parent::__construct();
        $this->user_repository = new UserRepository();
        //// $this->user = new User();
    }

    public function login()
    {
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        // $user = $this->user_repository->get_user($email); ??????????????????????????????

        if (!$user) {
            return $this->render('login');
        }

        if ($user->get_email() !== $email) {
            return $this->render('login');
        }

        if (!password_verify($password,$user->getPassword())) {
            return $this->render('login', ['messages' => ['Wprowadz poprawne haslo!']]);
        }

        $_SESSION['user'] = [
            'id' => $user->get_id(),
            'email' => $user->get_email(),
            'user_name' => $user->get_name(),
            'creation_date' => $user->get_creation_date(),
            'user_role' => $user->get_role()
        ];

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/events");
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['passw'];
        $name = $_POST['name'];

        if($this->userRepository->getUser($email)) {
            return $this->render('signup', ['messages' => ['Podany email jest juz uzywany!']]);
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $user = new User($email, $hashedPassword, $name, $surname);
        $user->setPhone($phone);

        $this->userRepository->addUser($user);

        return $this->render('login');
    }

    public function logout() {
        session_destroy();
        $this->render('login');
    }
}