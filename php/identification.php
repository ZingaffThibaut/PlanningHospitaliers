<?php
session_start();

if(isset($_POST)){
  include("connexion.php");
  extract($_POST);
  $requete="SELECT Connexion.Id_personne, Id_lvl, Nom FROM Connexion, Personne WHERE Identifiant='".$login."' AND mdp='".$pass."' AND Connexion.Id_personne = Personne.Id_personne ";
  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(empty($err[2])){
    if($result->rowCount()>0){
      $row=$result->fetch();
      $_SESSION['Id_personne'] = $row['Id_personne'];
      $_SESSION['acces'] = $row['Id_lvl'];
      $_SESSION['Nom'] = $row['Nom'];
      echo "log on";

    }else{
      echo "unknow";
    };
  }else{
    echo $err[2];
    echo "Error";
  }
}else{
  echo "Que faites vous ici ?";
}
?>
