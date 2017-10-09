$(document).ready(function(){
  $.post(
    "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/utilisateurs.php",
    {
      information: "true",
    },
    function(data){
      $("#profil").html(data);
    }
  );
});
