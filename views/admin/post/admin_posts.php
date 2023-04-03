<h1>Administration des posts</h1>

<?php if(isset($_GET['success'])): ?>
    <div class="alert alert-success">Vous êtes connecté!</div>
<?php endif ?>

<a href="/admin/posts/create" class="btn btn-success my-3">Créer un nouveau post</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Publié le</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($params['posts'] as $post): ?>
        <tr>
           <th scope="row"><?= $post->id ?></th>
           <td><?= $post->title ?></td>
           <td><?= $post->getCreateTime() ?></td>
           <td>
            <a href="/admin/posts/edit/<?= $post->id ?>" class="btn btn-warning li_f">Modifier</a>
            <form action="/admin/posts/delete/<?= $post->id ?>" method="POST" class="d-inline">
              <button type="submit" class="btn btn-danger li_f">Supprimer</button>
              </form>
           </td>
        </tr>
    <?php endforeach ?>
  </tbody>
</table>