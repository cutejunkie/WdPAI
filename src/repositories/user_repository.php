<?php

require_once __DIR__ . "/repository.php";

class UserRepository extends Repository {
    private $db_connection;

    function __construct() {
        parent::__construct();
        $this->db_connection = $this->database->connect();

        $stmt = "CREATE TABLE IF NOT EXISTS users (id SERIAL PRIMARY KEY, user_role VARCHAR(5) DEFAULT 'user' NOT NULL, user_name VARCHAR (16) NOT NULL, email VARCHAR(100) UNIQUE NOT NULL, passw VARCHAR(255) NOT NULL, creation_date DATE DEFAULT CURRENT_DATE NOT NULL);";
        pg_query($this->db_connection, $stmt);
    }

    function __destruct(){
        pg_close($this->db_connection);
    }


/* najpier to potem notes*/

    public function getUser(string $email): ?User {
        $query = "SELECT id, user_role, user_name, email, passw, creation_date FROM users WHERE email = $1";
        //var_dump($email);
        $result = pg_query_params($this->db_connection, $query, [$email]);

        if ($row = pg_fetch_assoc($result)) {
            $user = new User($row['email'], $row['passw'], $row['user_name']);
            $user->set_id($row['id']);
            $user->set_role($row['user_role']);
            $user->set_creation_date($row['creation_date']);
            return $user;
        }

        return null;
    }

    public function addUser(User $user): void {
        $query = "INSERT INTO users (user_name, email, passw) VALUES ($1, $2, $3)";
        pg_query_params($this->db_connection, $query, [
            $user->get_name(),
            $user->get_email(),
            $user->get_password()
        ]);
    }

}