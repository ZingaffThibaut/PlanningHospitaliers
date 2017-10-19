$(document).ready(function(){
  $("#uploadSubmit").submit(function(e){
    e.preventDefault();
    $.ajax({
      url: "importcsv.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(data){
        console.log(data);
      },

    })
    // $.post(
    //   "PHP/importcsv.php",
    //   {
    //     file: new FormData(this),
    //   },
    //   function(data){
    //     alert(data);
    //     $("#corps").append(data);
    //   },
    // )
  });
});
