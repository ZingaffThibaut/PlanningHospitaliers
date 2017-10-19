function affisessionchar(){
    service = document.getElementById("option-service").value;
    $.post(
      "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/sessions.php",
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
    "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/sessions.php",
    function(data){
      if(data!=""){
          $("#tab").html(data);
      }
    }
  );
});
