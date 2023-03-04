<?php

namespace App\Controllers;

class BlogController extends Controller {
    public function welcome()
    {
        return $this->view('blog.welcome');
    }
    public function index()
    {
        $stmt = $this->db->getPDO()->query('SELECT * FROM posts ORDER BY create_time DESC');
        $posts = $stmt->fetchAll();

        return $this->view('blog.index', compact('posts'));
    }
    public function show(int $id)
    {
        $stmt = $this->db->getPDO()->prepare('SELECT * FROM posts WHERE id = ?');
        $stmt->execute([$id]);
        $post = $stmt->fetch();
        /*$req = $this->db->getPDO()->query('SELECT * FROM posts');
        $posts = $req->fetchAll();
        foreach ($posts as $post) {
            echo $post->content;
        }*/
        return $this->view('blog.show', compact('post'));

    }
}