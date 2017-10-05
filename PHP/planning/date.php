<?php
  include("../connexion.php");

  $sql         =   $bdd  ->  query("SELECT * FROM Date WHERE Date BETWEEN NOW( ) AND DATE_ADD( NOW( ) , INTERVAL 7 DAY )");
  while ($date  =   $sql  ->  fetch()) {
    echo("<th colspan='3'>".$date[0]."</th>");
  }
 ?>
