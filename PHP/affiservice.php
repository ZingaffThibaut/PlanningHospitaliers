
<?php
session_start();

if(isset($_POST)){
  include("connexion.php");
  extract($_POST);

    $requete="SELECT Nom_service, Id_service
    FROM Service
    WHERE Id_affi=0
    AND Id_service !=0
    ORDER BY Nom_service";

  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  $resultat="<table class='table table-bordered table-hover table-sm '>
  <thead class='thead-default'>
  <tr>
  <th>Service</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>";
  if(empty($err[2])){
    if($result->rowCount()>0){
      while($row=$result->fetch()){
        $resultat.="<tr>
        <th scope='row'>".$row['Nom_service']."</th>
        <td>
        <button onclick='Modif(".$row['Id_service'].")' class='btn btn-success'><i class='fa fa-pencil'></i></button>
        <button onclick='Deleteserv(".$row['Id_service'].")' class='btn btn-danger'><i class='fa fa-trash'></i></button>
        </form>
        </td>
        </tr>";
      }
      $resultat.="</tbody>
      </table>";
      echo $resultat;
    }else{
      echo "Liste vide";
    }
  }else{
    echo $err[2];
    echo "Error";
  }
}else{
  echo "Que faites vous ici ?";
}
?>
