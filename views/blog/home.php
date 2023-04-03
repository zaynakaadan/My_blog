<div class="row py-5 d-flex align-items-center">
   <div class="col-md-3 text-center">
      <img src="../public/img/myAvatar.png" class="rounded-circle" alt="Avatar">
   </div>
   <div class="col-md-9 text-center">
      <h2>zayna kaadan<br> étudiante développeur PHP / Symfony chez OpenClassrooms</h2>
   </div>
</div>
<h1> Homepage </h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur voluptatum deleniti aliquam, quasi repellendus quaerat neque delectus atque, expedita doloremque tempora ut asperiores architecto nemo provident nesciunt sint debitis. Incidunt mollitia porro magni a quod totam ad iste molestiae architecto tempora iusto delectus vero quidem vel modi minus laboriosam, adipisci officiis hic quibusdam. Ipsa, ex? Esse, veniam, excepturi numquam quos aliquam incidunt tempora accusantium alias dicta ducimus sapiente nam, unde rerum architecto velit animi possimus voluptatem ipsa. Expedita repellat magnam atque ducimus quam corrupti, architecto impedit? Asperiores, voluptatem nesciunt perspiciatis optio animi tempore modi praesentium laboriosam iusto at facere illum commodi maxime pariatur? Atque ipsum tenetur iusto officiis voluptates, eius praesentium magnam. Quos rerum, eius distinctio soluta ad a amet? Deleniti tempore ullam iusto vero accusantium veritatis quo fuga quidem. Hic voluptates in nemo culpa? Dolor nemo odio illum, repellat recusandae modi dignissimos at. Consequatur harum natus cumque, esse veritatis fugit vitae in deleniti nam sunt, ipsam mollitia iste sed quia id. Molestias excepturi accusantium porro quae magni necessitatibus cupiditate omnis ducimus hic vitae maiores vero magnam, facere odit sunt unde? Quam fugiat consectetur dolorem veniam libero tempore veritatis mollitia non? Fugiat eum voluptates facilis maiores nesciunt nulla cum ad placeat rem, explicabo libero labore molestiae distinctio consequuntur minima a aspernatur voluptatem quae fugit quidem officia autem vitae quisquam? Incidunt excepturi qui dolore at soluta aliquam veniam odit, facere impedit, eligendi inventore itaque, neque alias suscipit fugit velit architecto esse asperiores. Tempora libero excepturi corporis cupiditate, laborum labore beatae. Obcaecati?</p>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur voluptatum deleniti aliquam, quasi repellendus quaerat neque delectus atque, expedita doloremque tempora ut asperiores architecto nemo provident nesciunt sint debitis. Incidunt mollitia porro magni a quod totam ad iste molestiae architecto tempora iusto delectus vero quidem vel modi minus laboriosam, adipisci officiis hic quibusdam. Ipsa, ex? Esse, veniam, excepturi numquam quos aliquam incidunt tempora accusantium alias dicta ducimus sapiente nam, unde rerum architecto velit animi possimus voluptatem ipsa. Expedita repellat magnam atque ducimus quam corrupti, architecto impedit? Asperiores, voluptatem nesciunt perspiciatis optio animi tempore modi praesentium laboriosam iusto at facere illum commodi maxime pariatur? Atque ipsum tenetur iusto officiis voluptates, eius praesentium magnam. Quos rerum, eius distinctio soluta ad a amet? Deleniti tempore ullam iusto vero accusantium veritatis quo fuga quidem. Hic voluptates in nemo culpa? Dolor nemo odio illum, repellat recusandae modi dignissimos at. Consequatur harum natus cumque, esse veritatis fugit vitae in deleniti nam sunt, ipsam mollitia iste sed quia id. Molestias excepturi accusantium porro quae magni necessitatibus cupiditate omnis ducimus hic vitae maiores vero magnam, facere odit sunt unde? Quam fugiat consectetur dolorem veniam libero tempore veritatis mollitia non? Fugiat eum voluptates facilis maiores nesciunt nulla cum ad placeat rem, explicabo libero labore molestiae distinctio consequuntur minima a aspernatur voluptatem quae fugit quidem officia autem vitae quisquam? Incidunt excepturi qui dolore at soluta aliquam veniam odit, facere impedit, eligendi inventore itaque, neque alias suscipit fugit velit architecto esse asperiores. Tempora libero excepturi corporis cupiditate, laborum labore beatae. Obcaecati?</p>
<hr >
<section>
<?php if(isset($_GET['success'])): ?>
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
       <label class="mb-1" for="sujet">Sujet</label>
        <input type="text" class="form-control" name="sujet" id="sujet" >
    </div>
	<div class="form-group mt-3">
       <label class="mb-1" for="message">Votre message :</label>		
		<p><textarea id="message" name="message" rows="8"></textarea></p>

 
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
</section>