$(document).ready(function(){
  $.post(
    "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/choixService.php",
    {
      service: "true"
    },
    function(data){
      $("#Service").html(data);
    },
  )
});
