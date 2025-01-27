<?php

class UserRepository {
    private $db_connection;

    function __construct() {
        $this->db_connection = pg_connect("host=localhost dbname=bazadanych user=gaba password=haslo port=5432");
        $stmt = 'CREATE TABLE IF NOT EXISTS users (id SERIAL PRIMARY KEY, imie VARCHAR (16) NOT NULL, email VARCHAR(100) NOT NULL, haslo VARCHAR(255) NOT NULL, data_zal_konta DATE NOT NULL DEFAULT CURRENT_DATE);';
        pg_query($this->db_connection, $stmt);
    }

    function __destruct(){
        pg_close($this->db_connection);
    }
}