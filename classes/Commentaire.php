<?php

class Commentaire{
     private $id;
     private $pseudo;
     private $content;
     private $article;

     function __construct(array $data = null){
          foreach($data as $key => $valeur){
               $methodes =  "set".ucfirst($key);
               if( method_exists($this, $methodes) ){
                    $this->$methodes($valeur);
               }
          }

     }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getArticle()
    {
        return $this->article;
    }

    public function setArticle($article): void
    {
        $this->article = $article;
    }


}