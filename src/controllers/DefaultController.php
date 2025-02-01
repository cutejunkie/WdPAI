<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function index(){
        $this->render('login');
    }

    public function register(){
        $this->render('register');
    }

    public function dashboard(){
        if(empty($_SESSION['user'])) {
            $this->render('login');
            exit();
        }
        $this->render('dashboard');
    }

    // public function addperson()
    // {
    //     if(empty($_SESSION['user'])) {
    //         $this->render('login');
    //         exit();
    //     }
    //     $this->render("addperson");
    // }

    public function yourprofile()
    {
        if(empty($_SESSION['user'])) {
            $this->render('login');
            exit();
        }
        $this->render("yourprofile");
    }

    public function admin()
    {
        if(isset($_SESSION['user']) && $_SESSION['user']['user_role'] === 'admin') {
            $this->render('admin');
            exit();
        }
        $this->render("login");
    }
}