<?php
  //if(isset($_POST)){
    include("connexion.php");

    $requete="SELECT Nom_service FROM Service";
    $result=$bdd->prepare($requete);
    $result->execute();

    while($row = $result->fetch()){
      echo("<li><a href='planning.html?service=".$row[0]."'>".$row[0]."</a></li>");
    }
