$(document).ready(function(){
  var date = new Date();

  annee = date.getFullYear();
  $('#annee').html(annee);

  $('#anneeMoins').click(function(){
    annee=annee-1;
    $('#annee').html(annee);
  });
  $('#anneePlus').click(function(){
    annee=annee+1;
    $('#annee').html(annee);
  });
  var mois = new Array("Jan", "Fev", "Mar", "Avr", "mai", "jui", "Jui", "Aou", "Sep", "Oct", "Nov", "Dec");

  for(var i=1;i < 13;i++){
    $('#mois > thead > tr > th:nth-child('+(i)+')').each(function(){
      $(this).append("<h2>"+mois[i-1]+"</h2>");
    })
  };
  $('#mois > thead > tr > th:nth-child('+(date.getMonth()+1)+')').attr('class','th-planning-active');

  $(".th-planning").click(function(){
    $(".th-planning-active").attr('class','th-planning');
    $(this).attr('class','th-planning-active');
  });

  var jour = date.getDay();
  var actualise = "Mise à jour le "+jour+" "+mois[date.getMonth()]+" "+annee+" à "+date.getHours()+"h";
  $('#actualise').append(actualise);
})
