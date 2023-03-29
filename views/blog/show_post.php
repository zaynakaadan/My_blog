<h1><?= $params['post']->name ?></h1>

<div>
    <?php foreach ($params['post']->getTags() as $tag): ?> 
        <span class="badge bg-secondary "><?= $tag->name ?></span>
    <?php endforeach ?>  
</div>

<small class="text-info">Publié le <?= $params['post']->getCreateTime() ?></small>
<p><?= $params['post']->getExcerpt() ?></p>


<h2>Les commentaires</h2>
<?php foreach ($params['comments'] as $comment): ?>
  <div class="card mb-3">
    <div class="card-body">
      <h2><?= $comment->comment ?></h2>
      <small class="text-info">Publié le <?= $comment->getCreateTime() ?></small>
    </div>
  </div> 
<?php endforeach ?>

<div class="row">
  
  <div class="col">  
    <form class="form-horizontal" action="" method="POST">
      <input type="hidden" name="post_id" value="<?=$params['post']->id ?>">
      <div class="form-group">
        <label class="col-lg-3 pb-3 control-label">Ajouter Comment</label>
        <div class="col-lg-9 pb-3">
          <textarea class="form-control " rows="5" cols="10" name="comment" placeholder="Comment"></textarea>
        </div>
      </div>
      <input type="submit" name="" value="Comment" class="mb-3 btn btn-primary">     
    </form>
  </div>
</div>
  
<a href="/posts" class="btn btn-secondary">Retourner en arrière</a>
