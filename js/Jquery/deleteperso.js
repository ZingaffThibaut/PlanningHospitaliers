function Delete(nb){
  var r = confirm("Confirmer la suppresion");
  if (r == true) {
    $.post(
      "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/deleteperso.php",
      {
        Id_personne: nb
      },
      function(data){
        if (data == "ok"){
          window.location.href ='gestionnaire.html';
        } else {
          $("#ErrorIdentification").html("<div class='alert alert-danger' role='alert'>Erreur dans la suppresion</div>");
        }
      }
    );

    return false;
  }
};
//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
