$(function(){

  $("#form_service").submit(function(){
    service = document.getElementById("option-service").value;
    $.post(
      "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/affiservice.php",
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
    "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/affiservice.php",
    function(data){
      if(data!=""){
          $("#tabservice").html(data);
      }
    }
  );
});
