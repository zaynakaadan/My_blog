<?php 

namespace App\Controllers;


use App\Models\Comment;
use App\Controllers\Controller;

class CommentController extends Controller {

    public function createcomment()
  {
    $comment = new Comment($this->getDB());
    $result = $comment->create($_POST);
    
    if ($result) {
   return header("Location: " . $_SERVER ['REDIRECT_URL']);
  }
  }

  
  

    
}





