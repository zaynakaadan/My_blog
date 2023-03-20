<?php

namespace App\Models;

class Comment extends Model
{
   protected $table = 'comments';

   public function getPosts()
   {
    return $this->query("
        SELECT p.* FROM posts p
        INNER JOIN post_comment pc ON pc.post_id = p.id
        WHERE pc.comment_id = ?
    ", [$this->id]);
   }
}