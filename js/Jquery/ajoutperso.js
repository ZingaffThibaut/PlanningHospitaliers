$(function(){

  $("#form_ajout").submit(function(){
    Nom = document.getElementById("nom").value;
    Prenom = document.getElementById("prenom").value;
    Service = document.getElementById("option-service").value;
    Niveau = document.getElementById("option-niveau").value;
    $.post(
      "PHP/ajoutperso.php",
      {
        Nom: Nom,
        Prenom: Prenom,
        Id_service : Service,
        Id_lvl : Niveau
      },
      function(data){
        alert(data);
        if (data == "ok"){
          window.location.href ='gestionnaire.html';
        } else {
          $("#ErrorIdentification").html("<div class='alert alert-danger' role='alert'>Erreur dans l'ajout</div>");
        }
      }
    );

    return false;
  });
});
//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
