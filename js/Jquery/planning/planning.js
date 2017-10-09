$(document).ready(function(){

  var service = $(location).attr('search');
  service     = service.substring(9);

  console.log(service);
  $("#nomService").html(' ' + service);

  $.post(
    "PHP/planning/planning.php",
    {
      service: service,
    },
    function(data){
      $("#planning").append(data);
    },
  );
});
