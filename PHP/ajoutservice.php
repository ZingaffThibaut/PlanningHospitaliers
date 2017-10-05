<?php
session_start();


if(isset($_POST)){
  include("connexion.php");
  extract($_POST);
  $requete="SELECT MAX(Id_service) as nb FROM Service";
    $result=$bdd->prepare($requete);
    $result->execute();
    $err = $result->errorInfo();
    if(!empty($err[2])){
      echo $err[2];
      echo "Error";
    }else{
      $row = $result->fetch();
      $nb = $row['nb'];
      $nb++;
    }
  $requete="INSERT INTO Service VALUE('".$nb."','".$Nom_service."')";
  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(!empty($err[2])){
    echo $err[2];
    echo "Error";
  }
}
?>
