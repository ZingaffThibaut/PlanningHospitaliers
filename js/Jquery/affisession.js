$(function(){

  $("#form_perso").submit(function(){
    service = document.getElementById("option-service").value;
    $.post(
      "PHP/sessions.php",
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
    "PHP/sessions.php",
    function(data){
      if(data!=""){
          $("#tab").html(data);
      }
    }
  );
});
