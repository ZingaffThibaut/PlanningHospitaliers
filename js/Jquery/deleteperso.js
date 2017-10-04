function Delete(nb){
    alert(nb);
    $.post(
      "PHP/deleteperso.php",
      {
        Id_personne: nb
      },
      function(data){
        alert(data);
        if (data == "ok"){
          window.location.href ='gestionnaire.html';
        } else {
          $("#ErrorIdentification").html("<div class='alert alert-danger' role='alert'>Erreur dans la suppresion</div>");
        }
      }
    );

    return false;
  };
//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
