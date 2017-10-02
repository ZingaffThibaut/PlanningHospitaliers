$(document).ready(function(){
  $.post(
    "PHP/verifconnextion.php",
    function(data){
      if(data=='err'){
        window.location.href ='index.html';
      }
    }
  );
});
