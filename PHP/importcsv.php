<?php
  print_r($_POST);
  if(!empty($_FILES['fichierCSV']['name'])){

    $extensionAutorise  = array("csv");
    $extension          = end(explode(".", $_FILES['fichierCSV']['name']));

    $ligne = 1;


    if(in_array($extension, $extensionAutorise)){

      $file_data  = fopen($_FILES['fichierCSV']['tmp_name'],"r");
      //fgetcsv($file_data);

      while($row = fgetcsv($file_data,1000,';')){

        $champs = count($row);

        echo "<b> Les " . $champs . " champs de la ligne " . $ligne . " sont :</b><br />";
        $ligne ++;

        for($i=0; $i<$champs; $i ++){
        echo $row[$i] . "<br />";
        }
      }
    }else{

      echo("error 2");

    }
  }else{

    echo("error 1");

  }


?>
