<h1><?= $params['post']->name ?></h1>
<div>
          <?php foreach ($params['post']->getTags() as $tag): ?> 
             <span class="badge bg-secondary "><?= $tag->name ?></span>
           <?php endforeach ?>  
         </div>
<p><?= $params['post']->content ?></p>
<a href="/posts" class="btn btn-secondary">Retourner en arrière</a>