$(document).ready(function(){
  $.post(
    "PHP/planning/date.php",
    function(data){
      $("#date").append(data);
    },
  );
});
