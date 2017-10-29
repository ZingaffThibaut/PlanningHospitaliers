<?php
session_start();

include("connexion.php");

$requete="SELECT Nom_service FROM Service WHERE Id_service='".$_SESSION['service']."'";
$result=$bdd->prepare($requete);
$result->execute();
$err = $result->errorInfo();
if(!empty($err[2])){
  echo $err[2];
  echo "Error";
}else{
  $row = $result->fetch();
  echo $row['Nom_service'];
}
?>
