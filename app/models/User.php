<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Find user by email
    public function findUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $this->db->query($sql);

        // Bind value
        $this->db->bind(':email', $email);

        // Return single row
        $this->db->single();

        // Check row;
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Register user
    public function register($data)
    {
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $this->db->query($sql);

        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
