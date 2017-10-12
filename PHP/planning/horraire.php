<?php
  include("../connexion.php");

  if(isset($_POST)){
    $sql         =   $bdd  ->  query("SELECT * FROM Date WHERE Date BETWEEN NOW( ) AND DATE_ADD( NOW( ) , INTERVAL 7 DAY )");
    while ($date  =   $sql  ->  fetch()) {
       echo("<th>AM</th><th>PM</th><th>NG</th>");
    }
  }
