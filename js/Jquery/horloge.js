$(document).ready(function(){
    el = document.getElementById('test');
    function actualiser() {
      var date = new Date();
      var str = date.getHours();
      str += ':'+(date.getMinutes()<10?'0':'')+date.getMinutes();
      str += ':'+(date.getSeconds()<10?'0':'')+date.getSeconds();
      el.innerHTML = str;
    }
    actualiser();
    setInterval(actualiser,1000);
  });
