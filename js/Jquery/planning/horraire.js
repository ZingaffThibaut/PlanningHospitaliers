$(document).ready(function(){
  var service = $(location).attr('search');
  service = service.substring(9);
  $.post(
    "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/planning/horraire.php",
    {
      service: service,
    },
    function(data){
      $("#horraire").append(data);
    },
  );
});
