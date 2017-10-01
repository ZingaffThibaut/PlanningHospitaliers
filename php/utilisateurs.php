<?php
  session_start();

  include("connexion.php");
  if(isset($_SESSION['id_user'])){

    $sql        =   $bdd  ->  query("SELECT Identifiant FROM Connexion WHERE Identifiant = '".$_SESSION['id_user']."'");
    $id_user    =   $sql  ->  fetch();
    $sql        =   $bdd  ->  query("SELECT nom,prenom FROM Connexion,Personne WHERE Connexion.Identifiant = '".$_SESSION['id_user']."' AND Connexion.Id_personne = Personne.Id_personne");
    $personne   =   $sql  ->  fetch();

    if($_SESSION['id_user'] == $id_user['Identifiant']){
      echo $personne["Nom"]." ".$personne["Prenom"];
    }else{
      echo "ERROR";
    }
  }else{
    echo "ERROR";
  }
?>
