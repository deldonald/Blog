<?php

require 'classes/Article.php';
require 'classes/Auteur.php';
require 'modele/ModeleGenerique.php';

class Modele extends ModeleGenerique
{
    function inscrire($data){
        $pdo = $this->bd();

        $sql = "INSERT INTO auteur VALUES(NULL, :prenom, :nom, :log, :password, now() )";
        $req = $pdo->prepare($sql);

        $req->execute(array(
            "prenom" => $this->validateFormData( $data->getPrenom(), 2, 15 ),
            "nom" => $this->validateFormData( $data->getNom(), 2, 15 ),
            "log" => $this->validateFormData( $data->getLogin(), 6, 12 ),
            "password" => password_hash($this->validateFormData($data->getMdp(), 6, 10), PASSWORD_DEFAULT) 
        ));
    }

    function connect($data){
        $sql = $this->bd()->prepare("SELECT * FROM auteur WHERE login = :log");

       $sql->execute(["log" => $data['login']]);
       
        if($sql->rowCount()){
            $result = $sql->fetch();
            if(password_verify($data['mdp'], $result['mdp'])){
                extract($result); 
                $auteur = new Auteur($id, $nom, $prenom, $login, $mdp, $statut, $date_inscription);
                $_SESSION['auteur'] = serialize($auteur);
            }
        }
    }

    // Récuperation d'un membre via son ID
    function getAuteur($id){
         $sql = $this->bd()->prepare("SELECT * FROM auteur WHERE id = :id ");

        $sql->execute(["id" => $id]);

        $res = $sql->fetch();
        $auteur = new Auteur($res['id'], $res['prenom'], $res['login'], $res['mdp'], $res['statut'], $res['date_inscription']);
        return $auteur;
    }

    function addArticle($data){
        $sql = $this->bd()->prepare(
            "INSERT INTO article VALUES (NULL, :titre, :content, now(), :auteur)");
        $sql->execute([
            "titre" => htmlentities( $data['titre'] ),
            "content" => htmlentities( $data['contenu'] ),
            "auteur" => htmlentities( $data['auteur'] )
        ]);
    }

    function listeArt(){
        $sql = $this->bd()->prepare("SELECT art.* FROM article art ");
        $sql->execute();

        $liste = [];
        while ($l = $sql->fetch()) {
            $liste[] = new Article($l['id'], $l['titre'],$l['contenu'], $l['date_creation'], $l['auteur'] );
        }

        return $liste;
    }

    function getArticle($id){
        $sql = "SELECT * FROM article WHERE id = ?";
        $result = $this->bd()->prepare($sql);
        $result->execute( [$id] );
        $article = $result->fetch();
        return new Article($article['id'], $article['titre'], $article['contenu'], $article['date_creation'], $article['auteur']);
    }

    function getComment($id){
        $sql = "SELECT * FROM commentaire WHERE article = ?";
        $result = $this->bd()->prepare($sql);
        $result->execute( [$id] );

        $tabComm = [];

        while($c = $result->fetch()){
           $tabComm[] = new Commentaire($c);
        }
        return $tabComm;
    }

    function newComment($comm){
        $req = $this->bd()->prepare("INSERT INTO commentaire (pseudo, content, article) VALUES(?, ?, ?)");
        $response = $req->execute(array($comm->getPseudo(), $comm->getContent(), $comm->getArticle()));

        $recupArt = $this->getArticle($comm->getArticle());
        return $recupArt;
    }

    
}

