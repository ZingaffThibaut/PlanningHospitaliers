<?php
session_start();

if(isset($_POST)){
  include("connexion.php");
  extract($_POST);
  $requete="UPDATE Service SET Nom_service='".$Nom."', Id_jour='".$Jour."'  WHERE Id_service = '".$Id_service."' ";
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
?>
