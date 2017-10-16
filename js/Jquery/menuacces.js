
$(document).ready(function(){
  $.post(
    "PHP/acces.php",
    {
      el : "true"
    },
    function(data){
      if (data == "Chef"){
        $("#nav_session").css("visibility", "hidden");
        $("#nav_session").css("display", "none");
      }else if(data == "Personnel"){
        $("#nav_session").css("visibility", "hidden");
        $("#nav_session").css("display", "none");
        $("#nav_gestionnaire").css("visibility", "hidden");
        $("#nav_gestionnaire").css("display", "none");
        $("#nav_service").css("visibility", "hidden");
        $("#nav_service").css("display", "none");
      }
    });
  });
//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
