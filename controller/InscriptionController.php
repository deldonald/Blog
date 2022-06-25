<?php

include 'modele/Modele.php';

class InscriptionController
{
    private $modele;

    public function __construct()
    {
        $this->modele = new Modele();
    }

    function inscription($data){
        $this->modele->inscrire($data);
        //redirection pour éviter le double soumission du formulaire
        header("Location: .");
    }

    function connection($data){
        $this->modele->connect($data);
        //redirection pour éviter le double soumission du formulaire
        header("Location: .");
    }

     function getAuteur($id){
        return $this->modele->getAuteur($id);
    }
}
