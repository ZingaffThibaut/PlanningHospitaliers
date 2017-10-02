$("#Deco").click(
  alert('test');
  $.post(
    "PHP/suppconnextion.php",
    function(data){
      alert(data);
      if(data=='ok'){
        window.location.href ='index.html';
      }
    }
  );
);
