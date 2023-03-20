<?php 

namespace App\Controllers;

use App\Controllers\Controller;

class CommentController extends Controller {

    public function createcomment()
  {
    $stmt = $this->db->getPDO()->prepare("INSERT INTO comments (user_id, post_id, username, comment) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['user_id'], $_POST['post_id'], $_POST['username'], $_POST['comment']]);
  }

  public function getCommentsByPostId($postId)
  {
      $stmt = $this->db->getPDO()->prepare("SELECT * FROM comments WHERE post_id = ?");
      $stmt->execute([$postId]);
      return $stmt->fetchAll();
  }
  

    
}





