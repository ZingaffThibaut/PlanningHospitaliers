<?php
session_start();

if(isset($_POST)){
  include("connexion.php");
  extract($_POST);
  $requete="UPDATE Personne SET Id_affi='1' WHERE Id_personne = '".$Id_personne."'";
  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(!empty($err[2])){
    echo $err[2];
    echo "Error";
  }else{
    $requete="UPDATE Connexion SET Id_affi='1' WHERE Id_personne = '".$Id_personne."'";
    $result=$bdd->prepare($requete);
    $result->execute();
    $err = $result->errorInfo();
    if(!empty($err[2])){
      echo $err[2];
      echo "Error";
    }else{
      echo "ok";
    }
  }
}
?>
