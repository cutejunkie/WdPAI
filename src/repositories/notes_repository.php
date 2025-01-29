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
}

/* najpier notes potem to*/