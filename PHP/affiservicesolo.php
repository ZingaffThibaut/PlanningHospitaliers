
<?php
session_start();

if(isset($_POST)){
  include("connexion.php");
  extract($_POST);

  $requete="SELECT Id_service, Nom_service
  FROM Service
  WHERE Id_service = '".$Id_service."'
  ";

  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(empty($err)){
    echo 'Err ';
    echo $err[2];
  }else{
    while($row = $result->fetch()){
      $res="<h1>Modification d'un service</h1>
      <br>
      <button class='btn' onclick='Retour()'>Retour</button>
      <br>
      <form method='post' role='form' id='form_perso' action='#'>
      <br>
      <input class='form-control' type='hidden' id='Id_service' value='".$row['Id_service']."'/>
      <p>Nom du service:
        <input class='form-control' type='text' id='nom_service' value='".$row['Nom_service']."'/>
      </p>
      <br>
      <button type='submit' class='btn btn-success' onclick='modif_service()'>Valider</button>
      </form>
      <hr>";
    }
    echo $res;
  }
}else{
  echo "Error";
}
?>
