<?php
session_start();

if(isset($_POST)){
  include("connexion.php");
  extract($_POST);

  $Idpers = $_SESSION['Id_personne'];

  $requete="SELECT Nom_service, Nom, Prenom, Personne.Id_personne, Identifiant, mdp
  FROM Personne, Service, Connexion
  WHERE Service.Id_service = Personne.Id_service
  AND Personne.Id_personne = Connexion.Id_personne
  AND Personne.Id_personne = $Idpers";

  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(empty($err)){
    echo 'Err ';
    echo $err[2];
  }else{
    while($row = $result->fetch()){
      $res="
      <input type='hidden' id='Id_personne' value='".$row['Id_personne']."'/>
      <p>Nom: ".$row['Nom']."
      </p>
      <br>
      <p>Prénom: ".$row['Prenom']."
      </p>
      <br>
      <p>Service: ".$row['Nom_service']."
      </p>
      <br>
      <p>Identifiant: ".$row['Identifiant']."
      </p>
      <br>
      <p>Mot de passe: ".$row['mdp']."
      </p>";
    }
    echo $res;
  }
}else{
  echo "Error";
}
?>
