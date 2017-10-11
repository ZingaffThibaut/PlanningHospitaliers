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
  mdp = document.getElementById("mdp").value;
  $.post(
    "PHP/modifprofil.php",
    {
      mdp: mdp,
      mdpv: mdpv
    },
    function(data){
      alert(data);
    }
  );

  return false;
};

//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
