<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Note.php';
require_once __DIR__ . '/../repositories/notes_repository.php';

class NoteController extends AppController
{
    private $notes_repository;

    public function __construct()
    {
        parent::__construct();
        $this->notes_repository = new NotesRepository();
    }

    public function addNote()
    {
        if (empty($_SESSION['user'])) {
            $this->render('login');
            exit();
        }

        if ($this->isPost()) {
            $giftedName = $_POST['gifted_name'];
            $dateOfBirth = $_POST['date_of_birth'];
            $ideas = $_POST['ideas'];
            $userId = $_SESSION['user']['user_id'];

            $note = new Note($giftedName, $dateOfBirth, $ideas);
            $this->notes_repository->addNote($note, $userId);
        }

        $this->render('addperson');
    }

    public function notes()
    {
        if (empty($_SESSION['user'])) {
            $this->render('login');
            exit();
        }

        $userId = $_SESSION['user']['user_id'];
        $notes = $this->notes_repository->getNotesByUser($userId);
        $this->render('dashboard', ["notes"=>$notes]);
    }
}
