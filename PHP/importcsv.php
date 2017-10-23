<?php
  print_r($_POST);
  if(!empty($_FILES['fichierCSV']['name'])){

    $extensionAutorise  = array("csv");
    $extension          = end(explode(".", $_FILES['fichierCSV']['name']));

    $ligne = 1;


    if(in_array($extension, $extensionAutorise)){

      $file_data  = fopen($_FILES['fichierCSV']['tmp_name'],"r");
      while($row = fgetcsv($file_data,1000,';')){
        $champs = count($row)

        if($ligne > 1){
          echo "Personne : ".$row[0].'<br>';
          for($i=1; $i<$champs; $i ++){
            echo '|'.$row[$i].'|';
          }
        }
      }
    }else{
      echo("error 2");
    }
  }else{
    echo("error 1");
  }


?>
