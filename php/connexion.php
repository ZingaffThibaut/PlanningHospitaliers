<?php
try
{
	$bdd = new PDO('mysql:infodb.iutmetz.univ-lorraine.fr;port=3306;dbname=simonin45u_Planning;charset=utf8', 'simonin45u_appli', '31513685');
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
?>
