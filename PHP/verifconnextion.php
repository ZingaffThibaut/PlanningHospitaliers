<?php
session_start();
if (!isset($_SESSION['acces'])){
    echo 'err';
}else{
  echo 'ok';
}
 ?>
