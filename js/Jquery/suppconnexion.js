function Supp(){
  $.post(
    "https://infodb.iutmetz.univ-lorraine.fr/~zingraff7u/Cordova/PHP/suppconnexion.php",
    function(data){
      if(data=='ok'){
        window.location.href ='index.html';
      }
    }
  );
};
