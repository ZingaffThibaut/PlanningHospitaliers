<?php
include"ConnexionMySQL.php";

$requete="TRUNCAT Date";
$result=$objPdo->prepare($requete);
$result->execute();
$err = $result->errorInfo();
if(!empty($err[2])){
  echo $err[2];
}

$date= new DateTime ('2017-01-01');
while ($i < 37000) {
  $requete="INSERT INTO Date VALUE('".$date->format('Y-m-d')."')";
  $result=$objPdo->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  if(!empty($err[2])){
    echo $err[2];
  }
  $date->modify('+1 day');
  $i++;
}
?>
