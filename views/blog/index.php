<h1>Les derniers articles</h1>

<?php foreach($params['posts'] as $post): ?>
    <div class="card mb-3">
       <div class="card-body">
         <h2><?= $post->name ?></h2>
         <small><?= $post->create_time ?></small>
         <p><?= $post->content ?></p>
         <a href="/posts/<?= $post->id ?>" class="btn btn-primary">Lire_plus</a>
       </div>
    </div>
<?php endforeach ?>