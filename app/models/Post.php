<?php

class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $sql = "SELECT *,
            posts.id as postId,
            users.id as userId,
            posts.created_at as postDate,
            users.created_at as userData
            FROM posts
            INNER JOIN users
            ON posts.user_id = users.id
            ORDER BY posts.created_at DESC";
        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function addPost($data)
    {
        $sql = "INSERT INTO posts (title, user_id, body) VALUES (:title, :user_id, :body)";
        $this->db->query($sql);

        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPostById($id)
    {
        // $sql = "SELECT *,
        // posts.id as postId,
        // users.id as userId,
        // posts.created_at as postDate,
        // users.created_at as userData
        // FROM posts
        // INNER JOIN users
        // ON posts.user_id = users.id
        // WHERE posts.id = :id";

        $sql = "SELECT * FROM posts where id = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);

        // Return the row
        return $this->db->single();
    }
}
