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

    // public function deleteNote()
    // {
    //     if (empty($_SESSION['user'])) {
    //         $this->render('login');
    //         exit();
    //     }

    //     if (!$this->isPost() || empty($_POST['note_id'])) {
    //         http_response_code(400);
    //         echo json_encode(["error" => "Brak danych"]);
    //         exit();
    //     }

    //     $noteId = (int) $_POST['note_id'];
    //     $this->notes_repository->deleteNoteById($noteId);

    //     //echo json_encode(["success" => true]);
    // }

    public function deleteNote()
    {
        if (empty($_SESSION['user'])) {
            echo json_encode(["success" => false, "error" => "Brak autoryzacji"]);
            exit();
        }

        if (!$this->isPost()) {
            echo json_encode(["success" => false, "error" => "Nieprawidłowa metoda"]);
            exit();
        }

        $noteId = $_POST['note_id'] ?? null;

        if (!$noteId) {
            echo json_encode(["success" => false, "error" => "Brak ID notatki"]);
            exit();
        }

        $this->notes_repository->deleteNoteById((int) $noteId);
        
        echo json_encode(["success" => true]);
        exit();
    }

}
