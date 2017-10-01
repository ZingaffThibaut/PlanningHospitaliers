<?php
  session_start();

  include("connexion.php");
  if(isset($_SESSION['id_user'])){

    $sql        =   $bdd  ->  query("SELECT id_user FROM User WHERE id_user = '".$_SESSION['id_user']."'");
    $id_user    =   $sql  ->  fetch();
    $sql        =   $bdd  ->  query("SELECT nom,prenom FROM User,Personne WHERE User.id_user = '".$_SESSION['id_user']."' AND User.id_personne = Personne.id_personne");
    $personne   =   $sql  ->  fetch();

    if($_SESSION['id_user'] == $id_user['id_user']){
      echo $personne["nom"]." ".$personne["prenom"];
    }else{
      echo "ERROR";
    }
  }else{
    echo "ERROR";
  }
?>
