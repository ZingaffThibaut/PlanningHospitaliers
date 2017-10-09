<?php
session_start();

  include("connexion.php");
  extract($_POST);
  $requete="UPDATE Service SET Id_affi='1' WHERE Id_service = '".$Id_service."'";
  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(!empty($err[2])){
    echo $err[2];
    echo "Error";
  }else{
      echo "ok";
    }
?>
