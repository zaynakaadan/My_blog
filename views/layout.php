<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Mon blog</title>
      <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'app.css' ?>">
   </head>
   <body>   
      <div class="container-fluid ">      
         <nav class="navbar navbar-expand-lg navbar-light bg-light" >
            <a class="navbar-brand" href="/">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="/">Accueil</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/posts">Les derniers articles</a>
                  </li>
               </ul>
               <ul class="navbar-nav mr-auto">
                  <?php if (isset($_SESSION['auth'])): ?>
                     <li class="nav-item">
                     <a class="nav-link" href="/logout">Se déconnecter</a>
                  </li>
                  <?php endif ?>
               </ul>
            </div>
          </div>
         </nav>
         <div class="container">
            <?= $content ?>
         </div>
      <footer class="bg-light mb-8  text-black-50">
   <div class="container p-4 text-md-center">
   <div class="row">
      <div class="col">
         <a href="kaadan_zayna_cv.pdf">Télécharger mon CV</a>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <a href="http://twitter.com/zaynakaadan">Twitter</a>
      </div>
   </div>
   <div class="row">
      <div class="col">
         <a href="http://github.com/zaynakaadan">GitHub</a>
      </div>
   </div>
   <div class="row">
      <div class="col  pt-2">
         <p>Copyright 2023 - kaadan zayna </p>
      </div>
   </div>
</footer>
   </body>
</html>