
<?php
session_start();

//if(isset($_POST)){
  include("../connexion.php");
//  extract($_POST);

  //$date= new DateTime($annee."/".$mois."/01");
  $date = new DateTime("2017-10-01");
  $date->modify('first monday');
  $lundi = $date->format('Y-m-d');
  $date->modify('+6 day');
  $dimanche = $date->format('Y-m-d');

  $requete="
  SELECT
  Planning.Id_personne,
  Date,
  Nom,
  Prenom,
  Nom_dispo
  FROM Planning,
  Personne,
  Disponibilite
  WHERE Planning.Id_service='4'
  AND (Date BETWEEN '".$lundi."' AND '".$dimanche."')
  AND Planning.Id_personne = Personne.Id_personne
  AND Planning.Id_dispo = Disponibilite.Id_dispo
  ORDER BY Planning.Id_personne, Date, Id_periode";


  $tabsemaine=['Lun','Mar','Mer','Jeu','Ven','Sam','Dim'];

  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(empty($err[2])){
    if($result->rowCount()>0){
      $res="<table class='table table-bordered table-hover table-sm '>
      <thead class='thead-default'>
      <tr>
      <td colspan='2'></td>";
      for($i=0;$i<=6;$i++){
        $res.="<th colspan='3'>".$tabsemaine[$date->format('N')]."  ".$date->format('m/d')."</th>";
        $date->modify('+1 day');
      }
      $res.="</tr><tr><td colspan='2'></td>";
      for($i=0;$i<=6;$i++){
        $res.="<th>AM</th><th>PM</th><th>NG</th>";
      }
      $res.="</tr>
      </thead>
      <tbody>";
      $Id_personneref="";
      while($row=$result->fetch()){
        if($row['Id_personne']!=$Id_personneref){
          $res.="</tr><tr><td>".$row['Nom']."</td><td>".$row['Prenom']."</td><td>".$row['Nom_dispo']."</td>";
          $Id_personneref=$row['Id_personne'];
        }else{
          $res.="<td>".$row['Nom_dispo']."</td>";

        }
      }
      $res.="</tr></tbody></table>";
    }
  }else{
    echo $err[2];
  }
//}
echo $res;
?>
