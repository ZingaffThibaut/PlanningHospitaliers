function Modif(){
  $.post(
    "PHP/affimodifprofil.php",
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

function modif_profil(){
  mdp = document.getElementById("MDP").value;
  mdpv = document.getElementById("MDPV").value;
  Id_personne = document.getElementById("Id_personne").value;
  if(mdp!=mdpv){
    $("#Error").html("<div class='alert alert-danger' role='alert'>Erreur mot de passe différent</div>");
    return false;
  }
  $.post(
    "PHP/modifprofil.php",
    {
      Id_personne: Id_personne,
      mdp: mdp,
      mdpv: mdpv
    },
    function(data){
      if(data=='ok'){
        $("#Error").html("<div class='alert alert-success' role='alert'>Changement effectuer</div>");
        document.getElementById("MDP").value = "";
        document.getElementById("MDPV").value = "";
      }
    }
  );

  return false;
};

//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
