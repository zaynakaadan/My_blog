<?php

namespace App\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\models\User;

class BlogController extends Controller {
    public function home()
    {
        return $this->view('blog.home');
    }
    public function posts()
    {
        $post = new Post($this->getDB());
        //$posts = $post->all();
        $posts = $post->allJoinUser();
        
        return $this->view('blog.posts', compact('posts'));
    }

    public function showPost(int $id)
    {     
        $post = (new Post($this->getDB()))->findById($id);
        $user = (new User($this->getDB()))->getById($post->user_id);
        $comment = new Comment($this->getDB());
        $comments = $comment->getAllCommentsForPost($id);

        $request = new \App\Request();
        $session = new \App\Session();
        $params = $request->getParams();        
                

        if(null !==($session->get('user_id')))
            $user_id = $session->get('user_id');
        else
            $user_id = null;
       
        return $this->view('blog.show_post', array('post' => $post, 'comments' => $comments,'user' => $user, 'user_id' => $user_id ));
    }

    public function tag(int $id) 
    {
        $tag = (new Tag($this->getDB()))->findById($id);

        return $this->view('blog.tag', compact('tag'));
    }


    

}