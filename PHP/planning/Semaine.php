
<?php
session_start();

if(isset($_POST)){
  include("../connexion.php");
  extract($_POST);

  $requete="SELECT Id_service FROM Service WHERE Nom_service='".$service."'";
  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(empty($err[2])){
    $row = $result->fetch();
    $Id_service= $row['Id_service'];
    $date= new DateTime($date);
    $date->modify('sunday');
    $dimanche = $date->format('Y-m-d');
    $date->modify('-6 day');
    $lundi = $date->format('Y-m-d');

    $requete="
    SELECT
    Planning.Id_personne,
    Date,
    Nom,
    Prenom,
    Id_periode,
    Nom_dispo
    FROM Planning,
    Personne,
    Disponibilite
    WHERE Planning.Id_service='".$Id_service."'
    AND (Date BETWEEN '".$lundi."' AND '".$dimanche."')
    AND Planning.Id_personne = Personne.Id_personne
    AND Planning.Id_dispo = Disponibilite.Id_dispo
    ORDER BY Planning.Id_personne,Id_periode, Date";

    $tabsemaine=['','L','M','Me','J','V','S','D'];

    $result=$bdd->prepare($requete);
    $result->execute();
    $err = $result->errorInfo();
    if(empty($err[2])){
      if($result->rowCount()>0){
        $res="<table class='table table-bordered text-center table-hover table-sm' id='tableau'>
        <thead class='thead-default'>
        <tr>
        <th></th>";
        for($i=0;$i<=6;$i++){
          $res.="<th>".$tabsemaine[$date->format('N')]."  ".$date->format('d')."</th>";
          $date->modify('+1 day');
        }
        $res.="</tr>
        </thead>
        <tbody>";
        $Id_personneref="";
        $Id_perioderef="1";
        while($row=$result->fetch()){
          if($row['Id_personne']!=$Id_personneref){
            $res.="</tr><tr><td rowspan='3' style='text-align: center;vertical-align: middle;'><b>".substr($row['Prenom'],0,1).".".$row['Nom']."</b></td><td>".$row['Nom_dispo']."</td>";
            $Id_personneref=$row['Id_personne'];
            $Id_perioderef="1";
          }elseif($row['Id_periode']!=$Id_perioderef){
            $res.="</tr><tr><td>".$row['Nom_dispo']."</td>";
            $Id_perioderef=$row['Id_periode'];
          }else{
            $res.="<td>".$row['Nom_dispo']."</td>";
          }
        }
        $res.="</tr></tbody></table>";
      }
    }else{
      echo $err[2];
    }
  }else{
    echo $err[2];
  }
  echo $res;
}



?>
