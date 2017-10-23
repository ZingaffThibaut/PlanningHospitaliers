
<?php
session_start();

if(isset($_POST)){
  include("../connexion.php");
  extract($_POST);

  $Id_personne = $_SESSION['Id_personne'];
  $date= new DateTime($date);
  $date->modify('sunday');
  $dimanche = $date->format('Y-m-d');
  $date->modify('-6 day');
  $lundi = $date->format('Y-m-d');

  $requete="
  SELECT
  Id_personne,
  Nom,
  Prenom,
  Id_jour
  FROM
  Personne,
  Service
  WHERE Personne.Id_personne='".$Id_personne."'
  AND Personne.Id_service = Service.Id_service
  ORDER BY Id_personne";
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
      while($row=$result->fetch()){
        $res.="<tr><td rowspan='3' style='text-align: center;vertical-align: middle;'><b>".substr($row['Prenom'],0,1).".".$row['Nom']."</b></td>";
        for($y=1;$y<=$row['Id_jour'];$y++){
          $requete2="SELECT r1.Date, Nom_dispo
          FROM
          (SELECT *
            FROM Date
            WHERE Date BETWEEN '".$lundi."' AND '".$dimanche."' ORDER BY Date) AS r1
            LEFT JOIN
            (SELECT Date, Id_periode,
            Nom_dispo
            FROM Planning,
            Disponibilite
            WHERE Planning.Id_personne='".$Id_personne."'
            AND Id_personne='".$row['Id_personne']."'
            AND Id_periode = '".$y."'
            AND (Date BETWEEN '".$lundi."' AND '".$dimanche."')
            AND Planning.Id_dispo = Disponibilite.Id_dispo
            ORDER BY Date) AS r2 ON r1.Date = r2.Date";
            $result2=$bdd->prepare($requete2);
            $result2->execute();
            $err2 = $result2->errorInfo();
            if(empty($err2[2])){
              while($row2=$result2->fetch()){
                if($row2['Nom_dispo']==""){
                  $res.="<td onclick='selectcolor(this)' id='".$row2['Date']."£".$row['Id_personne']."£".$y."'>&nbsp;</td>";
                }else{
                  $res.="<td onclick='selectcolor(this)' id='".$row2['Date']."£".$row['Id_personne']."£".$y."'>".$row2['Nom_dispo']."</td>";
                }
              }
              $res.="</tr><tr>";
            }
          }
          $res.="</tr>";
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
?>
