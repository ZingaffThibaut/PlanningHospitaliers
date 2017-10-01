<?php
  session_start();

  if(isset($_POST)){

    include("connexion.php");

    $sql    =   $bdd  ->  query("SELECT `Id_personne`,`Identifiant`,`mdp` FROM Connexion");
    $row    =   $sql  ->  fetch();

    extract($_POST);
    if($row['Identifiant'] == $login && $row['mdp'] == $pass){

      $_SESSION['id_user'] = $row['Id_personne'];
      echo "log on";

    }else{
      echo "unknow";
    };
  }else{
    echo "Que faites vous ici ?";
  }
?>
