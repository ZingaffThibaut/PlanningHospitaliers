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
      <table class='table table-bordered table-hover table-responsive text-center'>
      <tr>
      <th scope='row'>Nom</th>
      <td>".$row['Nom']."</td>
      </tr>
      <tr>
      <th scope='row'>Prénom</th>
      <td>".$row['Prenom']."</td>
      </tr>
      <tr>
      <th scope='row'>Service</th>
      <td>".$row['Nom_service']."</td>
      </tr>
      <tr>
      <th scope='row'>Identifiant</th>
      <td>".$row['Identifiant']."</td>
      </tr>
      </table>
      <br>
      <hr>";
    }
    echo $res;
  }
}else{
  echo "Error";
}
?>
