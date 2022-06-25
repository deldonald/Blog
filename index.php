<?php
require "inc/fonctions.php";

$controllerIns = new InscriptionController();
$controllerArt = new ControllerArticle();

$listeArticle = $controllerArt->listeArt();

if(isset($_GET['action'])){
    $action = $_GET['action'];

    if($action == 'inscription')
        render("inscription");
    elseif ($action == 'connection')
        render("connection");
    elseif ($action == 'deconnection'){
        session_destroy();
        header("Location: .");
    }elseif ($action == 'newArticle'){
        render("newArticle");
    }elseif ($action == 'article' && ctype_digit($_GET['id'])){
        $article = $controllerArt->getArticle($_GET['id']);
        $comments = $controllerArt->getComment($_GET['id']);
        render("article", array(
            "article" => $article, 
            "controllerIns" => $controllerIns, 
            "comments" => $comments));
    }
    else
        render("accueil", ["listeArticle" => $listeArticle, "controllerIns" => $controllerIns]);
}else{
    render(
        "accueil", 
        ["listeArticle"  => $listeArticle, 
         "controllerIns" => $controllerIns
        ]
    );
}

if (isset($_POST['inscription'])){
    extract($_POST);
   
    $auteur = new Auteur($nom, $prenom, $login, $mdp);

    $controllerIns->inscription($auteur);
}
if (isset($_POST['connection'])){
    $controllerIns->connection($_POST);
}
if(isset($_POST['article']) && isset($_POST['titre'])){
    $controllerArt->addArticle($_POST);
}

if(isset($_POST['pseudo']) && isset($_POST['content'])){
    $com = new Commentaire($_POST);
    $idArt = $controllerArt->newComment($com);
    header("Location:index.php?action=article&id=".$idArt->getid()."&#ancreComment");
}



