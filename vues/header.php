<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Document</title>
</head>
<body>

<header class="bg-dark p-5 container-fluid">
    <div class="text-center">
        <a href="./" class="text-center">
        <h1>
            <i class="fas fa-microphone"></i>
            Encore un blog ?!# Nonmais Allo
        </h1>
        </a>
    </div>
    <div class="text-right">
        <?php if(isset($_SESSION['auteur'])): ?>
            <!-- if admin -->
            <?= unserialize($_SESSION['auteur'])->getStatut() == "admin" ? '<a href=""><i class="fas fa-cogs"></i> Administration</a>' : "" ?>
            <a class="btn btn-success" href="index.php?action=newArticle">New article</a>
            <a class="btn btn-danger" href="index.php?action=deconnection">Se déconnecter</a>
        <?php else: ?>
            <a class="btn btn-success" href="index.php?action=inscription">S'inscrire</a>
            <a class="btn btn-success" href="index.php?action=connection">Se connecter</a>
        <?php endif; ?>
    </div>
</header>
<main class="container-fluid">
<?php if( isset($_SESSION['msg']) ): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['msg'] ?>
    </div>
<?php endif; ?>