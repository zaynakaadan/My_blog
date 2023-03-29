<?php if(isset($_GET['su'])): ?>
    <div class="alert alert-success mt-3">Votre message a bien été envoyé!</div>
<?php endif ?>
<h1>Me Contacter</h1>
<form action="/contact" method="POST">
<div class="form-group mt-3">
       <label class="mb-1" for="last_name">Nom</label>
        <input type="text" class="form-control" name="last_name" id="last_name" >
    </div>
    <div class="form-group mt-3">
       <label class="mb-1" for="first_name">Prénom</label>
        <input type="text" class="form-control" name="first_name" id="first_name" >
    </div>
    <div class="form-group mt-3">
       <label class="mb-1" for="email">Adresse mail</label>
        <input type="text" class="form-control" name="email" id="email" >
    </div>
 
	<div class="form-group mt-3">
       <label class="mb-1" for="">Votre message :</label>
		
		<p><label for="message"></label><textarea id="message" name="message" cols="30" rows="8"></textarea></p>
	
 
	<div style="text-align:left;"><input type="submit"  value="Envoyer" /></div>
</div>

<?php if (isset($_SESSION['errors'])): ?>
<?php foreach($_SESSION['errors'] as $errorsArray): ?>
    <?php foreach($errorsArray as $errors): ?>
        <div class="alert alert-danger mt-3">
            <?php foreach($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </div>
    <?php endforeach ?>
<?php endforeach ?>

<?php endif ?>

<?php session_destroy(); ?>