
<?php
session_start();

if(isset($_POST)){
  include("connexion.php");
  extract($_POST);

  $Idpers = $_SESSION['Id_personne'];

  $requete="SELECT Nom, Prenom, Identifiant, mdp, Personne.Id_personne
  FROM Personne, Connexion
  WHERE Connexion.Id_personne = Personne.Id_personne
  AND Personne.Id_personne = $Idpers";

  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(empty($err)){
    echo 'Err ';
    echo $err[2];
  }else{
    while($row = $result->fetch()){
      $res="<h1>Modification du mot de passe</h1>
      <button class='btn' onclick='Retour()'>Retour</button>
      <br>
      <form method='post' role='form' id='modif_session' action='#'>
      <br>
      <input type='hidden' id='Id_personne' value='$Idpers'/>
      <p>Mot de passe:
        <input class='form-control' type='password' id='MDP' value=''/>
      </p>
      <br>
      <p>Verification mot de passe:
        <input class='form-control' type='password' id='MDPV' value=''/>
      </p>
      <br>
      <button class='btn btn-success' onclick='modif_profil()'>Valider</button>
      </form>
      <hr>";
    }
    echo $res;
  }
}else{
  echo "Error";
}
?>
