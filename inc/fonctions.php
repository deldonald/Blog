<?php

session_start();

include "classes/Commentaire.php";
include 'controller/InscriptionController.php';
include 'controller/ControllerArticle.php';

function render($page, $data = null){
     //Production de varaibles
     !empty($data) ? extract($data) : '';

     include 'vues/header.php';

     require "vues/".$page.".php";
     
     include 'vues/footer.php';
}