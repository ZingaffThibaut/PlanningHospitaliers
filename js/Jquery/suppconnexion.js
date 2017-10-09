function Supp(){
  $.post(
    "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/suppconnexion.php",
    function(data){
      if(data=='ok'){
        window.location.href ='index.html';
      }
    }
  );
};
