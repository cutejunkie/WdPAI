<?php

class Database{
    private $username;
    private $password;
    private $host;
    private $database;
    private $db_connection;

    public function __construct()
    {
        $this->username = "gaba";
        $this->password = "haslo";
        $this->host = "localhost";
        $this->database = "bazadanych";
    }

    public function connect()
    {
        $db_connection = pg_connect("host=$this->host dbname=$this->database user=$this->username password=$this->password port=5432", PGSQL_CONNECT_FORCE_NEW);
        return $db_connection;
    }

}