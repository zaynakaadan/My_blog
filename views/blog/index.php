<h1>Les derniers articles</h1>

<?php foreach($params['posts'] as $post): ?>
    <div class="card mb-3">
       <div class="card-body">
         <h2><?= $post->name ?></h2>
         <small>Publié le <?= $post->getCreateTime()?></small>
         <p><?= $post->getExcerpt() ?></p>
         <?= $post->getButton() ?>
       </div>
    </div>
<?php endforeach ?>