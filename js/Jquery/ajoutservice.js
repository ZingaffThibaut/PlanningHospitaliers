$(function(){

  $("#form_ajout").submit(function(){
    Nom_service = document.getElementById("nom_service").value;
    $.post(
      "PHP/ajoutservice.php",
      {
        Nom_service: Nom_service
      },
      function(data){
        if (data == "ok"){:
          window.location.href ='affiservice.html';
        } else {
          $("#ErrorIdentification").html("<div class='alert alert-danger' role='alert'>Erreur dans l'ajout</div>");
        }
      }
    );

    return false;
  });
});
//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
