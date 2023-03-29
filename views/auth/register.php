

<h1>S'inscrire</h1>
<form action="/register" method="POST">
    <input type="hidden" value="0" name="is_admin" />
   <div class="form-group mt-3">
       <label class="mb-1" for="gender">Genre</label><br/>
       <select name="gender" id="gender">
            <option value="femme">Femme</option>
            <option value="homme">Homme</option>
       </select>
    </div>
    <div class="form-group mt-3">
       <label class="mb-1" for="last_name">Nom d'utilisateur</label>
        <input type="text" class="form-control" name="last_name" id="last_name" >
    </div>
    <div class="form-group mt-3">
       <label class="mb-1" for="first_name">Prénom d'utilisateur</label>
        <input type="text" class="form-control" name="first_name" id="first_name" >
    </div>
    <div class="form-group mt-3">
       <label class="mb-1" for="email">Adresse mail</label>
        <input type="text" class="form-control" name="email" id="email" >
    </div>
    <div class="form-group mt-3">
       <label class="mb-1" for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" >   
    </div>
    <div class="form-group mt-3">
       <label class="mb-1" for="password_confirm">Confirmer le mot de passe</label>
        <input type="password" class="form-control" name="password_confirm" id="password_confirm" >   
    </div>
    <button type="submit" class="btn btn-primary mb-3 mt-3">S'inscrire</button>
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