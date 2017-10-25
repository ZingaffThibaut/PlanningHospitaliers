<?php
  if(!empty($_FILES['fichierCSV']['name'])){

    $extensionAutorise  = array("csv");
    $extension          = end(explode(".", $_FILES['fichierCSV']['name']));

    $ligne = 1;

    if(in_array($extension, $extensionAutorise)){

      $file_data  = fopen($_FILES['fichierCSV']['tmp_name'],"r");
      while($row = fgetcsv($file_data,1000,';')){
        $champs = count($row);

        if($ligne >1){
          $Nom = $row[0];
          $Prenom = $row[1];
          $Date = $row[2];
          $Periode = $row[3];
          $Dispo = $row[4];

          $requete = "Select id_personne From Personne Where Nom = ".$Nom." AND Prenom = ".$Prenom;
          $result=$bdd->prepare($requete);
          $result->execute();

          while($row = $result ->fetch()){
            $Id_personne = $row['id_personne'];
          }
          $autrementonsenfou = new Date($Date);
          $variableermerde2 = $Date->format('Y-m-d');

          $requete = "Select Id_dispo From Disponibilite Where Nom_periode =".$Dispo;
          $result=$bdd->prepare($requete);
          $result->execute();
        }

        $ligne++;
      }
    }else{
      echo("error 2");
    }
  }else{
    echo("error 1");
  }


?>
