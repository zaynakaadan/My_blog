<h1>Modifier <?= $params['post']->name  ?></h1>

<form action="/admin/posts/edit/<?= $params['post']->id ?>" method="POST">
   <div class="form-group mt-3">
       <label class="mb-1" for="name">Titre de l'article</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $params['post']
        ->name ?>">
    </div>
    <div class="form-group mt-3">
        <label class="mb-1" for="content">Contenu de l'article</label>
        <textarea name="content" id="content"  rows="8" class="form-control">
            <?= $params['post']->content ?? '' ?>
        </textarea>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Enregistrer les modifications</button>
</form>