function affipersochar(){
    service = document.getElementById("option-service").value;
    $.post(
      "PHP/affiperso.php",
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
    "PHP/affiperso.php",
    function(data){
      if(data!=""){
          $("#tab").html(data);
      }
    }
  );
});
