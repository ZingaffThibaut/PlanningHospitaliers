$(document).ready(function(){
  $.post(
    "https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/PHP/utilisateurs.php",
    {
      information: "true",
    },
    function(data){
      $("#profil").html(data);
    }
  );
});
