<?php
include"ConnexionMySQL.php";

$date= new DateTime('2017-01-01');
for($i=0;$i>37000;$i++){
  $requete="INSERT INTO DATE VALUE('".$date->format('Y-m-d')."')";
  $result=$objPdo->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(!empty($err[2])){
    echo $err[2];
  }
  $date->modify('+ 1 day');
}
?>
