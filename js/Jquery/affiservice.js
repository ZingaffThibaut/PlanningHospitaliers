$(function(){

  $("#form_service").submit(function(){
    service = document.getElementById("option-service").value;
    $.post(
      "PHP/affiservice.php",
      {
        Id_service: service
      },
      function(data){
          $("#tabservice").html(data);
      }
    );

    return false;
  });
});

$(document).ready(function(){
  $.post(
    "PHP/affiservice.php",
    function(data){
      if(data!=""){
          $("#tabservice").html(data);
      }
    }
  );
});
