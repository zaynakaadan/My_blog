<h1>Les derniers posts</h1>

<?php foreach($params['posts'] as $post): ?>
  <div class="card mb-3">
    <div class="card-body">
      <h2><?= $post->title ?></h2>
      <p>Auteur: <?= $post->last_name ?> <?= $post->first_name ?></p>
      
      <div>
        <?php foreach ($post->getTags() as $tag): ?> 
          <span class="badge bg-secondary "><a href="/tags/<?= $tag->id ?>" class="text-white">
          <?= $tag->title ?></a></span>
        <?php endforeach ?>  
      </div>

      <small class="text-info">Publié le <?= $post->getCreateTime() ?></small>      
      <p><?= $post->getExcerpt() ?></p>
      <?= $post->getButton() ?>
    </div>
  </div> 
<?php endforeach ?>


