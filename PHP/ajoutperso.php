<?php
session_start();


// Génération d'une chaine aléatoire
function chaine_aleatoire($nb_car, $chaine = 'azertyuiopqsdfghjklmwxcvbn123456789')
{
    $nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++)
    {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}


if(isset($_POST)){
  include("connexion.php");
  extract($_POST);
  $requete="SELECT MAX(Id_personne) as nb FROM Personne";
    $result=$bdd->prepare($requete);
    $result->execute();
    $err = $result->errorInfo();
    if(!empty($err[2])){
      echo $err[2];
      echo "Error";
    }else{
      $row = $result->fetch();
      $nb = $row['nb'];
      $nb++;
    }
  $requete="INSERT INTO Personne VALUE('".$nb."','".$Nom."','".$Prenom."','".$Id_service."')";
  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(!empty($err[2])){
    echo $err[2];
    echo "Error";
  }
  $login = substr($Nom,0,1).".".$Prenom;
  $requete="INSERT INTO Connexion VALUE('','".$Id_lvl."','".$login."','".chaine_aleatoire(8)."','".$nb."')";
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
