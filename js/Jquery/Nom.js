$(document).ready(function(){
  $.post(
    "PHP/Nom.php",
    function(data){
      if(data!=""){
          $("#profil").html(data);
      }
    }
  );
});