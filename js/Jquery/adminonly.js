
  $(document).ready(function(){
    $.post(
      "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/acces.php",
      {
        el : "true"
      },
      function(data){
        if (data != "Admin"){
          window.location.href ='accueil.html';
        }
      }
    );

    return false;
  });
//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
