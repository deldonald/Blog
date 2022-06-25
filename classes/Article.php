<?php


class Article
{
    private $id;
    private $titre;
    private $contenu;
    private $date_creation;
    private $auteur;

    public function __construct( $id, $titre, $contenu, $date_creation, $auteur )
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->date_creation = $date_creation;
        $this->auteur = $auteur;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId( $id )
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre( $titre )
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu( $contenu )
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * @param mixed $date_creation
     */
    public function setDateCreation( $date_creation )
    {
        $this->date_creation = $date_creation;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     */
    public function setAuteur( $auteur )
    {
        $this->auteur = $auteur;
    }


}