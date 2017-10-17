
<?php
session_start();

if(isset($_POST)){
  include("connexion.php");
  extract($_POST);

  $requete="SELECT Nom_service, Nom, Prenom, Personne.Id_personne, Service.Id_service Id_service, Id_lvl
  FROM Personne, Service, Connexion
  WHERE Service.Id_service = Personne.Id_service
  AND Personne.Id_personne = Connexion.Id_personne
  AND Personne.Id_personne = '".$Id_personne."'
  ORDER BY Nom_service, Nom, Prenom";

  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(empty($err)){
    echo 'Err ';
    echo $err[2];
  }else{
    while($row = $result->fetch()){
      $res="<h1>Modification d'une personne</h1>
      <button class='btn' onclick='Retour()'>Retour</button>
      <br>
      <form method='post' role='form' id='modif_perso' action='#'>
      <br>
      <input type='hidden' id='Id_personne' value='".$row['Id_personne']."'/>
      <p>Nom
        <input class='form-control' type='text' id='nom' value='".$row['Nom']."'/>
      </p>
      <br>
      <p>Prénom
        <input class='form-control' type='text' id='prenom' value='".$row['Prenom']."'/>
      </p>
      <br>
      <p>Service
        <select class='form-control' id='option-service2' >
        </select>
      </p>
      <br>
      <p>Niveau
        <select class='form-control' id='option-niveau'>
        </select>
      </p>
      <br>
      <button class='btn btn-success' onclick='modif_perso()'>Valider</button>
      </form>
      <hr>£";
      $res.=$row['Id_service']."£";
      $res.=$row['Id_lvl'];
    }
    echo $res;
  }
}else{
  echo "Error";
}
?>
