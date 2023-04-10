<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Mon blog</title>
      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
      
      <link rel="stylesheet" href="<?= SCRIPTS . 'css' . DIRECTORY_SEPARATOR . 'style.css' ?>">
   </head>
   <body>  
      <nav class="navbar navbar-expand-sm navbar-black bg-light">
         <div class="container-fluid">
            <a class="navbar-brand" href="javascript:void(0)">BLOG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
               <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="/">Accueil</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" href="/posts">Les posts</a>
                  </li>                 
               </ul>
               <div class="d-flex">
                  <ul class="navbar-nav me-auto">
                     <?php if (isset($_SESSION['auth']) && isset($_SESSION['is_admin'])): ?>
                     <?php
                        $auth = htmlspecialchars($_SESSION['auth']);
                        $is_admin = htmlspecialchars($_SESSION['is_admin']);
                     ?>
                        <?php if ($is_admin == 1): ?>
                           <li class="nav-item btn btn-outline-success me-2 py-0 li_f">
                              <a class="nav-link" href="/admin/posts">Administration</a>
                           </li>
                        <?php endif ?>
                        <li class="nav-item btn btn-outline-danger py-0">
                           <a class="nav-link" href="/logout">Se déconnecter (<?=$_SESSION['auth']?>)</a>
                        </li>
                     <?php else:?>
                        <li class="nav-item btn btn-warning me-2 py-0 li_f">
                           <a class="nav-link" href="/register">S'inscrire</a>
                        </li>
                        <li class="nav-item btn btn-warning py-0">
                           <a class="nav-link" href="/login">Se connecter</a>
                        </li>
                     <?php endif ?>
                  </ul>
               </div>
            </div>
         </div>
      </nav> 

      <div class="container" style="padding-bottom: 168px;">
         <?= $content ?>
      </div>
         
      
      <footer class="bg-light mb-8  text-black-50">
         <div class="container p-4 text-md-center">
            <div class="row">
               <div class="col">
                  <a href="public/pdf/zaynakaadancv.pdf">Télécharger mon CV</a>
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
         </div>
      </footer>
   </body>
</html>