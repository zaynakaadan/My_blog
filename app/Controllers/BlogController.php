<?php

namespace App\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;


class BlogController extends Controller {
    public function home()
    {
        return $this->view('blog.home');
    }
    public function posts()
    {
        $post = new Post($this->getDB());
        $posts = $post->all();
        
        return $this->view('blog.posts', compact('posts'));
    }

    public function showPost(int $id)
    {       
        $post = (new Post($this->getDB()))->findById($id);
        $comment = new Comment($this->getDB());
        $comments = $comment->getAllCommentsForPost($id);
       
       return $this->view('blog.show_post', array('post' => $post, 'comments' => $comments));
    }

    public function tag(int $id) 
    {
        $tag = (new Tag($this->getDB()))->findById($id);

        return $this->view('blog.tag', compact('tag'));
    }


    

}