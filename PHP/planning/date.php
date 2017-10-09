<?php
  include("../connexion.php");

  $dateActu = new DateTime();

  $sql         =   $bdd  ->  query("SELECT * FROM Date WHERE Date BETWEEN NOW( ) AND DATE_ADD( NOW( ) , INTERVAL 7 DAY )");

  while ($date  =   $sql  ->  fetch()) {

    //$newDate = date_create($date[0]);
    // echo $date[0];
    $dateStr = strtotime($date[0]);
    $y = date('Y',$dateStr);
    $m = date('m',$dateStr);
    $d = date('d',$dateStr);
    $w = date('w',$dateStr);
    if($w == 0){
      $jour = 'Dim';
    }else if($w == 1){
      $jour = 'Lun';
    }else if($w == 2){
      $jour = 'Mar';
    }else if($w == 3){
      $jour = 'Mer';
    }else if($w == 4){
      $jour = 'Jeu';
    }else if($w == 5){
      $jour = 'Ven';
    }else if($w == 6){
      $jour = 'Sam';
    }
    echo("<th colspan='3'>".$jour." ".$d.'/'.$m."</th>");

    //echo(($newDate);

    //echo("<th colspan='3'>".date_format('d/m/Y',$date[0])."</th>");
  }
 ?>
