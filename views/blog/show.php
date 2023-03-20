<h1><?= $params['post']->name ?></h1>
<div>
          <?php foreach ($params['post']->getTags() as $tag): ?> 
             <span class="badge bg-secondary "><?= $tag->name ?></span>
           <?php endforeach ?>  
         </div>
<p><?= $params['post']->content ?></p>

<div class="row">
  <div class="col">  
    <form class="form-horizontal" action="CommentController" method="POST">

      <div class="form-group">
        <label class="col-lg-3 pb-3 control-label">Ajouter Comment</label>
        <div class="col-lg-9 pb-3">
          <textarea class="form-control " rows="5" cols="10" name="comment" placeholder="Comment"></textarea>
        </div>
      </div>
      <input type="submit" name="postcomment" value="Comment" class="mb-3 btn btn-primary">     
    </form>
  </div>
  </div>
<a href="/posts" class="btn btn-secondary">Retourner en arrière</a>
