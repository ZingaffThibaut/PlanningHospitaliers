
<?php
session_start();

if(isset($_POST)){
  include("connexion.php");
  extract($_POST);

  $requete="SELECT Nom, Prenom, Identifiant, mdp, Personne.Id_personne
  FROM Personne, Connexion
  WHERE Connexion.Id_personne = Personne.Id_personne
  AND Personne.Id_personne ='".$Id_personne."'";

  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(empty($err)){
    echo 'Err ';
    echo $err[2];
  }else{
    while($row = $result->fetch()){
      $res="<h1>Modification d'une session</h1>
      <button class='btn' onclick='Retour()'>Retour</button>
      <br>
      <form method='post' role='form' id='modif_session' action='#'>
      <br>
      <input type='hidden' id='Id_personne' value='".$row['Id_personne']."'/>
      <p>Identifiant:
        <input class='form-control' type='text' id='Identifiant' value='".$row['Identifiant']."'/>
      </p>
      <br>
      <p>Mot de passe:
        <input class='form-control' type='password' id='mdp' value='".$row['mdp']."'/>
      </p>
      <p>Vérification du mot de passe:
        <input class='form-control' type='password' id='mdp' value='".$row['mdpv']."'/>
      </p>
      <br>
      <button class='btn btn-success' onclick='modif_session()'>Valider</button>
      </form>
      <hr>";
    }
    echo $res;
  }
}else{
  echo "Error";
}
?>
