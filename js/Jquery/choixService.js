$(document).ready(function(){
  $.post(
    "PHP/choixService.php",
    {
      service: "true"
    },
    function(data){
      $("#Service").html(data);
    },
  )
});
