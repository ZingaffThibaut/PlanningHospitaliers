function Supp(){
  $.post(
    "PHP/suppconnexion.php",
    function(data){
      alert(data);
      if(data=='ok'){
        window.location.href ='index.html';
      }
    }
  );
};
