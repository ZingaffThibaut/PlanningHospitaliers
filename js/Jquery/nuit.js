function setCookie(sName, sValue) {
        var today = new Date(), expires = new Date();
        expires.setTime(today.getTime() + (365*24*60*60*1000));
        document.cookie = sName + "=" + encodeURIComponent(sValue) + ";expires=" + expires.toGMTString();
}

function getCookie(sName) {
        var cookContent = document.cookie, cookEnd, i, j;
        var sName = sName + "=";

        for (i=0, c=cookContent.length; i<c; i++) {
                j = i + sName.length;
                if (cookContent.substring(i, j) == sName) {
                        cookEnd = cookContent.indexOf(";", j);
                        if (cookEnd == -1) {
                                cookEnd = cookContent.length;
                        }
                        return decodeURIComponent(cookContent.substring(j, cookEnd));
                }
        }
        return null;
}



function Nuit() {
    $('nav').toggleClass('navbar-light navbar-dark');
    $('nav').toggleClass('bg-light bg-dark');
    $('body').toggleClass('bg-light bg-dark');
    var x = getCookie('Nuit');
    if(x=='Nuit'){
      setCookie('Nuit','Jour');
    }else{
      setCookie('Nuit','Nuit');
    }
}

function Nuitchange() {
    $('nav').toggleClass('navbar-light navbar-dark');
    $('nav').toggleClass('bg-light bg-dark');
    $('body').toggleClass('bg-light bg-dark');
}

function testnuit(){
  var x = getCookie('Nuit');
  if(x=='Nuit'){
    Nuitchange();
  }

}
