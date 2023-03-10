<?php

namespace App\Controllers;

use App\Models\Tag;
use App\Models\Post;

class BlogController extends Controller {
    public function welcome()
    {
        return $this->view('blog.welcome');
    }
    public function index()
    {
        $post = new Post($this->getDB());
        $posts = $post->all();
        
        return $this->view('blog.index', compact('posts'));
    }

    public function show(int $id)
    {       
        $post = (new Post($this->getDB()))->findById($id);
          
        return $this->view('blog.show', compact('post'));
    }

    public function tag(int $id) 
    {
        $tag = (new Tag($this->getDB()))->findById($id);

        return $this->view('blog.tag', compact('tag'));
    }


}