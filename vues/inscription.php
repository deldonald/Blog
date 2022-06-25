
    <h2>Inscription</h2>
    <form action="index.php" method="post" class="w-50">
        <div class="form-group">
            <label for="">Prénom</label>
            <input type="text" name="prenom" class="form-control" required minlength="2" maxlength="15">
        </div>
        <div class="form-group">
            <label for="">Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Login</label>
            <input type="text" name="login" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="">Mot de passe</label>
            <input type="password" name="mdp" class="form-control" required>
        </div>
        <input type="submit" class="btn-btn-primary" name="inscription">
    </form>