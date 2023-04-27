<?php 

namespace App\Controllers;


use App\Models\Comment;
use App\Controllers\Controller;

class CommentController extends Controller {

  public function createcomment()
  {
    $request = new \App\Request();    
    $params = $request->getParams();
 
    
        
    $comment = new Comment($this->getDB());
    $result = $comment->create($params);
    
    if ($result) {
   return header("Location: " . $params ['REDIRECT_URL']);
  }
}
    
}





