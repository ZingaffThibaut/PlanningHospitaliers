$(document).ready(function(){
    el = document.getElementById('horloge');
    function actualiser() {
      var date = new Date();
      var str = date.getHours();
      str += ':'+(date.getMinutes()<10?'0':'')+date.getMinutes();
      el.innerHTML = str;
    }
    actualiser();
    setInterval(actualiser,1000);
  });
