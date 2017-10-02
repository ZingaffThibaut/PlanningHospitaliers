$(function(){

  $("#form_login").submit(function(){
    login = document.getElementById("login").value;
    pass = document.getElementById("password").value;
    $.post(
      "PHP/identification.php",
      {
        login: login,
        pass: pass
      },
      function(data){
        if (data == "log on"){
          window.location.href ='accueil.html';
        } else {
          $("#ErrorIdentification").html("<div class='alert alert-danger' role='alert'>Erreur dans le Pseudo ou mot de passe</div>");
        }
      }
    );

    return false;
  });
});
//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
