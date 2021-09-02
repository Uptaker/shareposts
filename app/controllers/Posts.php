<?php

class Posts extends Controller
{

    public function __construct()
    {
        // Check if user is logged in before accessing anything
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->postModel = $this->model('Post');
    }
    public function index()
    {

        // Get Posts

        $posts = $this->postModel->getPosts();
        $data = [
            'posts' => $posts
        ];
        $this->view('posts/index', $data);
    }
}
