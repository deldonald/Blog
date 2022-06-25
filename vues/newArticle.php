    <?php if(!isset($_SESSION['auteur'])) header("location: .") ?>
    <h2>New artcile</h2>
    <form action="index.php" method="post" class="w-50">
        <!-- id de l'auteur -->
        <input type="hidden" name="auteur" value="<?= unserialize($_SESSION['auteur'])->getId() ?>">
        <div class="form-group">
            <label for="">Titre</label>
            <input type="text" name="titre" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Contenu</label>
            <input type="text" name="contenu" class="form-control">
        </div>

        <input type="submit" class="btn-btn-primary" name="article">
    </form>
