<?php 

namespace App\Controllers;


use App\Models\Comment;
use App\Controllers\Controller;

class CommentController extends Controller {

  public function createcomment()
  {
    foreach($_POST as $k => $p)
    {
        //$_POST[$k] = htmlspecialchars($_POST[$k]);
        $_POST[$k] = strip_tags($_POST[$k]);            
    }
        
    $comment = new Comment($this->getDB());
    $result = $comment->create($_POST);
    
    if ($result) {
   return header("Location: " . $_SERVER ['REDIRECT_URL']);
  }
}

  
  

    
}





