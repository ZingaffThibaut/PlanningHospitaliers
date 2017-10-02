<?php
session_start();

if(isset($_POST)){

  include("connexion.php");
  extract($_POST);
  $requete="SELECT Id_personne, Id_lvl FROM Connexion WHERE Identifiant='".$login."' AND mdp='".$pass."' ";
  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(empty($err[2])){
    if($result->rowCount()>0){
      $row=$result->fetch();
      $_SESSION['Id_personne'] = $row['Id_personne'];
      $_SESSION['acces'] = $row['Id_lvl'];
      echo "log on";

    }else{
      echo "unknow";
    };
  }else{
    echo "Error";
  }
}else{
  echo "Que faites vous ici ?";
}
?>
