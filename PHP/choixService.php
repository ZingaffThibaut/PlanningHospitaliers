<?php
  //if(isset($_POST)){
    include("connexion.php");

    $requete="SELECT Id_service,Nom_service FROM Service";
    $result=$bdd->prepare($requete);
    $result->execute();

    while($row = $result->fetch()){
      if($row['Id_service'] != '0'){
        echo("<li><a href='planning.html?service=".utf8_encode(utf8_decode($row['Nom_service']))."'>".utf8_encode(utf8_decode($row['Nom_service']))."</a></li>");
      }
    }
