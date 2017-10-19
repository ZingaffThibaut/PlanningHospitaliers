function Modif(nb){
  $.post(
    "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/affiservicesolo.php",
    {
      Id_service: nb
    },
    function(data){
      $("#modif").html(data);
      $("#tabtotal").css("visibility", "hidden");
      $("#tabtotal").css("display", "none");
      $("#modif").css("visibility", "visible");
      $("#modif").css("display", "block");
    }
  );

  return false;
};

function Retour(){
  $("#modif").css("visibility", "hidden");
  $("#modif").css("display", "none");
  $("#tabtotal").css("visibility", "visible");
  $("#tabtotal").css("display", "block");
};

function modif_service(){
  Id_service = document.getElementById("Id_service").value;
  nom = document.getElementById("nom_service").value;
  $.post(
    "https://infodb.iutmetz.univ-lorraine.fr/~nunge1u/LP/PlanningHospitaliers/PHP/modifservice.php",
    {
      Id_service: Id_service,
      Nom: nom
    },
    function(data){
      alert(data);
    }
  );

  return false;
};

//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
