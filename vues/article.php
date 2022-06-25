<h2 class="text-primary">
<i class="fas fa-file-alt"></i> Article
</h2>

<h3> <?= $article->getTitre(); ?> </h3>
<p> <?= $article->getContenu(); ?> </p>
<p class="mb-5"> 
     Rédigé par 
     <?= $controllerIns->getAuteur($article->getAuteur())->getPrenom(); ?> 
     <?= $article->getDateCreation(); ?> 
</p>
<?php if(!empty($comments)): ?>
     <hr id="ancreComment">
     <?php foreach($comments as $cle => $val): ?>
          <div class="my-3">
               <i class="fas fa-comment"></i>
               Rédigé par <?= $val->getPseudo(); ?>
               <p><?= $val->getContent() ?></p>
          </div>
     <?php endforeach; ?>
     <hr>
<?php endif; ?>
<div class="d-flex justify-content-center mt-5">
     <form action="" method="post" class="w-25">
          <input type="hidden" name="article" value="<?= $_GET['id'] ?>">
          <fieldset>
               <legend><i class="far fa-comment"></i> Nouveau commentaire</legend>
               <div class="form-group">
               <label for="">Pseudo</label>
               <input type="text" name="pseudo" class="form-control">
          </div>
          <div class="form-group">
               <label for="">Commentaire</label>
               <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-outline-success">Commenter</button>
          </fieldset>
     </form>
</div>