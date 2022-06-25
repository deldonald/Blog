<?php

class ModeleGenerique {

     function bd(){
          $pdo = new PDO("mysql:host=localhost; dbname=ilci_blog", 'root', '',[
              PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
              PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
          ]);
  
          $pdo->exec("SET NAMES UTF8");
  
          return $pdo;
      }
     
      function validateFormData($champs, $min, $max){
          $champs = trim($champs);
          $champs = htmlentities($champs);

          if( strlen($champs) >= $min && strlen($champs) <= $max ){
               return $champs;
          }
          $_SESSION['msg'] = "formulaire mal rempli";
          header('location: ?action=inscription');
          exit;
      }
}