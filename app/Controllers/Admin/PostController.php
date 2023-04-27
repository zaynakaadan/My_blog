<?php

namespace App\Controllers\Admin;


use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Session;
use App\Controllers\Controller;

class PostController extends Controller  {
    public function admin_posts()
    {  
      $this->isAdmin();
      $posts = (new Post($this->getDB()))->allJoinUser();
      return $this->view('admin.post.admin_posts', compact('posts'));
    }

    public function create() 
    { 
      $this->isAdmin();
      $request = new \App\Request();    
      $session = new \App\Session();
      $params = $request->getParams();                       
      $user_id = $session->get('user_id');       
      $tags = (new Tag($this->getDB()))->all(); 
      return $this->view('admin.post.add_post', compact('user_id', 'tags'));
    }

    public function createPost()
    {            
        $this->isAdmin();
        $post = new Post($this->getDB());

        // $tags = array_pop($_POST); 
        $request = new \App\Request();    
        
      $params = $request->getParams();   
        $tags = $params['tags'];
        unset($params['tags']);
        // var_dump($params);       
       
        $result = $post->create($params, $tags);
        if ($result) {
          return   header('Location: /admin/posts');
            
        }
    }

    public function update(string $id)
    {     
        $this->isAdmin();  
        $id = intval($id); // Convert $id to an integer

        $post = new Post($this->getDB());

        $request = new \App\Request();    
        
      $params = $request->getParams();   
        $tags = $params['tags'];
        unset($params['tags']);
        $result = $post->update($id, $params, 
         $tags);
        if ($result) {
              return header('Location: /admin/posts');
            
        }
    }

    public function destroy(int $id) 
    {
        $this->isAdmin();
        $post = new Post($this->getDB());
        $result = $post->destroy($id);

        if ($result) {
            $comment = new Comment($this->getDB());
            $comments = $comment->getAllCommentsForPost($id);

            foreach($comments as $comment)
            {
                $comment->destroy($comment->id);
            }
            return header('Location: /admin/posts');
        }
    }

     public function edit(int $id) 
     {
        $this->isAdmin();
        $post = (new Post($this->getDB()))->findById($id);
        $tags = (new Tag($this->getDB()))->all();

        $request = new \App\Request();    
        $session = new \App\Session();
      $params = $request->getParams();           

        $user_id = $session->get('user_id');
        return $this->view('admin.post.add_post', compact('user_id','post','tags'));
     }

}