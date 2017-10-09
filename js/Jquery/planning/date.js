$(document).ready(function(){
  $.post(
    "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/planning/date.php",
    function(data){
      $("#date").append(data);
    },
  );
});
