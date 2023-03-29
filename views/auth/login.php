

<h1>Se connecter</h1>
<form action="/login" method="POST">
   <div class="form-group mt-3">
       <label class="mb-1" for="email">Adresse email</label>
        <input type="text" class="form-control" name="email" id="email" >
    </div>
    <div class="form-group mt-3">
       <label class="mb-1" for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" >   
  </div>
    <button type="submit" class="btn btn-primary mb-3 mt-3">Se connecter</button>
</form>

<?php if (isset($_SESSION['errors'])): ?>
<?php foreach($_SESSION['errors'] as $errorsArray): ?>
    <?php foreach($errorsArray as $errors): ?>
        <div class="alert alert-danger">
            <?php foreach($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </div>
    <?php endforeach ?>
<?php endforeach ?>

<?php endif ?>

<?php session_destroy(); ?>