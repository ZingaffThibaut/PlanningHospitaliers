$(document).ready(function(){

  var date = new Date();
  var affi = "";
  var el = affi.concat(date.getFullYear(),"-",date.getMonth()+1,"-",date.getDate());

  $.post(
    "PHP/planning/Semainechef.php",
    {
      date : el
    },
    function(data){
      $("#tab").html(data);
      var array = document.getElementById("tableau").rows;
      var longeur = array.length;
      var i=1;
      while(i<longeur){
        for(y=0;y<=7;y++){
          if(array[i].cells.item(y)){
            switch (array[i].cells.item(y).innerHTML){
              case "T":
              array[i].cells.item(y).className="bg-success text-white";
              break;
              case "RC":
              array[i].cells.item(y).className="bg-warning text-white";
              break;
              case "RH":
              array[i].cells.item(y).className="bg-danger text-white";
              break;
            }
          }
        }
        i++;
      }
    }
  );
});


function Planningchar(){
  service = document.getElementById("nomService").innerHTML;
  var date = new Date(document.getElementById("Date").value);
  var affi = "";
  var el = affi.concat(date.getFullYear(),"-",date.getMonth()+1,"-",date.getDate());
  $.post(
    "PHP/planning/Semaine.php",
    {
      service : service,
      date : el
    },
    function(data){
      $("#tab").html(data);
      var array = document.getElementById("tableau").rows;
      var longeur = array.length;
      var i=1;
      while(i<longeur){
        for(y=0;y<=7;y++){
          if(array[i].cells.item(y)){
            switch (array[i].cells.item(y).innerHTML){
              case "T":
              array[i].cells.item(y).className="bg-success text-white";
              break;
              case "RC":
              array[i].cells.item(y).className="bg-warning text-white";
              break;
              case "RH":
              array[i].cells.item(y).className="bg-danger text-white";
              break;
            }
          }
        }
        i++;
      }
    }
  );
};




function daynow(){
  var date = new Date();
  var affi= "";
  document.getElementById('Date').value = affi.concat(date.getFullYear(),"-",date.getMonth()+1,"-",date.getDate());
};

function selectcolor(el) {
  el.classList.toggle("bg-dark");
  el.classList.toggle("text-muted");
}

function T(){
  var service = document.getElementById("nomService").innerHTML;
  var tab = $(".text-muted").get();
  var i=0;
  while (typeof tab[i] !== 'undefined') {
     var cels = tab[i].id;
     var res = cels.split("£");
     $.post(
       "PHP/planning/modifplanning.php",
       {
         date : res[0],
         Id_personne : res[1],
         Id_periode : res[2],
         Choix : 1,
         service : service
       },
       function(data){
         console.log(data);
         Planningchar();
       }
     );
    i++;
  }
}

function RC(){
    var service = document.getElementById("nomService").innerHTML;
    var tab = $(".text-muted").get();
    var i=0;
    while (typeof tab[i] !== 'undefined') {
       var cels = tab[i].id;
       var res = cels.split("£");
       $.post(
         "PHP/planning/modifplanning.php",
         {
           date : res[0],
           Id_personne : res[1],
           Id_periode : res[2],
           Choix : 2,
           service : service
         },
         function(data){
           console.log(data);
           Planningchar();
         }
       );
      i++;
    }
}

function RH(){
  var service = document.getElementById("nomService").innerHTML;
  var tab = $(".text-muted").get();
  var i=0;
  while (typeof tab[i] !== 'undefined') {
     var cels = tab[i].id;
     var res = cels.split("£");
     $.post(
       "PHP/planning/modifplanning.php",
       {
         date : res[0],
         Id_personne : res[1],
         Id_periode : res[2],
         Choix : 3,
         service : service
       },
       function(data){
         console.log(data);
         Planningchar();
       }
     );
    i++;
  }

}
