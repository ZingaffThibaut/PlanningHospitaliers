$(function(){

  $("#form_perso").submit(function(){
    service = document.getElementById("service").value;
    $.post(
      "PHP/affiperso.php",
      {
        Id_service: service
      },
      function(data){
          $("#tab").html(data);
      }
    );

    return false;
  });
});

$(document).ready(function(){
  $.post(
    "PHP/affiperso.php",
    function(data){
      if(data!=""){
          $("#tab").html(data);
      }
    }
  );
});
