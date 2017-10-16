$(document).ready(function(){
  $.post(
    "PHP/planning/importcsv.php",
    {
      fichier: fichier,
    },
    function(data){
      $("#corps").append(data);
    },
  );
});
