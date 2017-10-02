$(document).ready(function(){
  $.post(
    "https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/PHP/verifconnextion.php",
    function(data){
      if(data=='err'){
        window.location.href ='index.html';
      }
    }
  );
});
