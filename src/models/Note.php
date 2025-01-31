<?php

class Note
{
    private $gifted_name;
    private $date_of_birth;
    private $ideas;
    private $id;

    public function __construct(
        string $gifted_name,
        string $date_of_birth,
        string $ideas,
    )
    {
        $this->gifted_name = $gifted_name;
        $this->date_of_birth = $date_of_birth;
        $this->ideas = $ideas;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function set_id(string $id): void
    {
    $this->id = $id;
    }

    public function get_gifted_name(): string
    {
        return $this->gifted_name;
    }

    public function set_gifted_name($gifted_name): void
    {
        $this->gifted_name = $gifted_name;
    }

    public function get_date_of_birth(): string
    {
        return $this->date_of_birth;
    }

    public function set_date_of_birth(string $date_of_birth): void
    {
    $this->email = $date_of_birth;
    }

    public function get_ideas(): string
    {
        return $this->ideas;
    }

    public function set_ideas(string $ideas): void
    {
        $this->ideas = $ideas;
    }

}