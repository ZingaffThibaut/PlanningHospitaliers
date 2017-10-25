$(document).ready(function(){
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
