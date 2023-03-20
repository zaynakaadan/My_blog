<h1><?= $params['post']->name ?? 'Créer un nouvel article'?></h1>

<form action="<?= isset($params['post']) ? "/admin/posts/edit/{$params['post']->id}" : "/admin/posts/create" ?>" 
method="POST">
   <div class="form-group mt-3">
       <label class="mb-1" for="name">Titre de l'article</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $params['post']
        ->name ?? '' ?>">
    </div>
    <div class="form-group mt-3">
        <label class="mb-1" for="content">Contenu de l'article</label>
        <textarea name="content" id="content"  rows="8" class="form-control">
            <?= $params['post']->content ?? '' ?>
        </textarea>
    </div>
    <div class="form-group mt-3">
    <label for="tags">Tags de l'article</label>
    <select multiple class="form-control" id="tags" name="tags[]">
      <?php foreach($params['tags'] as $tag) : ?>
        <option value="<?= $tag->id ?>"
         <?php if(isset($params['post'])): ?>
         <?php foreach($params['post']->getTags() as $postTag){
            echo ($tag->id === $postTag->id) ? 'selected' : '';
        }
        ?>        
        <?php endif ?>><?= $tag->name ?></option>
      <?php endforeach ?>  
    </select>
  </div>
    <button type="submit" class="btn btn-primary mt-3"><?= isset($params['post']) ? 'Enregistrer les modifications'
     : 'Enregistrer mon article' ?></button>
</form>