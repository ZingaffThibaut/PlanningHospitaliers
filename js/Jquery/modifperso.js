function Modif(nb){
  $.post(
    "PHP/affipersosolo.php",
    {
      Id_personne: nb
    },
    function(data){
      var res = data.split("£");
      $("#modif").html(res[0]);
      $("#tabtotal").css("visibility", "hidden");
      $("#tabtotal").css("display", "none");
      $("#modif").css("visibility", "visible");
      $("#modif").css("display", "block");
      $.post(
        "PHP/listeservice.php",
        function(data){
          if(data!=""){
            $("#option-service2").html(data);
            document.getElementById('option-service2').value=res[1];
          }
        }
      );

      $.post(
        "PHP/listeniveau.php",
        function(data){
          if(data!=""){
              $("#option-niveau").html(data);
              document.getElementById('option-niveau').value=res[2];
          }
        }
      );
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
//https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/more_com.php
