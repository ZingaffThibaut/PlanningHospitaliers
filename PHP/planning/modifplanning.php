<?php
session_start();

if(isset($_POST)){
  include("../connexion.php");
  extract($_POST);
  $requete="SELECT Id_service FROM Service WHERE Nom_service='".$service."'";
  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(empty($err[2])){
    $row = $result->fetch();
    $Id_service= $row['Id_service'];
    $requete="SELECT * FROM Planning WHERE Id_personne='".$Id_personne."' AND Date ='".$date."' AND Id_periode ='".$Id_periode."' ";
    $result=$bdd->prepare($requete);
    $result->execute();
    $err = $result->errorInfo();
    if(!empty($err[2])){
      echo $err[2];
      echo "Error";
    }else{
      echo $requete;
      echo 'ok';
      $nb = $result->rowCount();
      if($nb!=0){
        $requete="UPDATE Planning SET Id_dispo ='".$Choix."' WHERE Id_personne='".$Id_personne."' AND Date ='".$date."' AND Id_periode ='".$Id_periode."' ";
        $result=$bdd->prepare($requete);
        $result->execute();
        $err = $result->errorInfo();
        if(!empty($err[2])){
          echo $err[2];
          echo "Error";
        }
        echo $requete;
        echo 'okup';
      }else{
        $requete="INSERT INTO Planning VALUE ('".$Id_personne."','".$Id_service."','".$date."','".$Id_periode."','".$Choix."')";
        $result=$bdd->prepare($requete);
        $result->execute();
        $err = $result->errorInfo();
        if(!empty($err[2])){
          echo $err[2];
          echo "Error";
        }
        echo $requete;
        echo 'okin';
      }
    }
  }
}
?>
