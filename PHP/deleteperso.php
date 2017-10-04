<?php
session_start();

if(isset($_POST)){
  include("connexion.php");
  extract($_POST);
  $requete="DELETE FROM Personne WHERE Id_personne = '".$Id_personne."'";
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
