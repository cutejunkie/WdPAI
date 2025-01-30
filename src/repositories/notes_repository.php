<?php

class NotesRepository {
    private $db_connection;

    function __construct() {
        $this->db_connection = pg_connect("host=localhost dbname=bazadanych user=gaba password=haslo port=5432");
        $stmt = 'CREATE TABLE IF NOT EXISTS notes (id SERIAL PRIMARY KEY, id_user INTEGER REFERENCES users(id), gifted_name VARCHAR (16) NOT NULL, date_of_birth DATE NOT NULL, ideas VARCHAR(255) NOT NULL);';
        pg_query($this->db_connection, $stmt);
    }

    function __destruct(){
        pg_close($this->db_connection);
    }


/* najpier notes potem to*/

    public function addNote(Note $note, int $userId): void {
        $query = "INSERT INTO notes (id_user, gifted_name, date_of_birth, ideas) VALUES ($1, $2, $3, $4)";
        pg_query_params($this->db_connection, $query, [
            $userId,
            $note->get_gifted_name(),
            $note->get_date_of_birth(),
            $note->get_ideas()
        ]);
    }

    // public function getNotesByUser(int $userId): array {
    //     $query = "SELECT id, gifted_name, date_of_birth, ideas FROM notes WHERE id_user = $1";
    //     $result = pg_query_params($this->db_connection, $query, [$userId]);
        
    //     $notes = [];
    //     while ($row = pg_fetch_assoc($result)) {
    //         $note = new Note(
    //             $row['gifted_name'],
    //             $row['date_of_birth'],
    //             $row['ideas']
    //         );
    //         $notes[] = $note;
    //     }

    //     return $notes;
    // }


    // ?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
    public function deleteNoteById(int $noteId): void {
        $query = "DELETE FROM notes WHERE id = $1";
        pg_query_params($this->db_connection, $query, [$noteId]);
    }

}