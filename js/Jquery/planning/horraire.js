$(document).ready(function(){
  var service = $(location).attr('search');
  service = service.substring(9);
  $.post(
    "PHP/planning/horraire.php",
    {
      service: service,
    },
    function(data){
      $("#horraire").append(data);
    },
  );
});
