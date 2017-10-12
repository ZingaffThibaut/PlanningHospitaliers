
<?php
session_start();

include("connexion.php");
$requete="SELECT Id_lvl, Nom_lvl
FROM Level
ORDER BY Nom_lvl";
$result=$bdd->prepare($requete);
$result->execute();
$err = $result->errorInfo();
if(empty($err[2])){
  if($result->rowCount()>0){
    $resultat="";
    while($row=$result->fetch()){
      $resultat.="<option value='".$row['Id_lvl']."'>".$row['Nom_lvl']."</option>
      ";
    }
    echo $resultat;
  }
}
?>
