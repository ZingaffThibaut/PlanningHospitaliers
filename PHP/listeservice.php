
<?php
session_start();

include("connexion.php");
$requete="SELECT Id_service, Nom_service
FROM Service
WHERE Id_affi=0
ORDER BY Nom_service";
$result=$bdd->prepare($requete);
$result->execute();
$err = $result->errorInfo();
if(empty($err[2])){
  if($result->rowCount()>0){
    $resultat="";
    while($row=$result->fetch()){
      $resultat.="<option value='".$row['Id_service']."'>".utf8_encode(utf8_decode($row['Nom_service']))."</option>
      ";
    }
    echo $resultat;
  }
}
?>
