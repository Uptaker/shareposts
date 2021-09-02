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
}
