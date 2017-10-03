
<?php
session_start();

if(isset($_POST)){
  include("connexion.php");
  extract($_POST);
  if(isset($Id_service)&&$Id_service!='0'){
    $requete="SELECT Nom_service, Nom, Prenom
    FROM Personne, Service
    WHERE Service.Id_service = Personne.Id_service
    AND Service.Id_service ='".$Id_service."'
    ORDER BY Nom_service, Nom, Prenom";
  }else{
    $requete="SELECT Nom_service, Nom, Prenom
    FROM Personne, Service
    WHERE Service.Id_service = Personne.Id_service
    ORDER BY Nom_service, Nom, Prenom";
  }
  $result=$bdd->prepare($requete);
  $result->execute();
  $err = $result->errorInfo();
  $resultat="<table class='table table-bordered table-hover table-sm '>
  <thead class='thead-default'>
  <tr>
  <th>Service</th>
  <th>Nom</th>
  <th>Prénom</th>
  <th>Action</th>
  </tr>
  </thead>
  <tbody>";
  if(empty($err[2])){
    if($result->rowCount()>0){
      while($row=$result->fetch()){
        $resultat.="<tr>
        <th scope='row'>".$row['Nom_service']."</th>
        <td>".$row['Nom']."</td>
        <td>".$row['Prenom']."</td>
        <td>
        <a class='btn btn-success' href='modifpersonnel.html' role='button'><i class='fa fa-pencil '></i></a>
        <a class='btn btn-danger' href='#' role='button'><i class='fa fa-trash'></i></a>
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
