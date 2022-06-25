<?php

class Auteur{

    //attributs
    private $id;
    private $nom;
    private $prenom;
    private $login;
    private $mdp;
    private $date_inscription;
    private $statut;


    public function __construct($id, $nom, $prenom, $login, $mdp, $statut, $date_inscription= null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->statut = $statut;
        $this->date_inscription = $date_inscription;
    }


    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom( $nom )
    {
        $this->nom = $nom;
    }
    public function setStatut( $statut )
    {
        $this->statut = $statut;
    }
    public function getStatut()
    {
        return $this->statut;
    }
    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom( $prenom )
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin( $login )
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * @param mixed $mdp
     */
    public function setMdp( $mdp )
    {
        $this->mdp = $mdp;
    }

    /**
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->date_inscription;
    }

    /**
     * @param mixed $date_inscription
     */
    public function setDateInscription( $date_inscription )
    {
        $this->date_inscription = $date_inscription;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }





}

