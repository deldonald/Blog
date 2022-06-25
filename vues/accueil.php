
        <h2 class="text-primary">
            <i class="fas fa-home"></i> Accueil
        </h2>
        <?php if(isset($listeArticle)): ?>
        <ul class="list-group">
            <?php foreach($listeArticle as $key => $value) : ?>
                <li class="list-group-item">
                    <a href="index.php?action=article&id=<?= intval($value->getid()) ?>">
                        <i class="far fa-hand-point-right"></i>
                        <?= htmlentities($value->getTitre()) ?>
                    </a>
                </li>
                <li class="list-group-item">
                    <?= htmlentities(substr($value->getContenu(), 0, 20)) ?> [...]
                </li>
                <li class="list-group-item">
                    Rédigé par
                    <strong>
                        <?= htmlentities($controllerIns->getAuteur($value->getAuteur())->getPrenom() ." le " . $value->getDateCreation()) ?>
                    </strong>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>