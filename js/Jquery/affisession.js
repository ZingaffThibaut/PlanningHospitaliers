function affisessionchar(){
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
  };


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
