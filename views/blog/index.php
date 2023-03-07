<h1>Les derniers articles</h1>

<?php foreach($params['posts'] as $post): ?>
    <div class="card mb-3">
       <div class="card-body">
         <h2><?= $post->name ?></h2>
         <div>
          <?php foreach ($post->getTags() as $tag): ?> 
             <span class="badge bg-secondary "><a href="/tags/<?= $tag->id ?>" class="text-white"><?= $tag->name ?></a></span>
           <?php endforeach ?>  
         </div>
         <small class="text-info">Publié le <?= $post->getCreateTime() ?></small>
         <p><?= $post->getExcerpt() ?></p>
         <?= $post->getButton() ?>
       </div>
    </div>
<?php endforeach ?>