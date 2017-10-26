<?php

include("connexion.php");

if(!empty($_FILES['fichierCSV']['name'])){

  $extensionAutorise  = array("csv");
  $extension          = end(explode(".", $_FILES['fichierCSV']['name']));

  $ligne = 1;
  if(in_array($extension, $extensionAutorise)){

    $file_data  = fopen($_FILES['fichierCSV']['tmp_name'],"r");
    $up = 0;
    $in = 0;
    $er = 0;
    while($row = fgetcsv($file_data,1000,';')){
      $champs = count($row);

      if($ligne >1){
        $Nom = $row[0];
        $Prenom = $row[1];
        $date2 =  new DateTime(substr($row[2],6,4)."-".substr($row[2],3,2)."-".substr($row[2],0,2));
        $Id_periode = $row[3];
        $Dispo = $row[4];
        $date = $date2->format('Y-m-d');

        $requete = "Select Id_dispo From Disponibilite Where Nom_dispo = '".$Dispo."' ";
        $result=$bdd->prepare($requete);
        $result->execute();
        $row2 = $result ->fetch();
        $Choix = $row2['Id_dispo'];
        $requete = "Select Id_personne, Id_service From Personne Where Nom = '".$Nom."' AND Prenom = '".$Prenom."'";
        $result=$bdd->prepare($requete);
        $result->execute();
        $nb = $result->rowCount();
        if($nb != 0){
          $row2 = $result ->fetch();
          $Id_personne = $row2['Id_personne'];
          $Id_service = $row2['Id_service'];

          $requete="SELECT * FROM Planning WHERE Id_personne='".$Id_personne."' AND Date ='".$date."' AND Id_periode ='".$Id_periode."' ";
          $result=$bdd->prepare($requete);
          $result->execute();
          $err = $result->errorInfo();
          if(!empty($err[2])){
            $er++;
          }else{
            $nb = $result->rowCount();
            if($nb!=0){
              $requete="UPDATE Planning SET Id_dispo ='".$Choix."' WHERE Id_personne='".$Id_personne."' AND Date ='".$date."' AND Id_periode ='".$Id_periode."' ";
              $result=$bdd->prepare($requete);
              $result->execute();
              $err = $result->errorInfo();
              if(!empty($err[2])){
                $er++;
              }
              $up++;
            }else{
              $requete="INSERT INTO Planning VALUE ('".$Id_personne."','".$Id_service."','".$date."','".$Id_periode."','".$Choix."')";
              $result=$bdd->prepare($requete);
              $result->execute();
              $err = $result->errorInfo();
              if(!empty($err[2])){
                $er++;
              }
              $in++;
            }
          }
        }else{
          $er++;
        }
      }
      $ligne++;
    }
    echo "<div class='alert alert-success' role='alert'><b>Importation réussi</b> <br>".$in." ligne insérée(s) <br> ".$up." ligne modifiée(s) <br>".$er." erreur(s)</div>";
  }else{
    echo("<div class='alert alert-danger' role='alert'>Fichier de mauvais type, utiliser le ficher CSV fourni<div>");
  }
}else{
  echo("<div class='alert alert-danger' role='alert'>Merci de selectionner un ficher<div>");
}


?>
