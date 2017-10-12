<?php
  include("../connexion.php");

  // if(isset($_POST)){
    $i = 0;

    $sql_service      =   $bdd  ->  query("SELECT Id_service FROM Service WHERE Nom_service = '".$_POST['service']."'");
    $Id_service       =   $sql_service  ->  fetch();
    $sql_membre       =   $bdd  ->  query("SELECT Id_personne, Nom , Prenom FROM Personne WHERE Id_service = '".$Id_service['Id_service']."'");

    while($membre  =   $sql_membre  ->  fetch()){

      echo("<tr id=ligne".$i.">");
      echo("<td>".$membre['Nom'].' '.$membre['Prenom']."</td>");
      $sql_date         =   $bdd  ->  query("SELECT * FROM Date WHERE Date BETWEEN NOW( ) AND DATE_ADD( NOW( ) , INTERVAL 6 DAY )");
      while($date             =   $sql_date  ->  fetch()){
        $sql_planning     =     $bdd  ->  query("SELECT Id_dispo FROM Planning WHERE Id_personne ='".$membre['Id_personne']."' AND Date ='".$date[0]."'");

        while($planning         =     $sql_planning -> fetch()){
          if($planning['Id_dispo'] == 1){
            echo("<td class='bg-success'> T </td>");
          }else if($planning['Id_dispo'] == 2){
            echo("<td class='bg-warning'> RC </td>");
          }else if($planning['Id_dispo'] == 3){
            echo("<td class='bg-danger'> RH </td>");
          }
        }
      }
      echo("</tr>");
      $i++;
    }
  // }
