
<?php
session_start();

include("connexion.php");
$requete="SELECT Nom_service
FROM Service
ORDER BY Nom_service";
$result=$bdd->prepare($requete);
$result->execute();
$err = $result->errorInfo();
if(empty($err[2])){
  if($result->rowCount()>0){
    $resultat="<table class='table table-bordered table-hover table-sm '>
    <thead class='thead-default'>
    <tr>
    <th>Service</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>";
    while($row=$result->fetch()){
      $resultat.="<tr>
      <td>".$row['Nom_service']."</td>
      <td>
      <a class='btn btn-success' href='#' role='button'><i class='fa fa-pencil '></i></a>
      <a class='btn btn-danger' href='#' role='button'><i class='fa fa-trash'></i></a>
      </td>
      </tr>";
    }
    $resultat.="</tbody>
    </table>";
    echo $resultat;
  }
}
?>
