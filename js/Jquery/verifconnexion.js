$(document).ready(function(){
  $.post(
    "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/verifconnextion.php",
    function(data){
      if(data=='err'){
        window.location.href ='index.html';
      }
    }
  );
});
