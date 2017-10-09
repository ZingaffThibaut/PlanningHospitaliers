$(document).ready(function(){
  var service = $(location).attr('search');
  service = service.substring(9);
  $.post(
    "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/planning/membre.php",
    {
      service: service,
    },
    function(data){
      $("#membre").append(data);
    },
  );
});
