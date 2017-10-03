$(document).ready(function(){
  var service = $(location).attr('search');
  service = service.substring(9);
  $.post(
    "PHP/planning/planning.php",
    {
      service: service,
    },
    function(data){
      $("#membre").append(data);
    },
  );
});
