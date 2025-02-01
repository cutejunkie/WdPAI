<?php

class User
{
    private $id;
    private $user_role;
    private $user_name;
    private $email;
    private $passw;
    private $creation_date;

    public function __construct(
        string $email,
        string $passw,
        string $user_name,
    )
    {
        $this->email = $email;
        $this->passw = $passw;
        $this->user_name = $user_name;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function set_id(string $id): void
    {
    $this->id = $id;
    }

    public function get_email(): string
    {
        return $this->email;
    }

    public function set_email(string $email): void
    {
    $this->email = $email;
    }

    public function get_password(): string
    {
        return $this->passw;
    }

    public function set_password(string $password): void
    {
        $this->passw = $password;
    }

    public function get_name(): string
    {
        return $this->user_name;
    }

    public function set_name(string $name): void
    {
        $this->user_name = $name;
    }

    public function get_creation_date()
    {
        return $this->creation_date;
    }

    public function set_creation_date($creation_date): void
    {
        $this->creation_date = $creation_date;
    }

    public function get_role()
    {
        return $this->user_role;
    }

    public function set_role($role): void
    {
        $this->user_role = $role;
    }
}