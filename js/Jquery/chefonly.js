
  $(document).ready(function(){
    $.post(
      "PHP/acces.php",
      {
        el : "true"
      },
      function(data){
        if (data != "Admin" && data != "Chef" ){
          window.location.href ='accueil.html';
        }
      }
    );

    return false;
  });
//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
