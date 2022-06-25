<?php

class ControllerArticle
{
    private $modele;

    public function __construct()
    {
        $this->modele = new Modele();
    }

    function addArticle($data){
        $this->modele->addArticle($data);
        header("Location: .");
    }

    function listeArt(){
        return $this->modele->listeArt();
    }

    function getArticle($id){
        return $this->modele->getArticle($id);
    }

    function getComment($id){
        return $this->modele->getComment($id);
    }

    function newComment($commentaire){
        $idArt = $this->modele->newComment($commentaire);
        return $idArt;
    }
}
