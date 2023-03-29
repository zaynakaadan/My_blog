<?php

namespace App\Models;

use DateTime;

class Comment extends Model
{
   protected $table = 'comments';

   public function getAllCommentsForPost(int $id): array
   {
      return $this->query("SELECT * FROM ($this->table) WHERE post_id = ? ORDER BY create_time DESC", [$id]);
}

   public function getCreateTime(): string
   {
     return  (new DateTime($this->create_time))->format('d/m/Y à H:i');      
   }

   
}