<?php
session_start();

if(isset($_POST)){
  include("connexion.php");
  extract($_POST);
  $requete="UPDATE Personne SET Nom='".$Nom."', Prenom='".$Prenom."', Id_service='".$Service."' WHERE Id_personne = '".$Id_personne."'";
  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(!empty($err[2])){
    echo $err[2];
    echo "Error";
  }else{
    $requete="UPDATE Connexion SET Id_lvl='".$Niveau."' WHERE Id_personne = '".$Id_personne."'";
    $result=$bdd->prepare($requete);
    $result->execute();
    $err = $result->errorInfo();
    if(!empty($err[2])){
      echo $err[2];
      echo "Error";
    }else{
      echo 'ok';
    }
  }
}
?>
