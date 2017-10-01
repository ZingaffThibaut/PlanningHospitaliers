<?php
  session_start();

  if(isset($_POST)){

    include("connexion.php");

    $sql    =   $bdd  ->  query("SELECT id_user, login , password FROM User");
    $row    =   $sql  ->  fetch();

    extract($_POST);
    if($row['login'] == $login && $row['password'] == $pass){

      $_SESSION['id_user'] = $row['id_user'];
      echo "log on";

    }else{
      echo "unknow";
    };
  }else{
    echo "Que faites vous ici ?";
  }
?>
