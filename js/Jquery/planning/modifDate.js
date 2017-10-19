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

  var mois = new Array("Jan", "Fev", "Mar", "Avr", "Mai", "Jui", "Jui", "Aou", "Sep", "Oct", "Nov", "Dec");
  var moisNum = new Array("0","1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12");

  for(var i=1;i < 13;i++){
      $('#mois > thead > tr > th:nth-child('+(i)+')').each(function(){
        $(this).append("<h2>"+mois[i-1]+"</h2>");
        $('#mois > thead > tr > th:nth-child('+i+')').attr('class','th-planning-inactive');
        $('#mois > thead > tr > th:nth-child('+i+')').attr('value',moisNum[i]);
    })
  };

  $(".th-planning-inactive").click(function(){
    $(".th-planning-active").attr('class','th-planning-inactive');
    $(this).attr('class','th-planning-active');
    var moisSelected = $('.th-planning-active').html();

    console.log(moisSelected.substr(4,3));
  });

  $('#mois > thead > tr > th:nth-child('+(date.getMonth()+1)+')').attr('class','th-planning-active');
})
