<?php

require_once 'AppController.php';
require_once __DIR__.'/../repositories/user_repository.php';
require_once __DIR__ . '/../models/User.php';

class AdminController extends AppController
{
    private $users_repository;

    public function __construct()
    {
        parent::__construct();
        $this->users_repository = new UserRepository();  // Upewnij się, że nazwa klasy jest poprawna
    }

    public function users()
    {
        if (empty($_SESSION['user']) || $_SESSION['user']['user_role'] !== 'admin') {
            $this->render('login');
            exit();
        }

        $users = $this->users_repository->getAllUsers();

        // Przekazanie użytkowników do widoku
        $this->render('admin', ['users' => $users]);
    }
}
