function Modif(nb){
  $.post(
    "PHP/affisessionsolo.php",
    {
      Id_personne: nb
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

function modif_session(){
  Id_personne = document.getElementById("Id_personne").value;
  Identifiant = document.getElementById("Identifiant").value;
  mdp = document.getElementById("MDP").value;
  mdpv = document.getElementById("MDPV").value;
  if(mdp!=mdpv){
    $("#Error").html("<div class='alert alert-danger' role='alert'>Erreur mot de passe différent</div>");
    return false;
  }
  $.post(
    "PHP/modifsession.php",
    {
      Id_personne: Id_personne,
      Identifiant: Identifiant,
      mdp: mdp
    },
    function(data){
      alert(data);
    }
  );

  return false;
};

//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
