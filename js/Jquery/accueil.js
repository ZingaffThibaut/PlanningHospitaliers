$(document).ready(function(){
  $.post(
    "php/utilisateurs.php",
    {
      information: "true",
    },
    function(data){
      $("#profil").html(data);
    }
  );
});
