$(document).ready(function(){
  var date = new Date(document.getElementById("Date").value);
  var affi = "";
  var el = affi.concat(date.getFullYear(),"-",date.getMonth()+1,"-",date.getDate());

  $("#formUpload").submit(function(e){
    e.preventDefault();
    $.ajax({
      url: "PHP/importcsv.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){
        $(".corps").html(data);
      },
    })
  })
})
